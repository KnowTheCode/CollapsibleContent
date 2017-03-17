<?php
/**
 * Shortcode runtime configuration default parameters.
 *
 * @package     KnowTheCode\Module\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\Shortcode;

return array(
	/**============================================================
	 * Available default attributes.  Each of these is overridable
	 * by the user/author when adding the shortcode into the content.
	 *=============================================================*/
	'shortcode_name' => '',

	/**============================================================
	 * If the shortcode needs additional processing beyond just
	 * calling the view file, specify the function here. Else, this
	 * module will simply start the output buffer, call the specified
	 * view file, and then return and clean the output buffer.
	 *=============================================================*/
	'shortcode_function' => null,

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
	 * Available default attributes.  Each of these is overridable
	 * by the user/author when adding the shortcode into the content.
	 *=============================================================*/
	'defaults' => array(),
);
