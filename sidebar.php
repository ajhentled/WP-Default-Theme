<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Default_-_Components
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="secondary widget-area col-sm-4" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
