<?php
/**
 * Template Name: Page - Right Sidebar
 *
 * This is the template that displays pages with the sidebar on the right.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package JDA
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-8">
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

<?php
get_sidebar();

get_footer();