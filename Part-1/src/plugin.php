<?php
/**
 * Plugin Handler - Think it like a Controller.
 *
 * @package     KnowTheCode\CollapsibleContent
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode\CollapsibleContent;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue Assets for the plugin.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_assets() {

	wp_enqueue_style( 'dashicons' );

	wp_enqueue_script( 'collapsible-content-plugin-js', COLLAPSIBLE_CONTENT_URL . 'assets/dist/js/jquery.plugin.js',
		array( 'jquery' ), '1.0.0', true );

	$script_parameters = array(
		'collapsibleContent' => array(
			'iconEl'        => '.collapsible-content--icon',
			'iconClassname' => array(
				'showClassname' => 'dashicons-arrow-down-alt2',
				'hideClassname' => 'dashicons-arrow-up-alt2',
			),
		),
		'qa'                 => array(
			'iconEl'        => '.qa--icon',
			'iconClassname' => array(
				'showClassname' => 'dashicons-arrow-down-alt2',
				'hideClassname' => 'dashicons-arrow-up-alt2',
			),
		),
	);
	wp_localize_script( 'collapsible-content-plugin-js', 'collapsibleContentParameters', $script_parameters );
}

/**
 * Launch the plugin.
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload() {
	$files = array(
		'shortcode/shortcodes.php',
	);

	foreach ( $files as $file ) {
		include( __DIR__ . '/' . $file );
	}
}

autoload();