<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 0.0.2
 */

/** Various clean up functions - thanks FoundationPress */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly - thanks FoundationPress */
require_once( 'library/foundation.php' );

/** Register all navigation menus - thanks FoundationPress */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas - thanks FoundationPress */
require_once( 'library/menu-walkers.php' );

/** Create widget areas in sidebar and footer - thanks FoundationPress */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts - thanks FoundationPress */
require_once( 'library/entry-meta.php' );

/** Enqueue styles */
require_once( 'library/enqueue-styles.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Custom - thanks FoundationPress */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class - thanks FoundationPress */
require_once( 'library/sticky-posts.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
require_once( 'library/protocol-relative-theme-assets.php' );

?>
