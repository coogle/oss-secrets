<?php

add_action('init', 'testimonials_register');  
   
function testimonials_register() {

	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name', 'planuswp' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name', 'planuswp' ),
		'menu_name'          => _x( 'Testimonials', 'admin menu', 'planuswp' ),
		'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'planuswp' ),
		'add_new'            => _x( 'Add New', 'book', 'planuswp' ),
		'add_new_item'       => __( 'Add New Testimonial', 'planuswp' ),
		'new_item'           => __( 'New Testimonial', 'planuswp' ),
		'edit_item'          => __( 'Edit Testimonial', 'planuswp' ),
		'view_item'          => __( 'View Testimonial', 'planuswp' ),
		'all_items'          => __( 'All Testimonials', 'planuswp' ),
		'search_items'       => __( 'Search Testimonials', 'planuswp' ),
		'parent_item_colon'  => __( 'Parent Testimonials:', 'planuswp' ),
		'not_found'          => __( 'No Testimonials found.', 'planuswp' ),
		'not_found_in_trash' => __( 'No Testimonials found in Trash.', 'planuswp' ),
	);

	$args = array(  
		'labels'             => $labels,
		'public'             => true,
		'menu_icon'          => 'dashicons-editor-quote',
		'show_ui'            => true,  
		'capability_type'    => 'post',  
		'hierarchical'       => false,  
		'rewrite'            => true,  
		'supports'           => array('title', 'editor', 'thumbnail')  
	);  
   
	register_post_type( 'testimonial' , $args );  
}


// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_testimonial_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_testimonial_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Testimonial Category', 'taxonomy general name' ),
		'singular_name'     => _x( 'Testimonial Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Testimonial Categories' ),
		'all_items'         => __( 'All Testimonial Categories' ),
		'parent_item'       => __( 'Parent Testimonial Category' ),
		'parent_item_colon' => __( 'Parent Testimonial Category:' ),
		'edit_item'         => __( 'Edit Testimonial Category' ),
		'update_item'       => __( 'Update Testimonial Category' ),
		'add_new_item'      => __( 'Add New Testimonial Category' ),
		'new_item_name'     => __( 'New Testimonial Name' ),
		'menu_name'         => __( 'Testimonial Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => true,
	);

	register_taxonomy( 'testimonials', array( 'testimonial' ), $args );
}

?>