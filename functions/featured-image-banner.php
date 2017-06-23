<?php
/**
 * Featured image banner 
 * Generates three different CSS background image sizes for #featured-hero 
 * Must be updated on a per-site basis to look for the correct image dimensions and change at the correct breakpoint
 *
 * ** THIS IS A WORK IN PROGRESS ** 
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 2.2.2
 */

function doublee_featured_image() { 
	
	global $post;
	
	/* Variables used throughout banner. Theoretically, this is all you should have to edit to customise the banner. */
	$default_banner = get_stylesheet_directory_uri().'/assets/images/default-banner.jpg';

	// Small screens
	$wanted_width_small = 639; // how wide we want the banner, minus one pixel
	$image_size_small_screen = 'medium'; // the WP thumbnail size we want to use. Make sure the width is a minimum of the above wanted width.

	// Medium screens
	$wanted_width_medium = 1023; // how wide we want the banner, minus one pixel
	$image_size_medium_screen = 'large'; // the WP thumbnail size we want to use. Make sure the width is a minimum fo the above wanted width.

	// Large screens
	$wanted_width_large = 1919; // how wide we want the banner, minus one pixel
	$wanted_height_large = 799; // how tall we want the banner, minus one pixel
	$image_size_large_screen = 'banner'; // the WP thumbnail size we want to use. Make sure the width and height are a minimum of the above wanted width and height.

	// Get the featured image
	if ( has_post_thumbnail() )  {
		$imgdata_small = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $image_size_small_screen );
		$imgwidth_small = $imgdata_small[1];   

		$imgdata_medium = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $image_size_medium_screen );
		$imgwidth_medium = $imgdata_medium[1];  

		$imgdata_large = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $image_size_large_screen );
		$imgwidth_large = $imgdata_large[1];  
		$imgheight_large = $imgdata_large[2];  

		if ($imgwidth_small > $wanted_width_small) {
			$setimage_small = $imgdata_small[0];
		}

		if ($imgwidth_medium > $wanted_width_medium) {
			$setimage_medium = $imgdata_medium[0];
		}

		if (($imgwidth_large > $wanted_width_large ) & ($imgheight_large > $wanted_height_large )) {
			$setimage_large = $imgdata_large[0];
		} 

		else if ( has_post_thumbnail( $post->post_parent ) ) { 

			$parent_imgdata_small = wp_get_attachment_image_src( get_post_thumbnail_id($post->post_parent), $image_size_small_screen );
			$parent_imgwidth_small = $parent_imgdata_small[1];   

			$parent_imgdata_medium = wp_get_attachment_image_src( get_post_thumbnail_id($post->post_parent), $image_size_medium_screen );
			$parent_imgwidth_medium = $parent_imgdata_medium[1];  

			$parent_imgdata_large = wp_get_attachment_image_src( get_post_thumbnail_id($post->post_parent), $image_size_large_screen );
			$parent_imgwidth_large = $parent_imgdata_large[1];  
			$parent_imgheight_large = $parent_imgdata_large[2];  

			if ($parent_imgwidth_small > $wanted_width_small) {
				$setimage_small = $parent_imgdata_small[0];
			}

			if ($parent_imgwidth_medium > $wanted_width_medium) {
				$setimage_medium = $parent_imgdata_medium[0];
			}

			if (($parent_imgwidth_large > $wanted_width_large ) & ($parent_imgheight_large > $wanted_height_large )) {
				$setimage_large = $parent_imgdata_large[0];
			} 

			else {
				// If parent's isn't large enough, show default
				$setimage_small = $default_banner;
				$setimage_medium = $default_banner;
				$setimage_large = $default_banner;
			}

	} // end parent thumbnail check

		// Default
		else { 
			$setimage_small = $default_banner;
			$setimage_medium = $default_banner;
			$setimage_large = $default_banner;
		}
	} // End if has_post_thumbnail

	// If no thumbnail, look for parent's
	else if ( has_post_thumbnail( $post->post_parent ) ) { 

		$parent_imgdata_small = wp_get_attachment_image_src( get_post_thumbnail_id($post->post_parent), $image_size_small_screen );
		$parent_imgwidth_small = $parent_imgdata_small[1];   

		$parent_imgdata_medium = wp_get_attachment_image_src( get_post_thumbnail_id($post->post_parent), $image_size_medium_screen );
		$parent_imgwidth_medium = $parent_imgdata_medium[1];  

		$parent_imgdata_large = wp_get_attachment_image_src( get_post_thumbnail_id($post->post_parent), $image_size_large_screen );
		$parent_imgwidth_large = $parent_imgdata_large[1];  
		$parent_imgheight_large = $parent_imgdata_large[2];  

		if ($parent_imgwidth_small > $wanted_width_small) {
			$setimage_small = $parent_imgdata_small[0];
		}

		if ($parent_imgwidth_medium > $wanted_width_medium) {
			$setimage_medium = $parent_imgdata_medium[0];
		}

		if (($parent_imgwidth_large > $wanted_width_large ) & ($parent_imgheight_large > $wanted_height_large )) {
			$setimage_large = $parent_imgdata_large[0];
		} 

		else {
			// If parent's isn't large enough, show default
			$setimage_small = $default_banner;
			$setimage_medium = $default_banner;
			$setimage_large = $default_banner;
		}

	} // end parent thumbnail check

	else {
		// If all else fails, default
		$setimage_small = $default_banner;
		$setimage_medium = $default_banner;
		$setimage_large = $default_banner;
	}

	// Add CSS to wp_head 

	echo '<style type="text/css">';
		echo '#featured-hero { background-image: url(' . $setimage_small . ');}';

		echo '@media only screen and (min-width:640px) {';
		echo '#featured-hero { background-image: url(' . $setimage_medium . ');}';

		echo '@media only screen and (min-width:940px) {';
		echo '#featured-hero { background-image: url(' . $setimage_large . ');}';
	echo '</style>';
}
add_action('wp_head', 'doublee_featured_image');

?>