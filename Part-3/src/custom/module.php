<?php
/**
 * Custom Module Handler
 *
 * @package     KnowTheCode\Module\Custom
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\Custom;

// Whoops, this module is already from another plugin.
if ( function_exists( __NAMESPACE__ . 'register_the_custom_post_type' ) ) {
	return;
}

// Change this variable's value when using with another plugin.
$plugin_bootstrap = COLLAPSIBLE_CONTENT_PLUGIN;

/**
 * Autoload plugin files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload() {
	$files = array(
		'label-generator.php',
		'post-type.php',
		'taxonomy.php',
		'shortcode.php',
	);

	foreach( $files as $file ) {
		include( __DIR__ . '/' . $file );
	}
}

autoload();

register_activation_hook( $plugin_bootstrap, __NAMESPACE__ . '\activate_the_plugin' );
/**
 * Initialize the rewrites for our new custom post type
 * upon activation.
 *
 * @since 1.0.0
 *
 * @return void
 */
function activate_the_plugin() {
	register_the_custom_post_type();
	register_the_custom_taxonomies();

	flush_rewrite_rules();
}

register_deactivation_hook( $plugin_bootstrap, __NAMESPACE__ . '\deactivate_plugin' );
/**
 * The plugin is deactivating.  Delete out the rewrite rules option.
 *
 * @since 1.0.0
 *
 * @return void
 */
function deactivate_plugin() {
	delete_option( 'rewrite_rules' );
}

register_uninstall_hook( $plugin_bootstrap, __NAMESPACE__ . '\uninstall_plugin' );
/**
 * Plugin is being uninstalled. Clean up after ourselves...silly.
 *
 * @since 1.0.0
 *
 * @return void
 */
function uninstall_plugin() {
	delete_option( 'rewrite_rules' );
}
