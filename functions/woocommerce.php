<?php
/**
 * WooCommerce-related functions
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 3.0.0
 */

// Declare WooCommerce support with custom settings
function doublee_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		// Declaring these means changes in the Customiser have no effect.
		/*'thumbnail_image_width' => 600,
		'gallery_thumbnail_image_width' => 600,
		'single_image_width'    => 600,*/
	) );
}
add_action( 'after_setup_theme', 'doublee_woocommerce_support' );


// Don't load WooCommerce's CSS files
add_filter( 'woocommerce_enqueue_styles', '__return_false' );


// Add an option to sort products alphabetically
function doublee_woocommerce_get_catalog_ordering_args( $args ) {
    $orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );

    if ( 'alphabetical' == $orderby_value ) {
        $args['orderby'] = 'title';
        $args['order'] = 'ASC';
    }

    return $args;
}

function doublee_woocommerce_catalog_orderby( $sortby ) {
    $sortby['alphabetical'] = __( 'Alphabetical' );
    return $sortby;
}

add_filter( 'woocommerce_get_catalog_ordering_args', 'doublee_woocommerce_get_catalog_ordering_args' );
add_filter( 'woocommerce_default_catalog_orderby_options', 'doublee_woocommerce_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'doublee_woocommerce_catalog_orderby' );
// end sort products alphabetically