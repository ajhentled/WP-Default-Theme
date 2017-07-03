<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Default
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" /> -->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'scwd' ); ?></a>

	<header id="masthead" class="site-header main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<?php scwd_the_custom_logo(); ?>
					<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
				</div>
				<div class="col-sm-6">
					<?php get_template_part( 'template-parts/navigation/navigation', 'social' ); ?>
				</div>
			</div>
		</div>

		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<div class="container-fluid wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>
	</header>

	<?php if ( is_active_sidebar( 'banner' ) && is_front_page() ) : ?>
		<div id="banner" class="widget-area clearfix" >
			<?php dynamic_sidebar( 'banner' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>

	<?php get_template_part( 'template-parts/page/content', 'page-top' ) ?>

	<div id="content" class="site-content main">
