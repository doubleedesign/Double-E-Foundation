<?php
/**
 * WooCommerce catagloue functions
 * Works in conjunction with woocommerce.php
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 2.2.3
 */

// Remove specific WooCommerce styles and scripts that we're not using
function davrose_manage_woocommerce_scripts() {
	wp_deregister_script( 'wc-add-to-cart' );
	wp_dequeue_script( 'wc-add-to-cart' );
	
	wp_deregister_script( 'wc-cart-fragments' );
	wp_dequeue_script( 'wc-cart-fragments' );
	
	wp_deregister_script( 'wc-single-product' );
	wp_dequeue_script( 'wc-single-product' );
	
	wp_deregister_script( 'jquery-blockui' );
	wp_dequeue_script( 'jquery-blockui' );
	
	wp_deregister_script( 'jqueryui' );
	wp_dequeue_script( 'jqueryui' );
}
add_action( 'wp_enqueue_scripts', 'davrose_manage_woocommerce_scripts', 99 );

// Customise product lists: 

	// Remove cart buttons 
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
	remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );

// end of product list customisations


?>