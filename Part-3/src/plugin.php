<?php
/**
 * Plugin Handler
 *
 * @package     KnowTheCode\CollapsibleContent
 * @since       1.3.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\CollapsibleContent;

use KnowTheCode\Module\Custom as CustomModule;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue the plugin assets (scripts and styles).
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_assets() {
	wp_enqueue_style('dashicons');

	wp_enqueue_script(
		'collapsible-content-plugin-script',
		COLLAPSIBLE_CONTENT_URL . 'assets/dist/js/jquery.plugin.min.js',
		array('jquery'),
		'1.0.0',
		true
	);
}

/**
 * Autoload plugin files.
 *
 * @since 1.3.0
 *
 * @return void
 */
function autoload() {
	$files = array(
		'custom/module.php',
		'faq/module.php',
	);

	foreach( $files as $file ) {
		include( __DIR__ . '/' . $file );
	}
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\setup_plugin' );
/**
 * Setup the plugin.
 *
 * @since 1.3.0
 *
 * @return void
 */
function setup_plugin() {
	foreach( array( 'qa', 'teaser' ) as $shortcode ) {
		$pathto_configuration_file = sprintf( '%s/config/shortcode/%s.php',
			COLLAPSIBLE_CONTENT_DIR,
			$shortcode
		);

		CustomModule\register_shortcode( $pathto_configuration_file );
	}
}

autoload();
