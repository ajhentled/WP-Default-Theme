<?php
/**
 * WP Default Custom Post Types Sample
 *
 * @package WP_Default
 */
function scwd_create_post_type() {
	$labels = array(
		'name'					=> __( 'Projects', 'scwd' ),
		'singular_name'			=> __( 'Project', 'scwd' ),
		'add_new'				=> __( 'New Project', 'scwd' ),
		'add_new_item'			=> __( 'Add New Project', 'scwd' ),
		'edit_item'				=> __( 'Edit Project', 'scwd' ),
		'new_item'				=> __( 'New Project', 'scwd' ),
		'view_item'				=> __( 'View Project', 'scwd' ),
		'search_items'			=> __( 'Search Projects', 'scwd' ),
		'not_found'				=>  __( 'No Projects Found', 'scwd' ),
		'not_found_in_trash'	=> __( 'No Projects found in Trash', 'scwd' ),
	);
	$args = array(
		'labels'		=> $labels,
		'has_archive'	=> true,
		'public'		=> true,
		'hierarchical'	=> false,
		'rewrite'		=> array( 'slug' => 'projects' ),
		'supports'		=> array(
			'title',
			'editor',
			'excerpt',
			'custom-fields',
			'thumbnail',
			'page-attributes'
		),
		'taxonomies'	=> array( 'post_tag' ),
	);
	register_post_type( 'project', $args );
}
add_action( 'init', 'scwd_create_post_type' );

function scwd_register_taxonomy() {

	$labels = array(
		'name'				=> __( 'Categories', 'scwd' ),
		'singular_name'		=> __( 'Service', 'scwd' ),
		'search_items'		=> __( 'Search Categories', 'scwd' ),
		'all_items'			=> __( 'All Categories', 'scwd' ),
		'edit_item'			=> __( 'Edit Category', 'scwd' ),
		'update_item'		=> __( 'Update Category', 'scwd' ),
		'add_new_item'		=> __( 'Add New Category', 'scwd' ),
		'new_item_name'		=> __( 'New Service Name', 'scwd' ),
		'menu_name'			=> __( 'Categories', 'scwd' ),
	);

	$args = array(
		'labels'			=> $labels,
		'hierarchical'		=> true,
		'sort'				=> true,
		'args'				=> array( 'orderby' => 'term_order' ),
		// 'rewrite'			=> array( 'slug' => 'services' ),
		'show_admin_column'	=> true
	);

	register_taxonomy( 'project_cat', array( 'project' ), $args);

}
add_action( 'init', 'scwd_register_taxonomy' );