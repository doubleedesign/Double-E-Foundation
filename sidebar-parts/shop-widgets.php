<?php
/**
 * The template part for displaying the shop sidebar
 
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 2.3.1
 */

if (class_exists('Woocommerce') && is_shop()) {
	dynamic_sidebar('shop-sidebar'); 
} 
?>