<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 5.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<?php get_template_part('template-parts/header/preloader'); ?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<div id="preloader"></div>

		<a href="#content" class="skip-to-content">Skip to content</a>

		<?php // Remove these if not using offcanvas?>
		<div class="off-canvas-wrapper fadeIn animated">
			<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
				<?php get_template_part( 'template-parts/layout/off-canvas' ); ?>
				<div class="off-canvas-content" data-off-canvas-content>
		<?php // end of things to remove if not using offcanvas ?>

		<header id="masthead" class="site-header" role="banner">
			<?php get_template_part('template-parts/layout/title-bar'); ?>
			<?php get_template_part('template-parts/layout/top-bar'); ?>
		</header>

		<div id="content">