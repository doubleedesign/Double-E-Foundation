<?php
/**
 * Enqueue styles
 *
 * @link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 3.0.0
 */

if ( ! function_exists( 'doublee_styles' ) ) {

	function doublee_styles() {

		$theme = wp_get_theme();
		$version = $theme->get('Version');

		// Theme stylesheet
		wp_enqueue_style('theme', get_stylesheet_directory_uri() . '/style.css', array(), $version, 'all');

	}

	add_action('wp_enqueue_scripts', 'doublee_styles');

}