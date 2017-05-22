<?php
/**
 * Enqueue all scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 1.1.1
 */

if ( ! function_exists( 'doublee_scripts' ) ) :
	function doublee_scripts() {

		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );

		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '2.2.4', false );

		// Theme JavaScript - includes foundation.js and others compiled into it
		$theme = wp_get_theme();
		$version = $theme->get( 'Version' );
		wp_enqueue_script( 'Theme', get_template_directory_uri() . '/assets/javascript/min/theme.min.js', array('jquery'), $version, true );

		// Add the comment-reply library on pages where it is necessary
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// Async or defer scripts

			// Theme JS
			add_filter('script_loader_tag', 'themejs_defer', 10, 2);
			function themejs_defer($tag, $handle) {
				if ( 'theme' !== $handle)
				return $tag;
				return str_replace( ' src', ' defer src', $tag );
			}

			// WP-Embed
			add_filter('script_loader_tag', 'embedjs_defer', 10, 2);
			function embedjs_defer($tag, $handle) {
				if ( 'wp-embed' !== $handle)
				return $tag;
				return str_replace( ' src', ' defer src', $tag );
			}

	}

	add_action( 'wp_enqueue_scripts', 'doublee_scripts' );

endif;



?>
