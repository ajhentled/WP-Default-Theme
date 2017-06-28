<?php
/**
 * Template Name: Page - Full Width
 *
 * Page with no sidebar, but still contained within the page margins
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Default
 */

get_header(); ?>

<div class="container-fluid">
	<div class="row">
		<div id="primary" class="content-area col-sm-12">
			<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'components/page/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .row -->
</div><!-- .container-fluid -->

<?php get_footer(); ?>