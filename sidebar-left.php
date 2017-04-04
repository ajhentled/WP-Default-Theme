<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package JDA
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="secondary col-md-4 col-md-pull-8" role="complementary">

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="sidebar" class="widget-area clearfix" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>

</div><!-- #secondary -->
