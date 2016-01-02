<?php
/**
 * Enqueue all styles scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 0.0.2
 */

if ( ! function_exists( 'doublee_styles' ) ) :

	function doublee_styles() {

		// Enqueue the main Stylesheet.
		$theme = wp_get_theme();
		$version = $theme->get( 'Version' );
		wp_enqueue_style( 'main-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), $version, 'all' );

	}
	
	add_action( 'wp_enqueue_scripts', 'doublee_styles' );
endif;

?>
