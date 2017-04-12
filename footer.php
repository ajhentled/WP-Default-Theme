<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Default_-_Components
 */

?>
			</div><!-- .row -->
		</div><!-- .container-fluid -->
	</div><!-- .site-content -->

	<?php get_template_part( 'components/page/content', 'page-bottom' ); ?>

	<footer id="colophon" class="site-footer main" role="contentinfo">

		<?php if ( has_nav_menu( 'bottom' ) ) : ?>
			<div class="navigation-bottom">
				<div class="container-fluid wrap">
					<?php get_template_part( 'components/navigation/navigation', 'bottom' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

		<?php get_template_part( 'components/footer/site', 'info' ); ?>

	</footer>

</div>
<?php wp_footer(); ?>

</body>
</html>
