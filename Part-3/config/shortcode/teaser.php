<?php
/**
 * Teaser shortcode runtime configuration parameters.
 *
 * @package     KnowTheCode\CollapsibleContent\Shortcode
 * @since       1.3.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\CollapsibleContent\Shortcode;

return array(
	/**============================================================
	 * Available default attributes.  Each of these is overridable
	 * by the user/author when adding the shortcode into the content.
	 *=============================================================*/
	'shortcode_name'             => 'teaser',

	/**============================================================
	 * If the shortcode needs additional processing beyond just
	 * calling the view file, specify the function here. Else, this
	 * module will simply start the output buffer, call the specified
	 * view file, and then return and clean the output buffer.
	 *=============================================================*/
	'shortcode_function'         => null,

	/**============================================================
	 * When set to true, all shortcodes contained in the content
	 * will be processed.  Note: the `content` is any content passed
	 * to the shortcode that is contained between the opening and
	 * closing shortcode braces.
	 *
	 * This parameter makes sure that any shortcodes contained within
	 * that content do get processed.
	 *=============================================================*/
	'process_content_shortcodes' => true,

	/**============================================================
	 * View file for the shortcode's HTML
	 *=============================================================*/
	'view'                       => COLLAPSIBLE_CONTENT_DIR . '/src/shortcode/views/teaser.php',

	/**============================================================
	 * Available default attributes.  Each of these is overridable
	 * by the user/author when adding the shortcode into the content.
	 *=============================================================*/
	'defaults'                   => array(
		'show_icon'       => 'dashicons dashicons-arrow-down-alt2',
		'hide_icon'       => 'dashicons dashicons-arrow-up-alt2',
		'visible_message' => '',
	),
);
