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
		</div><!-- .container -->
	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer main" role="contentinfo">
		<div class="container">
			<div class="row">
				<?php get_template_part( 'components/footer/site', 'info' ); ?>
			</div>
		</div>
	</footer>

</div>
<?php wp_footer(); ?>

</body>
</html>
