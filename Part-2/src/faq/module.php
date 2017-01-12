<?php
/**
 * FAQ Module Controller
 *
 * @package     KnowTheCode\Module\FAQ
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\FAQ;

define( 'FAQ_MODULE_TEXT_DOMAIN', COLLAPSIBLE_CONTENT_TEXT_DOMAIN );

/**
 * Autoload the FAQ module.
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload() {
	$files = array(
		'custom/post-type.php',
		'custom/taxonomy.php',
		'shortcode/shortcode.php',
		'templates/helpers.php',
	);

	foreach( $files as $file ) {
		include( __DIR__ . '/' . $file );
	}
}

autoload();

register_activation_hook( COLLAPSIBLE_CONTENT_PLUGIN, __NAMESPACE__ . '\init_plugin_activation' );
/**
 * Initialize the FAQ module upon plugin activation.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_plugin_activation() {
	Custom\register_faq_custom_post_type();
	Custom\register_faq_topic_taxonomy();

	flush_rewrite_rules();
}

register_deactivation_hook( COLLAPSIBLE_CONTENT_PLUGIN, 'flush_rewrite_rules' );
