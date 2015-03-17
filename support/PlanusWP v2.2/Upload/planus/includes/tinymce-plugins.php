<?php

// Hooks your functions into the correct filters
function mce_shortcodes_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'add_tinymce_shortcodes_plugin' );
		add_filter( 'mce_buttons', 'register_mce_shortcodes_button' );
	}
}
add_action('admin_head', 'mce_shortcodes_button');

// Declare script for new button
function add_tinymce_shortcodes_plugin( $plugin_array ) {
	$plugin_array['shortcodes_mce_button'] = get_template_directory_uri() .'/admin/js/mce-button.js';
	return $plugin_array;
}

// Register new button in the editor
function register_mce_shortcodes_button( $buttons ) {
	array_push( $buttons, 'shortcodes_mce_button' );
	return $buttons;
}

function shortcodes_mce_css() {
	wp_enqueue_style('admin-css', get_template_directory_uri() .'/admin/css/style.css');
}
add_action( 'admin_enqueue_scripts', 'shortcodes_mce_css' );

?>