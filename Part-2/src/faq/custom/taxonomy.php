<?php
/**
 * Custom taxonomy for the FAQ
 *
 * @package     KnowTheCode\Module\FAQ\Custom
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\FAQ\Custom;

add_action( 'init', __NAMESPACE__ . '\register_faq_topic_taxonomy' );
/**
 * Register Taxonomy for FAQ Category
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_faq_topic_taxonomy() {
	$args = array(
		'labels'            => get_taxonomy_labels_config( 'FAQ' ),
		'show_in_nav_menus' => false,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'rewrite'           => array(
			'slug'       => 'faq-topic',
			'with_front' => false,
		),
	);
	register_taxonomy( 'faq_topic', 'faq', $args );
}

/**
 * Get the taxonomy labels runtime configuration parameters.
 *
 * @since 1.0.0
 *
 * @param $singular_label
 *
 * @return array
 */
function get_taxonomy_labels_config( $singular_label ) {

	return array(
		'name'          => _x( $singular_label . ' Topics', 'taxonomy general name', FAQ_MODULE_TEXT_DOMAIN ),
		'singular_name' => _x( $singular_label . ' Topic', 'taxonomy singular name', FAQ_MODULE_TEXT_DOMAIN ),
		'menu_name'     => _x( $singular_label . ' Topics', 'admin menu name', FAQ_MODULE_TEXT_DOMAIN ),
		'all_items'     => __( 'All ' . $singular_label . ' Topics', FAQ_MODULE_TEXT_DOMAIN ),
		'edit_item'     => __( 'Edit ' . $singular_label . ' Topic', FAQ_MODULE_TEXT_DOMAIN ),
		'view_item'     => __( 'View ' . $singular_label . ' Topic', FAQ_MODULE_TEXT_DOMAIN ),
		'update_item'   => __( 'Update ' . $singular_label . ' Topic', FAQ_MODULE_TEXT_DOMAIN ),
		'add_new_item'  => __( 'Add New ' . $singular_label . ' Topic', FAQ_MODULE_TEXT_DOMAIN ),
	);
}
