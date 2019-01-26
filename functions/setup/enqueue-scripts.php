<?php
/**
 * Enqueue scripts
 *
 * @link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 3.0.0
 */

if ( ! function_exists( 'doublee_scripts' ) ) {
	function doublee_scripts() {

		$theme = wp_get_theme();
		$version = $theme->get('Version');
		$browser = doublee_get_browser();

		/**
		 * Register and enqueue scripts
		 */

		// jQuery - use Foundation's version
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), '3.1.1', false);

		// InView (non IE browsers)
		if ($browser != 'ie') {
			wp_enqueue_script('inview', get_template_directory_uri() . '/assets/javascript/min/inview.min.js', array('jquery'), $version, true);
		}

		// Theme JavaScript - includes Foundation plugins and others compiled into it
		wp_enqueue_script('theme', get_template_directory_uri() . '/assets/javascript/min/theme.min.js', array('jquery'), $version, true);

		// Font Awesome
		wp_enqueue_script('fontawesome', get_template_directory_uri() . '/assets/javascript/min/fontawesome.min.js', array(), $version, true);

		// Add the comment-reply library on pages where it is necessary
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}

		/**
		 * Async or defer scripts where possible
		 */

		// Theme JS
		add_filter('script_loader_tag', 'themejs_defer', 10, 2);
		function themejs_defer($tag, $handle)
		{
			if ('theme' !== $handle)
				return $tag;
			return str_replace(' src', ' defer src', $tag);
		}

		// Font Awesome
		add_filter('script_loader_tag', 'fontawesome_defer', 10, 2);
		function fontawesome_defer($tag, $handle)
		{
			if ('fontawesome' !== $handle)
				return $tag;
			return str_replace(' src', ' defer src', $tag);
		}

		// InView
		add_filter('script_loader_tag', 'inview_defer', 10, 2);
		function inview_defer($tag, $handle)
		{
			if ('inview' !== $handle)
				return $tag;
			return str_replace(' src', ' defer src', $tag);
		}

		// WP-Embed
		add_filter('script_loader_tag', 'embedjs_defer', 10, 2);
		function embedjs_defer($tag, $handle)
		{
			if ('wp-embed' !== $handle)
				return $tag;
			return str_replace(' src', ' defer src', $tag);
		}
	}

	add_action('wp_enqueue_scripts', 'doublee_scripts');

}