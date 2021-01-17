<?php
/**
 * Enqueue scripts
 *
 * @link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 5.0
 */
function doublee_scripts() {
	$theme = wp_get_theme();
	$version = $theme->get('Version');

	// jQuery - use Foundation's version
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), '3.1.1', false);

	// InView (non IE browsers)
	wp_enqueue_script('inview', get_template_directory_uri() . '/javascript/min/inview.min.js', array('jquery'), $version, true);

	// Theme JavaScript - includes Foundation plugins and others compiled into it
	wp_enqueue_script('theme', get_template_directory_uri() . '/javascript/min/theme.min.js', array('jquery'), $version, true);

	// Font Awesome (insert kit URL here)
	wp_enqueue_script('fontawesome', '', array(), $version, true);

	// Add the comment-reply library on pages where it is necessary
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'doublee_scripts');