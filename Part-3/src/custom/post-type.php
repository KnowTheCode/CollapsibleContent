<?php
/**
 * Custom Post Type Handler - this code generator handles building the
 * labels, arguments, and then registering the post type with WordPress.
 *
 * @package     KnowTheCode\Module\Custom
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\Custom;

add_action( 'init', __NAMESPACE__ . '\register_the_custom_post_types' );
/**
 * Register the custom post type(s).
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_the_custom_post_types() {
	$post_types_config = apply_filters( 'get_custom_post_types_runtime_config', array() );

	foreach ( $post_types_config as $post_type => $config ) {
		register_the_custom_post_type( $post_type, $config );
	}
}

/**
 * Register a custom post type.
 *
 * @since 1.0.0
 *
 * @param $post_type
 * @param array $config
 *
 * @return void
 */
function register_the_custom_post_type( $post_type, array $config ) {
	$args = $config['args'];

	if ( ! $args['labels'] ) {
		$args['labels'] = generate_the_custom_labels( $post_type, $config['labels'] );
	}

	if ( ! $args['supports'] ) {
		$args['supports'] = get_custom_post_type_features( $config['features'] );
	}

	register_post_type( $post_type, $args );
}

/**
 * Get the custom post type's support features configuration.
 *
 * @since 1.0.0
 *
 * @param array $features_config Array of support features configuration parameters
 *
 * @return array
 */
function get_custom_post_type_features( array $features_config ) {
	$features = generate_custom_post_type_features(
		$features_config['get_features'],
		$features_config['exclude']
	);

	return array_merge( $features_config['additional'], $features );
}

/**
 * Get all the post type features for the given post type.
 *
 * @since 1.0.0
 *
 * @param string $post_type Given post type
 * @param array $exclude_features Array of features to exclude
 *
 * @return array
 */
function generate_custom_post_type_features( $post_type = 'post', $exclude_features = array() ) {
	$configured_features = get_all_post_type_supports( $post_type );

	if ( ! $exclude_features ) {
		return array_keys( $configured_features );
	}

	$features = array();

	foreach ( $configured_features as $feature => $value ) {
		if ( in_array( $feature, $exclude_features ) ) {
			continue;
		}

		$features[] = $feature;
	}

	return $features;
}
