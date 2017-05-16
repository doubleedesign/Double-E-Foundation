<?php

/* Variables used throughout banner. Theoretically, this is all you should have to edit to customise the banner. */
$wanted_width = 1919; // how wide we want the banner, minus one pixel
$wanted_height = 599; // how tall we want the banner, minus one pixel
$image_size = 'full'; // the WP thumbnail size we want to use
$default_banner = get_stylesheet_directory_uri().'/assets/images/default-banner.jpg';

if ( has_post_thumbnail() )  {
    $imgdata = wp_get_attachment_image_src( get_post_thumbnail_id(), $image_size ); //change thumbnail to whatever size you are using
    $imgwidth = $imgdata[1]; // thumbnail's width  
	$imgheight = $imgdata[2]; // thumnail's height                 
    if (($imgwidth > $wanted_width ) & ($imgheight > $wanted_height )) {
        $setimage = $imgdata[0];
    } 

	// If image isn't big enough, look for parent's image
	else if( has_post_thumbnail( $post->post_parent ) ) { 
		$parentimgdata = wp_get_attachment_image_src( get_post_thumbnail_id($post->post_parent), $image_size );
		$parentimgwidth = $parentimgdata[1]; // thumbnail's width  
		$parentimgheight = $parentimgdata[2]; // thumnail's height                 
		if (($parentimgwidth > $wanted_width ) & ($parentimgheight > $wanted_height )) {
		  $setimage = $parentimgdata[0];
		} 
	}

	else { 
		$setimage = $default_banner;
	}

} // End if has_post_thumbnail

else if ( has_post_thumbnail( $post->post_parent ) ) {  // If no thumbnail, look for parent's
	$parentimgdata = wp_get_attachment_image_src( get_post_thumbnail_id($post->post_parent), $image_size );
	$parentimgwidth = $parentimgdata[1]; // thumbnail's width  
	$parentimgheight = $parentimgdata[2]; // thumnail's height                 
	if (($parentimgwidth > $wanted_width ) & ($parentimgheight > $wanted_height )) {
	   $setimage = $parentimgdata[0];
	} 
	else {
		// If parent's isn't large enough, show default
		$setimage = $default_banner;
	}
}

else {
	// If all else fails, default
	$setimage = $default_banner;
}

?>
<div id="featured-hero" role="banner" style="background-image: url('<?php echo $setimage; ?>');">
</div>