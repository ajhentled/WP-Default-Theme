<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Default
 */

?>
	</div><!-- .site-content -->

	<?php get_template_part( 'template-parts/page/content', 'page-bottom' ); ?>

	<footer id="colophon" class="site-footer main">

		<?php if ( has_nav_menu( 'bottom' ) ) : ?>
			<div class="navigation-bottom">
				<div class="container-fluid wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'bottom' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

		<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>

	</footer>

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
