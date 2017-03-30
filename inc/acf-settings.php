<?php
/**
 * WP Default - Components ACF PRO Settings.
 *
 * @package WP_Default_-_Components
 */

/* Checks to see if “is_plugin_active” function exists and if not load the php file that includes that function */
if ( ! function_exists( 'is_plugin_active' ) ) {
	include_once ( ABSPATH . 'wp-admin/includes/plugin.php' );
}

/* Checks to see if the acf plugin is activated  */
if ( is_plugin_active( 'advanced-custom-fields/acf.php' ) )  {
	deactivate_plugins( 'advanced-custom-fields/acf.php' );
}

/* Checks to see if the acf pro plugin is activated */
if ( !is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
	/* Customize ACF path */
	add_filter( 'acf/settings/path', 'scwd_acf_settings_path' );

	function scwd_acf_settings_path( $path ) {
		// update path
		$path = get_stylesheet_directory() . '/lib/advanced-custom-fields-pro/';

		// return
		return $path;
	}

	/* Customize ACF dir */
	add_filter('acf/settings/dir', 'scwd_acf_settings_dir');

	function scwd_acf_settings_dir( $dir ) {
		// update path
		$dir = get_stylesheet_directory_uri() . '/lib/advanced-custom-fields-pro/';

		// return
		return $dir;
	}


	/* Hide ACF field group menu item */
	add_filter('acf/settings/show_admin', '__return_false');

	/* Include ACF */
	include_once ( get_stylesheet_directory() . '/lib/advanced-custom-fields-pro/acf.php' );

	/* Saving acf group fields */
	// add_filter('acf/settings/save_json', 'scwd_acf_json_save_point');

	function scwd_acf_json_save_point( $path ) {
		// update path
		$path = get_stylesheet_directory() . '/acf-json';

		// return
		return $path;
	}

	/* Load acf group fields */
	// add_filter('acf/settings/load_json', 'scwd_acf_json_load_point');

	function scwd_acf_json_load_point( $paths ) {
		// remove original path (optional)
		unset($paths[0]);

		// append path
		$paths[] = get_stylesheet_directory() . '/acf-json';

		// return
		return $paths;
	}

	/* ACF Options Page */
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Theme Header Settings',
			'menu_title'	=> 'Header',
			'parent_slug'	=> 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Theme Footer Settings',
			'menu_title'	=> 'Footer',
			'parent_slug'	=> 'theme-general-settings',
		));

	}
}
