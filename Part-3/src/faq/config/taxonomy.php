<?php
/**
 * Topics runtime configuration parameters.
 *
 * @package     KnowTheCode\Module\FAQ\Custom
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\FAQ\Custom;

return array(
	'taxonomy' => 'topic',

	'labels' => array(
		'singular_label'            => 'Topic',
		'plural_label'              => 'Topics',
		'menu_label'                => 'Topics',
		'use_lowercase_in_sentence' => true,
		'text_domain'               => FAQ_MODULE_TEXT_DOMAIN,
	),

	'args' => array(
		'label'             => __( 'Topics', FAQ_MODULE_TEXT_DOMAIN ),
		'labels'            => '', // auto generated
		'hierarchical'      => true,
		'show_admin_column' => true,
		'public'            => false,
		'show_ui'           => true,
	),

	'post_types' => array( 'faq' ),
);
