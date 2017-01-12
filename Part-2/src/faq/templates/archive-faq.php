<?php
/**
 * FAQ Archive Template
 *
 * @package     KnowTheCode\Module\FAQ\Templates
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\FAQ\Templates;

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', __NAMESPACE__ . '\do_faq_archive_loop' );
/**
 * Do the FAQ Archive Loop and render out each FAQ
 *
 * @since 1.0.0
 *
 * @return void
 */
function do_faq_archive_loop() {
	$records = get_posts_grouped_by_term( 'faq', 'faq_topic' );
	if ( ! $records ) {
		echo '<p>Sorry, there are no FAQs.</p>';
		return;
	}

	foreach( $records as $record ) {
		include( __DIR__ . '/views/container.php' );
	}
}

/**
 * Loop through and render the FAQs.
 *
 * @since 1.0.0
 *
 * @param array $faqs
 *
 * @return void
 */
function loop_and_render_faqs( array $faqs ) {
	$attributes = array(
		'show_icon'      => 'dashicons dashicons-arrow-down-alt2',
		'hide_icon'      => 'dashicons dashicons-arrow-up-alt2',
	);

	foreach( $faqs as $faq ) {

		$hidden_content = do_shortcode( $faq['post_content'] );

		include( __DIR__ . '/views/faq.php' );
	}
}

genesis();