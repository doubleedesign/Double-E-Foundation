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

/**
 * General setup
 */
require_once( 'functions/setup/foundation.php' ); // Source: FoundationPress
require_once( 'functions/setup/protocol-relative-theme-assets.php' ); // Source: FoundationPress
require_once( 'functions/setup/cleanup.php' ); // Source: FoundationPress
require_once( 'functions/setup/sticky-posts.php' ); // Source: FoundationPress
require_once( 'functions/setup/theme-support.php' );
require_once( 'functions/setup/widget-areas.php' );
require_once( 'functions/setup/enqueue-styles.php' );
require_once( 'functions/setup/enqueue-scripts.php' );
require_once( 'functions/setup/media.php' );

/**
 * Navigation
 */
require_once( 'functions/navigation/register-menus.php' );
require_once( 'functions/navigation/menu-walkers.php' ); // Source: FoundationPress
require_once( 'functions/navigation/breadcrumbs.php' );

/**
 * Admin area
 */
require_once( 'functions/admin.php' );

/**
 * Theming utilities
 */
require_once( 'functions/theming/utilities.php' );
require_once( 'functions/theming/classes.php' );
require_once( 'functions/theming/template-tags.php' );


/**
 * Plugin extensions
 */
if (class_exists('ACF')) {
	require_once( 'functions/setup/acf.php' );
}

if (class_exists('Woocommerce')) {
	require_once('functions/woocommerce.php');
}