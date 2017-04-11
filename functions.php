<?php
/**
 * WP Default - Components functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Default_-_Components
 */

if ( ! function_exists( 'scwd_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function scwd_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'scwd' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'scwd', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'scwd-featured-image', 640, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'top' => esc_html__( 'Top Menu', 'scwd' ),
		'bottom' => esc_html__( 'Bottom Menu', 'scwd' ),
		'social' => esc_html__( 'Social Links Menu', 'scwd' ),
		) );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 300,
		'width'       => 300,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/**
	 * Add theme support for selective refresh for widgets.
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	/*add_theme_support( 'custom-background', apply_filters( 'scwd_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );*/
}
endif;
add_action( 'after_setup_theme', 'scwd_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function scwd_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'scwd_content_width', 640 );
}
add_action( 'after_setup_theme', 'scwd_content_width', 0 );

/**
 * Return early if Custom Logos are not available.
 *
 * @todo Remove after WP 4.7
 */
function scwd_the_custom_logo() {
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	} else {
		the_custom_logo();
	}
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function scwd_widgets_init() {
	register_sidebar( array(
		'name'			=> esc_html__( 'Sidebar', 'scwd' ),
		'id'			=> 'sidebar-1',
		'description'	=> '',
		'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );

	// Banner (After Header) Widget Area. Single column
	register_sidebar( array(
		'name'			=> __( 'Banner', 'scwd' ),
		'id'			=> 'banner',
		'description'	=> __( 'Optional section after the header. This is a single column area that spans the full width of the page.', 'scwd' ),
		'before_widget'	=> '<section id="%1$s" class="widget %2$s clearfix"><div class="container">',
		'after_widget'	=> '</div><!-- container --></section>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	) );

	// Page Top (After Banner) Widget Area.
	register_sidebar( array(
		'name'			=> __( 'Page Top', 'scwd' ),
		'id'			=> 'page-top',
		'description'	=> __( 'Optional section after the banner. Add 1-4 widgets here to display in columns.', 'scwd' ),
		'before_widget'	=> '<section id="%1$s" class="widget col-sm-3 clearfix %2$s">',
		'after_widget'	=> "</section>",
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );

	// Page Bottom (Before Footer) Widget Area.
	register_sidebar( array(
		'name'			=> __( 'Page Bottom', 'scwd' ),
		'id'			=> 'page-bottom',
		'description'	=> __( 'Optional section before the footer. Add 1-3 widgets here to display in columns.', 'scwd' ),
		'before_widget'	=> '<section id="%1$s" class="widget col-sm-4 clearfix %2$s">',
		'after_widget'	=> "</section>",
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
}
add_action( 'widgets_init', 'scwd_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function scwd_scripts() {

	/* Fonts */
	wp_enqueue_style( 'scwd-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans' );
	wp_enqueue_style( 'scwd-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');

	/* Load Stylesheets */
	// Bootstrap
	wp_enqueue_style( 'scwd-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
	wp_enqueue_style( 'scwd-bootstrap-theme', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css');
	// Social Menu
	wp_enqueue_style( 'scwd-social-menu', get_template_directory_uri() . '/assets/css/social-menu.css');
	// Theme Base
	wp_enqueue_style( 'scwd-theme-base', get_template_directory_uri() . '/assets/css/theme-base.css');
	// Main Styles
	wp_enqueue_style( 'scwd-style', get_stylesheet_uri() );

	/* Load Java Scripts */
	// Bootstrap
	wp_enqueue_script( 'scwd-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '', true );
	// Navigation
	wp_enqueue_script( 'scwd-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'scwd-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	// Scripts
	wp_enqueue_script( 'scwd-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'scwd_scripts' );

/**
 * Enable shortcodes in text widgets.
 */
// add_filter('widget_text','do_shortcode');

/**
 * Disable XML-RPC.
 */
// add_filter('xmlrpc_enabled', '__return_false');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Theme options shortcode generator.
 */
require get_template_directory() . '/inc/shortcode-generator.php';

/**
 * Custom theme options.
 */
// require get_template_directory() . '/inc/custom-theme-options.php';

/**
 * Load suggested plugins file to display admin notices.
 */
require get_template_directory() . '/inc/engagewp-plugins.php';

/**
 * Load WooCommerce compatibility.
 */
// require get_template_directory() . '/inc/wc-compatiblity.php';

/**
 * Create custom post types and taxomy.
 */
// require get_template_directory() . '/inc/custom-post-types.php';