<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 5.0
 */


/**
 * Register menus
 */
register_nav_menus(array(
	'top-bar'  		=> 'Top Bar',
	'mobile-nav' 	=> 'Mobile',
	'footer-menu'	=> 'Footer menu'
));


/**
 * Desktop navigation - top bar
 */
function doublee_top_bar_menu() {
	wp_nav_menu(array(
		'container' 		=> false,
		'menu_class' 		=> 'dropdown menu',
		'items_wrap'     	=> '<ul id="%1$s" class="%2$s show-for-medium" data-dropdown-menu>%3$s</ul>',
		'theme_location'	=> 'top-bar',
		'depth' 			=> 2,
		'fallback_cb' 		=> false,
		'walker' 			=> new Foundationpress_Top_Bar_Walker(),
	));
}

/**
 * Mobile navigation - topbar or offcanvas
 */
function doublee_mobile_nav() {
	wp_nav_menu(array(
		'container' 		=> false,
		'menu_class'     	=> 'vertical menu',
		'items_wrap'     	=> '<ul id="%1$s" class="%2$s show-for-small-only" data-accordion-menu>%3$s</ul>',
		'theme_location' 	=> 'mobile-nav',
		'depth' 			=> 2,
		'fallback_cb'   	=> false,
		'walker' 			=> new Foundationpress_Mobile_Walker(),
	));
}


/**
 * Footer menu
 */
function doublee_footer_menu() {
	wp_nav_menu(array(
		'container' 		=> false,
		'menu_class' 		=> 'menu',
		'items_wrap'     	=> '<ul id="%1$s" class="%2$s row is-collapse-child">%3$s</ul>',
		'theme_location'	=> 'footer-menu',
		'depth' 			=> 1,
		'fallback_cb' 		=> false,
	));
}