<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Default
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'components/page/content', 'page-front' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();

get_footer();