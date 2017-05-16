<?php
/**
 * Menu class filters
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 2.2.3
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

?>