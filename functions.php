<?php
/**
 *
 * Functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 3.0.0
 */

/* ==========================================
	GENERAL SETUP
===========================================*/

/** Required for Foundation to work properly - thanks FoundationPress */
require_once( 'functions/setup/foundation.php' );

/** If your site requires protocol relative URLs for theme assets, uncomment the line below. Also from FoundationPress*/
require_once( 'functions/setup/protocol-relative-theme-assets.php' );

/** Various clean up functions - thanks FoundationPress */
require_once( 'functions/setup/cleanup.php' );

/** Change WP's sticky post class - thanks FoundationPress */
require_once( 'functions/setup/sticky-posts.php' );

/** Declare theme support for various WordPress features */
require_once( 'functions/setup/theme-support.php' );

/** Widget areas if required */
require_once( 'functions/setup/widget-areas.php' );

/** Enqueue styles */
require_once( 'functions/setup/enqueue-styles.php' );

/** Enqueue scripts */
require_once( 'functions/setup/enqueue-scripts.php' );

/** ACF Theme Options panel */
require_once( 'functions/setup/acf.php' );


/* ==========================================
	NAVIGATION
===========================================*/

/** Register all navigation menus */
require_once( 'functions/navigation/register-menus.php' );

/** Add menu walkers for top-bar and off-canvas - thanks FoundationPress */
require_once( 'functions/navigation/menu-walkers.php' );

/** Add classes to menu items */
require_once( 'functions/navigation/menu-classes.php' );


/* ==========================================
	TEMPLATE DEVELOPMENT FUNCTIONS
===========================================*/

/** Developer functions - general functions/tools for theme/template development */ 
require_once( 'functions/developer.php' );

/** Miscellaneous functions */
require_once( 'functions/misc.php' );

/** Image-related functions */
require_once( 'functions/media.php' );

/** Featured image banner */
require_once( 'functions/featured-image-banner.php'); 

/** WooCommerce functions if you're using it */
//require_once('functions/woocommerce.php');

/** WooCommerce functions for non-eCommerce / product catalogue sites */
//require_once('functions/woocommerce-catalogue.php');
