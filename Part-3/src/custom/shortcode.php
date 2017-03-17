<?php
/**
 * Custom Module Handler
 *
 * @package     KnowTheCode\Module\Custom
 * @since       1.3.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\Custom;

/**
 * Process the shortcode
 *
 * @since 1.3.0
 *
 * @param array|string $user_defined_attributes User defined attributes for this shortcode instance
 * @param string|null $content Content between the opening and closing shortcode elements
 * @param string $shortcode_name Name of the shortcode
 *
 * @return string
 */
function process_the_shortcode_callback( $user_defined_attributes, $content, $shortcode_name ) {
	$config = get_shortcode_configuration( $shortcode_name );
	if ( ! $config ) {
		return '';
	}

	$attributes = shortcode_atts(
		$config['defaults'],
		$user_defined_attributes,
		$shortcode_name
	);

	if ( $content && $config['process_content_shortcodes'] ) {
		$content = do_shortcode( $content );
	}

	if ( $config['shortcode_function'] ) {
		$function_name = $config['shortcode_function'];

		return $function_name( $config, $attributes, $content, $shortcode_name );
	}

	ob_start();
	include( $config['view'] );

	return ob_get_clean();
}

/**
 * Get the shortcode's runtime configuration parameters.
 *
 * @since 1.3.0
 *
 * @param string $shortcode_name Name of the shortcode
 *
 * @return array
 */
function get_shortcode_configuration( $shortcode_name ) {
	return _shortcode_configuration_store( $shortcode_name, null );
}

/**
 * Register a shortcode configuration.
 *
 * This function does the following tasks:
 *      1. Checks if the configuration file is readable. If no, it returns an empty array.
 *      2. Loads the configuration file
 *      3. Merges it with the defaults, i.e. to ensure all parameters are loaded as expected.
 *      4. Register the shortcode with WordPress using `add_shortcode`
 *      5. Caches the configuration in the config store
 *      6. Returns the configuration.
 *
 * @since 1.3.0
 *
 * @param string $file Absolute path to the configuration file.
 *
 * @return array
 */
function register_shortcode_configuration( $file ) {

	if ( ! is_readable( $file ) ) {
		return array();
	}

	$config = array_merge(
		array(
			'shortcode_name'     => '',
			'shortcode_function' => null,
			'view'               => '',
			'defaults'           => array(),

		),
		require( $file )
	);

	add_shortcode( $config['shortcode_name'], __NAMESPACE__ . '\process_the_shortcode_callback' );

	return _shortcode_configuration_store( $config['shortcode_name'], $config );
}

/**
 * Shortcode configuration cache store.  Shortcodes can be called over and over
 * again on the same web page.  To speed up the configuration process, we cache
 * a shortcode's configuration the first time it's registered.
 *
 * @since 1.3.0
 *
 * @param string $shortcode_name Name of the shortcode
 * @param array|null $config Array of runtime configuration parameters.
 *                          Set to null to get the config out of the store.
 *
 * @return mixed
 */
function _shortcode_configuration_store( $shortcode_name, $config = null ) {
	static $configurations = array();

	if ( ! isset( $configurations[ $shortcode_name ] )  && ! is_null( $config ) ) {
		$configurations[ $shortcode_name ] = $config;
	} else if ( is_null( $config ) ) {
		return false;
	}

	return $configurations[ $shortcode_name ];
}
