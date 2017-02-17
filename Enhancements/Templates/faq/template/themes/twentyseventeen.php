<?php
/**
 * FAQ Archive Template for Twenty Seventeen
 *
 * @package     KnowTheCode\Module\FAQ\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowTheCode\Module\FAQ\Template;

get_header(); ?>

	<div class="wrap">

		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
		<?php endif; ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php do_faq_archive_loop(); ?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div><!-- .wrap -->

<?php get_footer();