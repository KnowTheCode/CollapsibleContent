<?php
/**
 * Shortcode Handler
 *
 * @package     KnowTheCode\CollapsibleContent\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\CollapsibleContent\Shortcode;

add_shortcode( 'collapsible_content', __NAMESPACE__ . '\render_collapsible_content_shortcode' );
add_shortcode( 'qa', __NAMESPACE__ . '\render_collapsible_content_shortcode' );
/**
 * Process the shortcode, build the HTML, and then return it back.
 *
 * @since 1.0.0
 *
 * @param array $user_defined_attributes User defined shortcode attributes
 *                                       passed from the content to this callback.
 * @param string $content Content between the opening & closing shortcode declarations
 * @param string $shortcode_name Shortcode name.
 *
 * @return string Shortcode HTML
 */
function render_collapsible_content_shortcode( $user_defined_attributes, $content, $shortcode_name ) {
	$config     = get_shortcode_defaults( $shortcode_name, 'shortcode/' );
	$attributes = shortcode_atts(
		$config['defaults'],
		$user_defined_attributes,
		$shortcode_name
	);

	$content = $content ? do_shortcode( $content ) : '';
	$id      = isset( $attributes['id'] ) ? esc_attr( $attributes['id'] ) : '';
	$class   = isset( $attributes['class'] ) ? esc_attr( $attributes['class'] ) : '';

	if ( $shortcode_name == 'collapsible_content' ) {
		$visible_label = esc_html( $attributes['visible_label'] );
	}

	ob_start();

	include( $config['view'] );

	return ob_get_clean();
}

/**
 * Get the shortcode defaults.
 *
 * @since 1.0.0
 *
 * @param string $shortcode_name
 *
 * @return array
 */
function get_shortcode_defaults( $shortcode_name ) {
	if ( $shortcode_name == 'qa' ) {
		return array(
			'shortcode' => 'qa',
			'view'      => __DIR__ . '/views/qa.php',
			'defaults'  => array(
				'id'        => '',
				'class'     => '',
				'question'  => '',
				'show_icon' => 'dashicons dashicons-arrow-down-alt2',
				'hide_icon' => 'dashicons dashicons-arrow-up-alt2',
			),
		);
	}

	return array(
		'shortcode' => 'collapsible_content',
		'view'      => __DIR__ . '/views/collapsible-content.php',
		'defaults'  => array(
			'id'            => '',
			'class'         => '',
			'visible_label' => __( 'Show content', COLLAPSIBLE_CONTENT_TEXT_DOMAIN ),
			'hidden_label'  => __( 'Hide content', COLLAPSIBLE_CONTENT_TEXT_DOMAIN ),
			'show_icon'     => 'dashicons dashicons-arrow-down-alt2',
			'hide_icon'     => 'dashicons dashicons-arrow-up-alt2',
		),
	);
}