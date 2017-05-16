<?php
/**
 * WooCommerce-related functions
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 2.2.3
 */

// Declare theme support for WooCommerce
add_theme_support( 'woocommerce' ); 

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



?>