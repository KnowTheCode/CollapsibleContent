<?php
/**
 * FAQ Shortcode Processing
 *
 * @package     KnowTheCode\CollapsibleContent\FAQ\Shortcode
 * @since       1.1.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\CollapsibleContent\FAQ\Shortcode;

add_shortcode( 'faq', __NAMESPACE__ . '\process_the_shortcode' );
/**
 * Process the FAQ Shortcode to build a list of FAQs.
 *
 * @since 1.1.0
 *
 * @param array|string $user_defined_attributes User defined attributes for this shortcode instance
 * @param string|null $hidden_content Content between the opening and closing shortcode elements
 * @param string $shortcode_name Name of the shortcode
 *
 * @return string
 */
function process_the_shortcode( $user_defined_attributes, $hidden_content, $shortcode_name ) {
	$config = get_shortcode_configuration();

	$attributes = shortcode_atts(
		$config['defaults'],
		$user_defined_attributes,
		$shortcode_name
	);

	if ( $attributes['post_id'] < 1 && ! $attributes['topic'] ) {
		return '';
	}

	$attributes['show_icon'] = esc_attr( $attributes['show_icon'] );

	$function_to_call = __NAMESPACE__ . '\\';
	$function_to_call .= $attributes['post_id'] > 0
		? 'render_single_faq'
		: 'loop_and_render_faqs_by_term';

	ob_start();
	include( __DIR__ . '/views/container.php' );

	return ob_get_clean();
}

/**
 * Render a single FAQ.
 *
 * @since 1.1.0
 *
 * @param array $attributes
 *
 * @return void
 */
function render_single_faq( array $attributes ) {
	$post_id = $attributes['post_id'];
	$post    = get_post( $post_id );
	if ( ! $post ) {
		return;
	}

	$post_title     = $post->post_title;
	$hidden_content = do_shortcode( $post->post_content );

	include( __DIR__ . '/views/faq.php' );
}

/**
 * Loop through and render the FAQs by the specified term.
 *
 * @since 1.1.0
 *
 * @param array $attributes
 *
 * @return void
 */
function loop_and_render_faqs_by_term( array $attributes ) {
	$args = array(
		'posts_per_page' => - 1,
		'post_type'      => 'faq',
		'post_status'    => 'publish',
		'tax_query'      => array(
			array(
				'taxonomy' => 'faq_topic',
				'field'    => 'slug',
				'terms'    => $attributes['topic'],
			),
		),
		'orderby'        => 'menu_order',
	);

	$query = new \WP_Query( $args );
	if ( ! $query->have_posts() ) {
		return;
	}

	while ( $query->have_posts() ) {
		$query->the_post();
		$post_title     = get_the_title();
		$hidden_content = do_shortcode( get_the_content() );

		include( __DIR__ . '/views/faq.php' );
	}

	wp_reset_postdata();
}

/**
 * Get the runtime configuration parameters for the specified shortcode.
 *
 * @since 1.1.0
 *
 * @return array
 */
function get_shortcode_configuration() {
	$config = array(
		'view'     => __DIR__ . '/views/faq.php',
		'defaults' => array(
			'show_icon' => 'dashicons dashicons-arrow-down-alt2',
			'hide_icon' => 'dashicons dashicons-arrow-up-alt2',
			'post_id'   => 0,
			'topic'     => '',
		),
	);

	return $config;
}