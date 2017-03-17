<?php
/**
 * Runtime configuration for the FAQ Custom Post Type.
 *
 * @package     KnowTheCode\Module\FAQ\Custom
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\FAQ\Custom;

return array(
	'post_type' => 'faq',

	'features' => array(
		'get_features' => 'post',
		'exclude'      => array(
			'excerpt',
			'comments',
			'trackbacks',
			'custom-fields',
//		'thumbnail',
		),
		'additional'   => array(
			'page-attributes',
		),
	),

	'labels' => array(
		'singular_label'            => 'faq',
		'plural_label'              => 'FAQs',
		'menu_label'                => 'FAQ',
		'use_lowercase_in_sentence' => true,
		'text_domain'               => FAQ_MODULE_TEXT_DOMAIN,
	),

	'args' => array(
		'description' => 'Frequently Asked Questions (FAQ)',
		'label'       => __( 'FAQs', FAQ_MODULE_TEXT_DOMAIN ),
		'labels'      => '', // gets automatically assigned.
		'public'      => true,
		'supports'    => '', // gets automatically assigned.
		'menu_icon'   => 'dashicons-editor-help',
		'has_archive' => true,
	),
);
