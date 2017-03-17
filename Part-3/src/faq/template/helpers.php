<?php
/**
 * Template Helpers
 *
 * @package     KnowTheCode\Module\FAQ\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\FAQ\Template;

add_filter( 'archive_template', __NAMESPACE__ . '\load_the_faq_archive_template' );
/**
 * Load the FAQ Archive template from our plugin.
 *
 * @since 1.0.0
 *
 * @param string $theme_archive_template Full qualified path to the archive template
 *
 * @return string
 */
function load_the_faq_archive_template( $theme_archive_template ) {

	if ( ! is_post_type_archive( 'faq' ) ) {
		return $theme_archive_template;
	}

	$plugin_archive_template = __DIR__ . '/archive-faq.php';

	if ( ! $theme_archive_template ) {
		return $plugin_archive_template;
	}

	if ( strpos( $theme_archive_template, '/archive-faq.php' ) === false ) {
		return $plugin_archive_template;
	}

	return $theme_archive_template;
}

/**
 * Gets all of the posts grouped by terms for the specified
 * post type and taxonomy.
 *
 * Results are grouped by terms and ordered by the term and post IDs.
 *
 * @since 1.0.0
 *
 * @param string $post_type_name Post type to limit query to
 * @param string $taxonomy_name Taxonomy to limit query to
 *
 * @return array|false
 */
function get_posts_grouped_by_term( $post_type_name, $taxonomy_name ) {
	$records = get_posts_grouped_by_term_from_db( $post_type_name, $taxonomy_name );

	$groupings = array();
	foreach ( $records as $record ) {
		$term_id = (int) $record->term_id;
		$post_id = (int) $record->post_id;

		if ( ! array_key_exists( $term_id, $groupings ) ) {
			$groupings[ $term_id ] = array(
				'term_id'   => $term_id,
				'term_name' => $record->term_name,
				'term_slug' => $record->term_slug,
				'posts'     => array(),
			);
		}

		$groupings[ $term_id ]['posts'][ $post_id ] = array(
			'post_id'      => $post_id,
			'post_title'   => $record->post_title,
			'post_content' => $record->post_content,
			'menu_order'   => $record->menu_order,
		);
	}

	return $groupings;
}

/**
 * Gets all of the posts grouped by terms for the specified
 * post type and taxonomy.
 *
 * Results are grouped by terms and ordered by the term and post IDs.
 *
 * @since 1.0.0
 *
 * @param string $post_type_name Post type to limit query to
 * @param string $taxonomy_name Taxonomy to limit query to
 *
 * @return array|false
 */
function get_posts_grouped_by_term_from_db( $post_type_name, $taxonomy_name ) {
	global $wpdb;

	$sql_query =
		"SELECT t.term_id, t.name AS term_name, t.slug AS term_slug, p.ID AS post_id, p.post_title, p.post_content, p.menu_order
FROM {$wpdb->term_taxonomy} AS tt
INNER JOIN {$wpdb->terms} AS t ON (tt.term_id = t.term_id)
INNER JOIN {$wpdb->term_relationships} AS tr ON (tt.term_taxonomy_id = tr.term_taxonomy_id)
INNER JOIN {$wpdb->posts} AS p ON (tr.object_id = p.ID)
WHERE p.post_status = 'publish' AND p.post_type = %s AND tt.taxonomy = %s
GROUP BY t.term_id, p.ID
ORDER BY t.term_id, p.menu_order ASC;";

	$sql_query = $wpdb->prepare( $sql_query, $post_type_name, $taxonomy_name );

	$results = $wpdb->get_results( $sql_query );
	if ( ! $results || ! is_array( $results ) ) {
		return false;
	}

	return $results;
}
