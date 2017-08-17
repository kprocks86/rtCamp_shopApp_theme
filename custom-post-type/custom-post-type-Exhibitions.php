<?php
// Our custom post type function
function create_posttype() {

	register_post_type( 'Exhibitions',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Exhibitions' ),
				'singular_name' => __( 'Exhibition' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'Exhibitions'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

/*
* Creating a function to create our CPT
*/

function custom_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Exhibitions', 'Post Type General Name', 'rtcampOne' ),
		'singular_name'       => _x( 'Exhibition', 'Post Type Singular Name', 'rtcampOne' ),
		'menu_name'           => __( 'Exhibitions', 'rtcampOne' ),
		'parent_item_colon'   => __( 'Parent Exhibition', 'rtcampOne' ),
		'all_items'           => __( 'All Exhibitions', 'rtcampOne' ),
		'view_item'           => __( 'View Exhibition', 'rtcampOne' ),
		'add_new_item'        => __( 'Add New Exhibition', 'rtcampOne' ),
		'add_new'             => __( 'Add New', 'rtcampOne' ),
		'edit_item'           => __( 'Edit Exhibition', 'rtcampOne' ),
		'update_item'         => __( 'Update Exhibition', 'rtcampOne' ),
		'search_items'        => __( 'Search Exhibition', 'rtcampOne' ),
		'not_found'           => __( 'Not Found', 'rtcampOne' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'rtcampOne' ),
	);

// Set other options for Custom Post Type

	$args = array(
		'label'               => __( 'Exhibitions', 'rtcampOne' ),
		'description'         => __( 'Exhibition news and reviews', 'rtcampOne' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy.
		'taxonomies'          => array( 'genres' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	// Registering your Custom Post Type
	register_post_type( 'Exhibitions', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'custom_post_type', 0 );



