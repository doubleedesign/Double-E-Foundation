<?php
/**
 * Miscellaneous functions
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 2.1.3
 */

/* ==========================================
	ADD SLUGS TO NAVIGATION MENU ITEMS
============================================*/
function doublee_menu_classes( $atts, $item, $args ) {
    // Get the menu item title and put it into lowercase
	$slug = strtolower($item->title);
	// Remove ampersands
	$slug = str_replace('&', '', $slug); 
	$slug = str_replace('#038;', '', $slug); 
	// Replace spaces with hyphens
	$slug = preg_replace('#[ -]+#', '-', $slug);
	// Add the final slug
	$atts['class'] = 'menu-item-'.$slug;
    return $atts;
}
add_filter( 'nav_menu_css_class', 'doublee_menu_classes', 10, 3 );


/* ==========================================
	ADD PARENT PAGE SLUG TO THE BODY CLASS
	(Adds both to the parent page itself and its child pages)
============================================*/
function doublee_body_class_section($classes) {  
	global $wpdb, $post;  
	$current_page_id = $post->ID;
	if (is_page()) {  
		if ($post->post_parent) {  
			$parent  = end(get_post_ancestors($current_page_id));  
		} else {  
			$parent = $post->ID;  
		}  
		$post_data = get_post($parent, ARRAY_A);  
		$classes[] = 'section-' . $post_data['post_name'];  
	}  
	return $classes;  
}  
add_filter('body_class', 'doublee_body_class_section'); 


/* ==========================================
	MOVE YOAST SEO TO THE BOTTOM OF EDIT SCREENS
============================================*/

add_filter( 'wpseo_metabox_prio', 'doublee_move_yoast_seo_metabox' );
function doublee_move_yoast_seo_metabox() {
	return 'low';
}


/* ==========================================
	STRIP HEADINGS FROM EXCERPTS AND SET THE LENGTH
	Template usage: echo doublee_custom_excerpt() instead of the_excerpt()
	This will ignore manual excerpts so best to run a has_excerpt() check to output the manual excerpt first
============================================*/

function doublee_custom_excerpt() {
	 // Retrieve the excerpt content
	 $text = get_the_content(); 
	 // Remove shortcode tags from the given content
	 $text = strip_shortcodes( $text );
	 $text = apply_filters('the_content', $text);
	 $text = str_replace(']]>', ']]&gt;', $text);

	 // Regular expression that strips the header tags and their content
	 $regex = '#(<h([1-6])[^>]*>)\s?(.*)?\s?(<\/h\2>)#';
	 $text = preg_replace($regex,'', $text);

	 // Set the word count
	 $excerpt_word_count = 30; // WP default is 55
	 $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);

	 // Set the ending
	 $excerpt_end = '...'; // The WP default is [...]
	 $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);

	 $excerpt = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	 return wpautop(apply_filters('wp_trim_excerpt', $excerpt, $raw_excerpt));
}



?>