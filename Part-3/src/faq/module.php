<?php
/**
 * FAQ Module Handler
 *
 * @package     KnowTheCode\Module\FAQ
 * @since       1.3.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\FAQ;

use KnowTheCode\Module\Custom as CustomModule;

define( 'FAQ_MODULE_TEXT_DOMAIN', COLLAPSIBLE_CONTENT_TEXT_DOMAIN );
define( 'FAQ_MODULE_DIR', trailingslashit( __DIR__ ) );

add_filter( 'add_custom_post_type_runtime_config', __NAMESPACE__ . '\register_faq_custom_configs' );
add_filter( 'add_custom_taxonomy_runtime_config', __NAMESPACE__ . '\register_faq_custom_configs' );
/**
 * Loading in the post type and taxonomy runtime configurations with
 * the Custom Module.
 *
 * @since 1.3.0
 *
 * @param array $configurations Array of all the configurations.
 *
 * @return void
 */
function register_faq_custom_configs( array $configurations ) {
	$doing_post_type = current_filter() == 'add_custom_post_type_runtime_config';

	$filename = $doing_post_type
		? 'post-type'
		: 'taxonomy';
	$runtime_config = (array) require( FAQ_MODULE_DIR . 'config/' . $filename . '.php' );
	if ( ! $runtime_config ) {
		return $configurations;
	}

	$key = $doing_post_type
		? $runtime_config['post_type']
		: $runtime_config['taxonomy'];

	$configurations[ $key ] = $runtime_config;

	return $configurations;
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
		'shortcode/shortcode.php',
		'template/helpers.php'
	);

	foreach( $files as $file ) {
		include( __DIR__ . '/' . $file );
	}
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\setup_module' );
/**
 * Setup the module.
 *
 * @since 1.3.0
 *
 * @return void
 */
function setup_module() {
	CustomModule\register_shortcode( FAQ_MODULE_DIR . 'config/shortcode.php' );
}

autoload();
