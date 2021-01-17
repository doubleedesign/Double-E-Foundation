<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 3.0.0
 *
 * Note: WooCommerce support is declared in functions/woocommerce.php due to the custom settings available
 */
function doublee_theme_support() {
	// Add language support
	load_theme_textdomain('', get_template_directory() . '/languages');

	// Add menu support
	add_theme_support('menus');

	// Let WordPress manage the document title
	add_theme_support('title-tag');

	// Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');

	// RSS
	add_theme_support('automatic-feed-links');

	// Add post formats support: http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('gallery', 'video'));

	// Use HTML5 for some things that don't use it by default
	add_theme_support('html5', array(
		'gallery',
		'search-form',
		'caption'
	));
}
add_action('after_setup_theme', 'doublee_theme_support');


function doublee_post_type_support() {

	// Add Excerpt support to pages
	add_post_type_support('page', 'excerpt');
}

add_action('init', 'doublee_post_type_support');
