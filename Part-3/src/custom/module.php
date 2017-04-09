<?php
/**
 * Custom Module Handler - bootstrap file for the module.
 *
 * @package     KnowTheCode\Module\Custom
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\Custom;

define( 'CUSTOM_MODULE_DIR', __DIR__ );

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
		'shortcode.php',
		'taxonomy.php'
	);

	foreach( $files as $file ) {
		include( __DIR__ . '/' . $file );
	}
}

autoload();

/**
 * Register a plugin with the Custom Module.
 *
 * @since 1.0.0
 *
 * @param string $plugin_file
 *
 * @return void
 */
function register_plugin( $plugin_file ) {
	register_activation_hook( $plugin_file, __NAMESPACE__ . '\delete_rewrite_rules_on_plugin_status_change' );
	register_deactivation_hook( $plugin_file, __NAMESPACE__ . '\delete_rewrite_rules_on_plugin_status_change' );
	register_uninstall_hook( $plugin_file, __NAMESPACE__ . '\delete_rewrite_rules_on_plugin_status_change' );
}

/**
 * Delete the rewrite rules on plugin status change, i.e.
 * activation, deactivation, or uninstall.
 *
 * @since 1.0.0
 *
 * @return void
 */
function delete_rewrite_rules_on_plugin_status_change() {
	delete_option( 'rewrite_rules' );
}
