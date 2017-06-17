<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 2.3.0
 */

register_nav_menus(array(
	'top-bar'  		=> 'Top Bar',
	'mobile-nav' 	=> 'Mobile',
	'footer-menu'	=> 'Footer menu'
));


/**
 * Desktop navigation - top bar
 */
if ( ! function_exists( 'doublee_top_bar_menu' ) ) {
	function doublee_top_bar_menu() {
		wp_nav_menu(array(
			'container' 		=> false, 			// Remove nav container
			'menu_class' 		=> 'dropdown menu',     // Add custom nav class
			'items_wrap'     		=> '<ul id="%1$s" class="%2$s show-for-medium" data-dropdown-menu>%3$s</ul>',
			'theme_location'		=> 'top-bar',           // Where it's located in the theme
			'depth' 			=> 3,                   // Limit the depth of the nav
			'fallback_cb' 		=> false,               // Fallback function 
			'walker' 			=> new Foundationpress_Top_Bar_Walker(),
		));
	}
}


/**
 * Mobile navigation - topbar (default) or offcanvas
 */
if ( ! function_exists( 'foundationpress_mobile_nav' ) ) {
	function foundationpress_mobile_nav() {
		wp_nav_menu(array(
			'container' 	=> false,                           
			'menu'           	=> __( 'mobile-nav', '' ),
			'menu_class'     	=> 'vertical menu',
			'theme_location' 	=> 'mobile-nav',
			'items_wrap'     	=> '<ul id="%1$s" class="%2$s show-for-small-only" data-accordion-menu>%3$s</ul>',
			'fallback_cb'   	=> false,
			'walker' 		=> new Foundationpress_Mobile_Walker(),
		));
	}
}

/**
 * Desktop navigation - top bar
 */
if ( ! function_exists( 'doublee_footer_menu' ) ) {
	function doublee_footer_menu() {
		wp_nav_menu(array(
			'container' 			=> false,                         
			'menu_class' 			=> 'menu',           			
			'items_wrap'     			=> '<ul id="%1$s" class="%2$s row is-collapse-child">%3$s</ul>',
			'theme_location'			=> 'footer-menu',              
			'depth' 				=> 1,                             
			'fallback_cb' 			=> false,                       
		));
	}
}

?>
