<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 3.0
 */

?>
<?php
/* Add the page slug as an ID on the body tag */
$slug = 'page-'.$post->post_name;
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<?php get_template_part('template-parts/header/favicons'); ?>
		<?php get_template_part('template-parts/header/preloader'); ?>
		<?php wp_head(); ?>
	</head>
	<body id="<?php echo $slug; ?>" <?php body_class(); ?>>
		
	<div id="preloader"></div>
	
	<a href="#content" class="skip-to-content">Skip to content</a>

	<?php // Remove these if not using offcanvas?>
	<div class="off-canvas-wrapper fadeIn animated">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
			<?php get_template_part( 'template-parts/layout/mobile-off-canvas' ); ?>
			<div class="off-canvas-content" data-off-canvas-content>
	<?php // end of things to remove if not using offcanvas ?>

	<!--[if lte IE 9]><div class="alert callout"><span>You are using an outdated version of Microsoft's Internet Explorer web browser, which does not display modern web sites properly (including this one). To ensure you always see sites at their best and your browser security is up to date, it is highly recommended that you <a href="http://browsehappy.com/" target="_blank">upgrade to a modern browser</a>.</span></div><![endif]-->

	<header id="masthead" class="site-header" role="banner">

		<div class="title-bar show-for-small-only row align-middle align-justify">
			<button class="menu-icon" type="button" data-toggle="offCanvas"><i class="fa fa-bars"></i>Menu</button>
			<?php /* Swap button for this one if using mobile topbar instead of offcanvas
			<button class="menu-icon" type="button"><i class="fa fa-bars"></i>Menu</button> */ ?>
		</div>

		<?php get_template_part('template-parts/layout/top-bar'); ?>
		
	</header>

	<div id="content">
