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
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-precomposed.png">
		<?php // Preloader styles. JS is in the footer ?>
		<style>
			/* Preloader styles */
			#preloader {
				position: fixed;
				left: 0;
				top: 0;
				z-index: 9999;
				width: 100vw;
				height: 100vh;
				overflow: visible;
				background: #FFF;
				transition: all 0.3s ease;
			}
			#preloader:before,
			#preloader::before {
				width: 100vw;
				height: 100vh;
				position: fixed;
				top: 0;
				left: 0;
				content: '';
				background: url('<?php echo get_stylesheet_directory_uri();?>/assets/loading.svg') no-repeat center center;
				background-size: 200px auto;
			}
			.ie #preloader:before,
			.ie #preloader::before {
				content: 'Loading...';
				display: flex;
				align-content: center;
				justify-content: center;
			}
			@-webkit-keyframes fadeOut{from{opacity:1}to{opacity:0}}
			@keyframes fadeOut{from{opacity:1}to{opacity:0}}
			#preloader.fadeOut {
				-webkit-animation-name: fadeOut;
				animation-name: fadeOut;
				animation-duration: 0.3s;
				z-index: -100;
			}
			@-webkit-keyframes fadeIn{from{opacity:0}to{opacity:1}}
			@keyframes fadeIn{from{opacity:0}to{opacity:1}}
			#preloader.fadeIn {
				-webkit-animation-name: fadeIn;
				animation-name: fadeIn;
				animation-duration: 0.3s;
				z-index: 1000;
			}
		</style>
		<?php wp_head(); ?>
	</head>
	<body id="<?php echo $slug; ?>" <?php body_class(); ?>>
		
	<div id="preloader"></div>
	
	<a href="#content" class="skip-to-content">Skip to content</a>

	<?php // Remove these if not using offcanvas?>
	<div class="off-canvas-wrapper fadeIn animated">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
			<?php get_template_part( 'layout/mobile-off-canvas' ); ?>
			<div class="off-canvas-content" data-off-canvas-content>
	<?php // end of things to remove if not using offcanvas ?>

	<!--[if lte IE 9]><div class="alert callout"><span>You are using an outdated version of Microsoft's Internet Explorer web browser, which does not display modern web sites properly (including this one). To ensure you always see sites at their best and your browser security is up to date, it is highly recommended that you <a href="http://browsehappy.com/" target="_blank">upgrade to a modern browser</a>.</span></div><![endif]-->

	<header id="masthead" class="site-header" role="banner">
	
		<div class="title-bar show-for-small-only">
			<button class="menu-icon" type="button" data-toggle="offCanvas"><i class="fa fa-bars"></i></button>
			<?php /* Swap button for this one if using mobile topbar instead of offcanvas
			<button class="menu-icon" type="button"><i class="fa fa-bars"></i>Menu</button> */ ?>
		</div>

		<?php get_template_part('layout/top-bar'); ?>
		
	</header>

	<section id="content">