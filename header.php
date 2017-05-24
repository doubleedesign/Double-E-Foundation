<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 2.1
 */

?>
<?php
/* Add a CSS class to the body to target browsers */ 
if (stripos( $_SERVER['HTTP_USER_AGENT'], "chrome")>0){ $browser = 'chrome'; } 
else if (stripos( $_SERVER['HTTP_USER_AGENT'], "firefox")>0){$browser = 'firefox'; } 
else if (stripos( $_SERVER['HTTP_USER_AGENT'], "Trident")>0){$browser = 'ie'; } 
else if (stripos( $_SERVER['HTTP_USER_AGENT'], "MSIE")>0){$browser = 'ie'; } ; 
/* Add the page slug as an ID on the body tag */
$slug = 'page-'.$post->post_name; 
/* Add parent slug as a class on the body tag */
$parents = get_post_ancestors( $post->ID );
$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
$parent = get_post( $id );
$parent_class = 'parent-'.$parent->post_name;
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
		<?php wp_head(); ?>
	</head>
	<body id="<?php echo $slug; ?>" <?php body_class($browser . ' ' . $parent_class); ?>>
	
	<a href="#content" class="skip-to-content">Skip to content</a>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) { ?>
	<div class="off-canvas-wrapper fadeIn animated">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php } ?>	

	<header id="masthead" class="site-header" role="banner">
	
		<div class="title-bar show-for-small-only">
			<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) { ?>
				<button class="menu-icon" type="button" data-toggle="offCanvas"><i class="fa fa-bars"></i></button>
			<?php } else { ?>
				<button class="menu-icon" type="button"><i class="fa fa-bars"></i>Menu</button>
			<?php } ?>
		</div>

		<?php get_template_part('template-parts/top-bar'); ?>
		
	</header>

	<section id="content">