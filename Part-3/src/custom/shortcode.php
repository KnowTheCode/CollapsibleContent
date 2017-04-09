<?php
/**
 * Description
 *
 * @package     KnowTheCode\Module\Custom
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\Custom;

/**
 * Register your shortcode with the Custom Module.
 *
 * @since 1.0.0
 *
 * @param string $pathto_configuration_file Absolute path to the configuration file's location.
 *
 * @return array|false
 */
function register_shortcode( $pathto_configuration_file ) {

	if ( ! is_readable( $pathto_configuration_file ) ) {
		return false;
	}

	$config = (array) include( $pathto_configuration_file );
	$config = array_merge(
		array(
			'shortcode_name'              => '',
			'do_shortcode_within_content' => true,
			'processing_function'         => null,
			'view'                        => '',
			'defaults'                    => array(),
		),
		$config
	);

	if ( ! $config['shortcode_name'] || ! $config['view'] ) {
		return false;
	}

	add_shortcode( $config['shortcode_name'], __NAMESPACE__ . '\process_the_shortcode_callback' );

	return store_shortcode_configuration( $config['shortcode_name'], $config );
}

/**
 * Process and render the HTML for the shortcode.
 *
 * @since 1.0.0
 *
 * @param array|string $user_defined_attributes User defined attributes for this shortcode instance
 * @param string|null $content Content between the opening and closing shortcode elements
 * @param string $shortcode_name Name of the shortcode
 *
 * @return string
 */
function process_the_shortcode_callback( $user_defined_attributes, $content, $shortcode_name ) {
	$config = get_shortcode_configuration( $shortcode_name );

	$attributes = shortcode_atts(
		$config['defaults'],
		$user_defined_attributes,
		$shortcode_name
	);

	if ( $content && $config['do_shortcode_within_content'] ) {
		$content = do_shortcode( $content );
	}

	if ( $config['processing_function'] ) {
		$function_name = $config['processing_function'];

		return $function_name( $config, $attributes, $content, $shortcode_name );
	}

	// Call the view file, capture it into the output buffer, and then return it.
	ob_start();
	include( $config['view'] );

	return ob_get_clean();
}

/**
 * Get the runtime configuration parameters for the specified shortcode.
 *
 * @since 1.0.0
 *
 * @param string $shortcode_name Name of the shortcode
 *
 * @return array|false
 */
function get_shortcode_configuration( $shortcode_name ) {
	return _shortcode_configuration_store( $shortcode_name );
}

/**
 * Store the shortcode runtime configuration parameters into the
 * static store.
 *
 * @since 1.0.0
 *
 * @param string $shortcode_name Name of the shortcode
 * @param array $config Array of runtime configuration parameters to store.
 *
 * @return array|false
 */
function store_shortcode_configuration( $shortcode_name, $config ) {
	return _shortcode_configuration_store( $shortcode_name, $config );
}

/**
 * Shortcode configuration store.
 *
 * 1. Storing the configurations into a static store.
 * 2. Getting the configuration out of the store.
 *
 * @since 1.0.0
 *
 * @param string $shortcode_name Name of the shortcode to be used as a key.
 * @param array $config Array of runtime configuration parameters to store.
 *                      (optional)
 *
 * @return array|false
 */
function _shortcode_configuration_store( $shortcode_name, $config = false ) {
	static $configurations = array();

	if ( ! isset( $configurations[ $shortcode_name ] ) ) {
		$configurations[ $shortcode_name ] = $config;
	}

	return $configurations[ $shortcode_name ];
}
