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

use KnowTheCode\Module\Custom as custom;

define( 'FAQ_MODULE_TEXT_DOMAIN', COLLAPSIBLE_CONTENT_TEXT_DOMAIN );
define( 'FAQ_MODULE_DIR', __DIR__ );
define( 'FAQ_MODULE_CONFIG_DIR', FAQ_MODULE_DIR . '/config/' );

/**
 * Autoload plugin files.
 *
 * @since 1.3.0
 *
 * @return void
 */
function autoload() {
	$files = array(
		'custom/shortcode.php',
		'template/helpers.php'
	);

	foreach( $files as $file ) {
		include( __DIR__ . '/' . $file );
	}
}

/**
 * Setup the module.
 *
 * @since 1.3.0
 *
 * @return void
 */
function setup() {
	custom\register_shortcode_configuration( FAQ_MODULE_CONFIG_DIR . 'shortcode.php' );
}

add_filter( 'get_custom_post_types_runtime_config', __NAMESPACE__ . '\register_faq_custom' );
add_filter( 'get_custom_taxonomy_runtime_config', __NAMESPACE__ . '\register_faq_custom' );
/**
 * Register the FAQ custom post type with the CPT handler by adding its
 * runtime configuration to the filter.
 *
 * @since 1.3.0
 *
 * @param array $configurations An array of post type configurations
 *
 * @return array
 */
function register_faq_custom( array $configurations ) {
	$doing_post_type = current_filter() == 'get_custom_post_types_runtime_config';

	$filename = $doing_post_type ? 'post-type' : 'taxonomy';
	$runtime_config = (array) require( FAQ_MODULE_DIR . '/config/' . $filename . '.php' );
	if ( ! $runtime_config ) {
		return $configurations;
	}

	$key = $doing_post_type ? $runtime_config['post_type'] : $runtime_config['taxonomy'];

	$configurations[ $key ] = $runtime_config;

	return $configurations;
}

autoload();
