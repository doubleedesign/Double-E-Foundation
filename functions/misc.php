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


?>