<?php
/**
 * Custom Label Generator
 *
 * @package     KnowTheCode\Module\Custom
 * @since       1.3.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\Custom;

/**
 * Generate the labels for the given post type.
 *
 * @since 1.3.0
 *
 * @param string $custom_name Name of the post type or taxonomy
 * @param array $config An array of runtime configuration parameters.
 * @param string $custom_type Indicates the type of custom labels: 'post type' or 'taxonomy'
 *
 * @return array
 */
function generate_the_custom_labels( $custom_name, array $config, $custom_type = 'post type' ) {
	$config = array_merge(
		array(
			'singular_label'            => '',
			'plural_label'              => '',
			'menu_label'                => '',
			'use_lowercase_in_sentence' => true,
			'text_domain'               => '',
			'specific_labels'           => array(),
		), $config );

	if ( ! $config['menu_label'] ) {
		$config['menu_label'] = $config['plural_label'];
	}

	$in_sentence_label = $config['use_lowercase_in_sentence']
		? strtolower( $config['plural_label'] )
		: $config['plural_label'];

	$custom_type_generator  = __NAMESPACE__;
	$custom_type_generator .= $custom_type == 'taxonomy'
		? '\generate_custom_labels_for_taxonomy'
		: '\generate_custom_labels_for_post_type';

	$labels = array_merge(
		generate_general_labels( $config, $in_sentence_label, $custom_type ),
		$custom_type_generator( $config, $in_sentence_label, $custom_name )
	);

	if ( $config['specific_labels'] ) {
		$labels = array_merge( $config['specific_labels'], $labels );
	}

	return $labels;
}

/**
 * Generate the general (shared) custom labels.
 *
 * @since 1.3.0
 *
 * @param array $config An array of runtime configuration parameters.
 * @param string $in_sentence_label The label that is contained within a sentence.
 * @param string $custom_type Indicates the type of custom labels: 'post type' or 'taxonomy'
 *
 * @return array
 */
function generate_general_labels( array $config, $in_sentence_label, $custom_type = 'post type' ) {
	return array(
		'name'              => _x(
			$config['plural_label'],
			$custom_type . ' general name',
			$config['text_domain']
		),
		'singular_name'     => _x(
			$config['singular_label'],
			$custom_type . ' singular name',
			$config['text_domain']
		),
		'all_items'         => __( 'All ' . $config['plural_label'], $config['text_domain'] ),
		'edit_item'         => __( 'Edit ' . $config['singular_label'], $config['text_domain'] ),
		'view_item'         => __( 'View ' . $config['singular_label'], $config['text_domain'] ),
		'add_new_item'      => __( 'Add New ' . $config['singular_label'], $config['text_domain'] ),
		'parent_item_colon' => __( 'Parent ' . $config['singular_label'] . ':', $config['text_domain'] ),
		'search_items'      => __( 'Search ' . $config['plural_label'], $config['text_domain'] ),
		'not_found'         => __( "No {$in_sentence_label} found.", $config['text_domain'] ),
	);
}

/**
 * Generate the specific custom labels for the taxonomy.  These
 *
 * @since 1.3.0
 *
 * @param array $config An array of runtime configuration parameters.
 * @param string $in_sentence_label The label that is contained within a sentence.
 * @param string $custom_name Name of the post type or taxonomy
 *
 * @return array
 */
function generate_custom_labels_for_taxonomy( array $config, $in_sentence_label, $custom_name ) {
	return array(
		'update_item'                => __( 'Update ' . $config['singular_label'], $config['text_domain'] ),
		'new_item_name'              => __(
			'New ' . $config['singular_label'] . ' Name',
			$config['text_domain'] ),
		'parent_item'                => __( 'Parent ' . $config['singular_label'], $config['text_domain'] ),
		'search_items'               => __( 'Search ' . $config['plural_label'], $config['text_domain'] ),
		'popular_items'              => __( 'Popular ' . $config['plural_label'], $config['text_domain'] ),
		'separate_items_with_commas' => __( "Separate {$in_sentence_label} with commas.", $config['text_domain'] ),
		'add_or_remove_items'        => __( "Add or remove {$in_sentence_label}.", $config['text_domain'] ),
		'choose_from_most_used'      => __(
			"Choose from the most used {$in_sentence_label}.",
			$config['text_domain']
		),
	);
}

/**
 * Generate the specific custom labels for the post type.
 *
 * @since 1.3.0
 *
 * @param array $config An array of runtime configuration parameters.
 * @param string $in_sentence_label The label that is contained within a sentence.
 * @param string $custom_name Name of the post type or taxonomy
 *
 * @return array
 */
function generate_custom_labels_for_post_type( array $config, $in_sentence_label, $custom_name ) {
	return array(
		'add_new'               => _x( 'Add New', $custom_name, $config['text_domain'] ),
		'new_item'              => __( 'New ' . $config['singular_label'], $config['text_domain'] ),
		'view_items'            => __( 'View ' . $config['plural_label'], $config['text_domain'] ),
		'archives'              => __( $config['singular_label'] . ' Archives', $config['text_domain'] ),
		'attributes'            => __( $config['singular_label'] . ' Attributes', $config['text_domain'] ),
		'insert_into_item'      => __( "Insert into {$in_sentence_label}.", $config['text_domain'] ),
		'uploaded_to_this_item' => __( "Uploaded to this {$in_sentence_label}.", $config['text_domain'] ),
		'not_found_in_trash'    => __( "No {$in_sentence_label} found in Trash.", $config['text_domain'] ),
	);
}
