<?php
/**
 * Widget areas
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 2.2.3
 */


if (class_exists('Woocommerce')) {
	
	function doublee_woo_sidebar() {
		register_sidebar( array(
		'name' 		=> __( 'Shop sidebar', 'double-e-foundation' ),
		'id' 			=> 'shop-sidebar',
		'description' 	=> __( 'Widgets in this area will be shown in the sidebar on the shop page', 'double-e-foundation' ),
		'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</div>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>',
		) );
	}
	
	add_action( 'widgets_init', 'doublee_woo_sidebar' );
}