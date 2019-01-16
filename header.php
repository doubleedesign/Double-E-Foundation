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
		<?php // https://www.favicon-generator.org ?>
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/favicons/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/favicons/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/favicons/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/favicons/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/favicons/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/favicons/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/favicons/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/favicons/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/favicons/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/favicons/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/favicons/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/favicons/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/favicons/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri();?>/assets/icons/favicons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
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

	<div id="content">
