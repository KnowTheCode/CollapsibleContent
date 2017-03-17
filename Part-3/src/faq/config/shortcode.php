<?php
/**
 * FAQ Shortcode runtime configuration parameters.
 *
 * @package     KnowTheCode\Module\FAQ\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\FAQ\Shortcode;

return array(
	/**============================================================
	 * Available default attributes.  Each of these is overridable
	 * by the user/author when adding the shortcode into the content.
	 *=============================================================*/
	'shortcode_name' => 'faq',

	/**============================================================
	 * If the shortcode needs additional processing beyond just
	 * calling the view file, specify the function here.
	 *
	 * For FAQ, we need to call multiple views and control the handling.
	 *=============================================================*/
	'shortcode_function' => __NAMESPACE__ . '\process_the_faq_shortcode',

	/**============================================================
	 * When set to true, all shortcodes contained in the content
	 * will be processed.  Note: the `content` is any content passed
	 * to the shortcode that is contained between the opening and
	 * closing shortcode braces.
	 *
	 * This parameter makes sure that any shortcodes contained within
	 * that content do get processed.
	 *=============================================================*/
	'process_content_shortcodes' => false,

	/**============================================================
	 * View file for the shortcode's HTML
	 *=============================================================*/
	'view'    => '',

	/**============================================================
	 * View file(s) for the shortcode's HTML
	 *=============================================================*/
	'views'    => array(
		'container_single' => FAQ_MODULE_DIR . '/views/container.php',
		'container_topic'  => FAQ_MODULE_DIR . '/views/container.php',
		'faq'              => FAQ_MODULE_DIR . '/views/faq.php',
	),

	/**============================================================
	 * Available default attributes.  Each of these is overridable
	 * by the user/author when adding the shortcode into the content.
	 *=============================================================*/
	'defaults' => array(
		'show_icon'               => 'dashicons dashicons-arrow-down-alt2',
		'hide_icon'               => 'dashicons dashicons-arrow-up-alt2',
		'post_id'                 => 0,
		'topic'                   => '',
		'number_of_faqs'          => - 1,
		'show_none_found_message' => 1,
		'none_found_by_topic'     => __( 'Sorry, no FAQs were found for that topic.', FAQ_MODULE_TEXT_DOMAIN ),
		'none_found_single'       => __( 'Sorry, no FAQ found.', FAQ_MODULE_TEXT_DOMAIN ),
	),
);
