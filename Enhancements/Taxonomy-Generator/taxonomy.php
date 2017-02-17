<?php
/**
 * Taxonomy handler
 *
 * @package     KnowTheCode\Module\FAQ\Custom
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\FAQ\Custom;

add_action( 'init', __NAMESPACE__ . '\register_custom_taxonomy' );
/**
 * Register the taxonomy.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_custom_taxonomy() {
	$args = array(
		'label'             => __( 'Topics', FAQ_MODULE_TEXT_DOMAIN ),
		'labels'            => get_taxonomy_labels_config( array(
			'singular_label' => 'Topic',
			'plural_label'   => 'Topics',
		) ),
		'hierarchical'      => true,
		'show_admin_column' => true,
		'public'            => false,
		'show_ui'           => true,
	);

	register_taxonomy( 'topic', array( 'faq' ), $args );
}

/**
 * Get the taxonomy labels configuration.
 *
 * @since 1.0.0
 *
 * @param array $config Array of configuration parameters
 *
 * @return array
 */
function get_taxonomy_labels_config( array $config ) {
	$config = array_merge(
		array(
			'singular_label'            => '',
			'plural_label'              => '',
			'menu_label'                => '',
			'use_lowercase_in_sentence' => true,
		),
		$config
	);

	if ( ! $config['menu_label'] ) {
		$config['menu_label'] = $config['plural_label'];
	}

	$in_sentence_label = $config['use_lowercase_in_sentence']
		? strtolower( $config['plural_label'] )
		: $config['plural_label'];

	return array(
		'name'                       => _x( $config['plural_label'], 'taxonomy general name', FAQ_MODULE_TEXT_DOMAIN ),
		'singular_name'              => _x( $config['singular_label'], 'taxonomy singular name', FAQ_MODULE_TEXT_DOMAIN ),
		'search_items'               => __( 'Search ' . $config['plural_label'], FAQ_MODULE_TEXT_DOMAIN ),
		'popular_items'              => __( 'Popular ' . $config['plural_label'], FAQ_MODULE_TEXT_DOMAIN ),
		'all_items'                  => __( 'All ' . $config['plural_label'], FAQ_MODULE_TEXT_DOMAIN ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit ' . $config['singular_label'], FAQ_MODULE_TEXT_DOMAIN ),
		'view_item'                  => __( 'View ' . $config['singular_label'], FAQ_MODULE_TEXT_DOMAIN ),
		'update_item'                => __( 'Update ' . $config['singular_label'], FAQ_MODULE_TEXT_DOMAIN ),
		'add_new_item'               => __( 'Add New ' . $config['singular_label'], FAQ_MODULE_TEXT_DOMAIN ),
		'new_item_name'              => __( "New {$config['singular_label']} Name", FAQ_MODULE_TEXT_DOMAIN ),
		'separate_items_with_commas' => __( "Separate {$in_sentence_label} with commas", FAQ_MODULE_TEXT_DOMAIN ),
		'add_or_remove_items'        => __( "Add or remove {$in_sentence_label}", FAQ_MODULE_TEXT_DOMAIN ),
		'choose_from_most_used'      => __( "Choose from the most used {$in_sentence_label}", FAQ_MODULE_TEXT_DOMAIN ),
		'not_found'                  => __( "No {$in_sentence_label} found.", FAQ_MODULE_TEXT_DOMAIN ),
		'menu_name'                  => $config['menu_label'],
	);
}