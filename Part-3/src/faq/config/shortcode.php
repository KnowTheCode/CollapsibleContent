<?php
/**
 * FAQ shortcode's runtime configuration parameters.
 *
 * @package     KnowTheCode\Module\FAQ\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\FAQ\Shortcode;

return array(

	/**=================================================
	 * Shortcode name [faq]
	 *==================================================*/
	'shortcode_name' => 'faq',

	/**=================================================
	 * Specify if you want do_shortcode() to run on the
	 * content between the shortcode opening and closing
	 * brackets. Defaults to true.
	 *==================================================*/
	'do_shortcode_within_content' => false,

	/**=================================================
	 * Specify the processing function when you want
	 * your code to handle the output buffer, view, and
	 * processing.
	 *==================================================*/
	'processing_function' => __NAMESPACE__ . '\process_the_faq_shortcode',

	/**=================================================
	 * Paths to the view files
	 *==================================================*/
	'view'    => array(
		'container_single' => FAQ_MODULE_DIR . '/views/container.php',
		'container_topic'  => FAQ_MODULE_DIR . '/views/container.php',
		'faq'              => FAQ_MODULE_DIR . '/views/faq.php',
	),

	/**=================================================
	 * Defined shortcode default attributes.  Each is
	 * overridable by the author.
	 *==================================================*/
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
