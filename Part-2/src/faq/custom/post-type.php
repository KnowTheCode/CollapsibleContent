<?php
/**
 * Custom post type for the FAQ
 *
 * @package     KnowTheCode\Module\FAQ\Custom
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\FAQ\Custom;

add_action( 'init', __NAMESPACE__ . '\register_faq_custom_post_type' );
/**
 * Register the FAQ custom post type.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_faq_custom_post_type() {

	$args = array(
		'labels'       => get_post_type_labels_config( 'FAQ', 'FAQs' ),
		'public'       => true,
		'hierarchical' => false,
		'has_archive'  => true,
		'show_in_rest' => true,
		'menu_icon'    => 'dashicons-editor-help',
		'rewrite'      => array(
			'slug'       => 'faq',
			'with_front' => false,
		),
		'supports'     => get_post_type_features_config(),
	);

	register_post_type( 'faq', $args );
}

/**
 * Get the labels for this custom post type.
 *
 * @since 1.0.0
 *
 * @param string $singular_label Singular label
 * @param string $plural_label Plural label
 *
 * @return array
 */
function get_post_type_labels_config( $singular_label, $plural_label ) {
	return array(
		'name'               => _x( $plural_label, 'post type general name', FAQ_MODULE_TEXT_DOMAIN ),
		'singular_name'      => _x( $singular_label, 'post type singular name', FAQ_MODULE_TEXT_DOMAIN ),
		'menu_name'          => _x( $plural_label, 'admin menu', FAQ_MODULE_TEXT_DOMAIN ),
		'name_admin_bar'     => _x( $singular_label, 'add new on admin bar', FAQ_MODULE_TEXT_DOMAIN ),
		'add_new'            => _x( 'Add New', 'faq', FAQ_MODULE_TEXT_DOMAIN ),
		'add_new_item'       => __( 'Add New ' . $singular_label, FAQ_MODULE_TEXT_DOMAIN ),
		'new_item'           => __( 'New ' . $singular_label, FAQ_MODULE_TEXT_DOMAIN ),
		'edit_item'          => __( 'Edit ' . $singular_label, FAQ_MODULE_TEXT_DOMAIN ),
		'view_item'          => __( 'View ' . $singular_label, FAQ_MODULE_TEXT_DOMAIN ),
		'all_items'          => __( 'All ' . $plural_label, FAQ_MODULE_TEXT_DOMAIN ),
		'search_items'       => __( 'Search ' . $plural_label, FAQ_MODULE_TEXT_DOMAIN ),
		'parent_item_colon'  => __( 'Parent ' . $plural_label . ':', FAQ_MODULE_TEXT_DOMAIN ),
		'not_found'          => __( 'No books found.', FAQ_MODULE_TEXT_DOMAIN ),
		'not_found_in_trash' => __( 'No books found in Trash.', FAQ_MODULE_TEXT_DOMAIN ),
	);
}

/**
 * Get the post type features (supports).
 *
 * @since 1.0.0
 *
 * @return array
 */
function get_post_type_features_config() {
	$features   = get_all_post_type_supports( 'post' );
	$features   = array_keys( $features );
	$features[] = 'page-attributes';

	return $features;
}