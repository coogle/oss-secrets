<?php

add_action('init', 'portfolio_register');  
   
function portfolio_register() {

	$labels = array(
		'name'               => _x( 'Portfolio items', 'post type general name', 'planuswp' ),
		'singular_name'      => _x( 'Portfolio item', 'post type singular name', 'planuswp' ),
		'menu_name'          => _x( 'Portfolio items', 'admin menu', 'planuswp' ),
		'name_admin_bar'     => _x( 'Portfolio items', 'add new on admin bar', 'planuswp' ),
		'add_new'            => _x( 'Add New', 'book', 'planuswp' ),
		'add_new_item'       => __( 'Add New Portfolio item', 'planuswp' ),
		'new_item'           => __( 'New Portfolio item', 'planuswp' ),
		'edit_item'          => __( 'Edit Portfolio item', 'planuswp' ),
		'view_item'          => __( 'View Portfolio item', 'planuswp' ),
		'all_items'          => __( 'All Portfolio items', 'planuswp' ),
		'search_items'       => __( 'Search Portfolios items', 'planuswp' ),
		'parent_item_colon'  => __( 'Parent Portfolios item:', 'planuswp' ),
		'not_found'          => __( 'No Portfolio items found.', 'planuswp' ),
		'not_found_in_trash' => __( 'No Portfolios items found in Trash.', 'planuswp' ),
	);

	$args = array(  
		'labels'				=> $labels,
		'public'				=> true,
		'menu_icon'				=> 'dashicons-portfolio',
		'show_ui'				=> true,  
		'capability_type'		=> 'post',  
		'hierarchical'			=> false,  
		'has_archive'			=>true,
		'rewrite'				=> array(
			'slug'			=>'portfolio',
			'with_front'	=> false,
			'feed'			=> true,
			'pages'			=> true
		),
		'supports'				=> array('title', 'editor', 'thumbnail')  
	);
	register_post_type( 'portfolio' , $args );
	// flush_rewrite_rules( false );
}


// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_portfolio_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_portfolio_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Portfolio Category', 'taxonomy general name' ),
		'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Portfolio Categories' ),
		'all_items'         => __( 'All Portfolio Categories' ),
		'parent_item'       => __( 'Parent Portfolio Category' ),
		'parent_item_colon' => __( 'Parent Portfolio Category:' ),
		'edit_item'         => __( 'Edit Portfolio Category' ),
		'update_item'       => __( 'Update Portfolio Category' ),
		'add_new_item'      => __( 'Add New Portfolio Category' ),
		'new_item_name'     => __( 'New Portfolio Name' ),
		'menu_name'         => __( 'Portfolio Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => true,
	);

	register_taxonomy( 'portfoliocats', array( 'portfolio' ), $args );
}

?>