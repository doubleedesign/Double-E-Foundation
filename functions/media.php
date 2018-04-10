<?php
/**
 * Media-related functions
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 3.0.0
 */

/**
 * Set post thumbnail size and add additional image sizes
 */
if ( ! function_exists( 'doublee_images' ) ) :
	function doublee_images() {
		add_image_size('banner',1920,580,true);
	}
	add_action( 'after_setup_theme', 'doublee_images' );
endif;


/**
 * Increase max srcset width to bigger than its default of 1600
 */
add_filter('max_srcset_image_width', function($max_srcset_image_width, $size_array){
	return 2000;
}, 10, 2);


/**
 * Default content width
 */
if (!isset($content_width)) {
	$content_width = 1280;
}


/**
 * Add a class to linked images' parent anchors
 * @param $content
 * @return null|string|string[]
 */
function doublee_linked_images_class($content) { 
	$classes = 'img'; if ( preg_match('/<a.*? class=".*?"><img/', $content) ) { 
		$content = preg_replace('/(<a.*? class=".*?)(".*?><img)/', '$1 ' . $classes . '$2', $content); 
	} else { $content = preg_replace('/(<a.*?)><img/', '$1 class="' . $classes . '" ><img', $content); 
	} 
	return $content; 
} 
add_filter('the_content','doublee_linked_images_class');


/**
 * If no featured image set, use first attachment
 */
/*
function doublee_auto_featured_image() {
   global $post;
   if (!has_post_thumbnail($post->ID)) {
      $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
      if ($attached_image) {
         foreach ($attached_image as $attachment_id => $attachment) {
            set_post_thumbnail($post->ID, $attachment_id);
         }
      }
   }
}
// Temporarily generate all featured images if you need to
//add_action('the_post', 'doublee_auto_featured_image');
// For new posts
add_action('save_post', 'doublee_auto_featured_image'); 
add_action('draft_to_publish', 'doublee_auto_featured_image'); 
add_action('new_to_publish', 'doublee_auto_featured_image'); 
add_action('pending_to_publish', 'doublee_auto_featured_image'); 
add_action('future_to_publish', 'doublee_auto_featured_image');
*/


/**
 * Enable captions on featured images
 * Template usage: doublee_post_thumbnail_caption();
 */
/* Function to display caption on featured image, when called in template*/
function doublee_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>'; //Change markup as needed here
  }
}


//
/**
 * Always default "link to" to "None" when inserting images
 */
function doublee_image_setup() {
	$image_set = get_option( 'image_default_link_type' );
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'doublee_image_setup', 10);


/**
 * Always default "link to" to "Media File" when inserting galleries
 */
add_filter('shortcode_atts_gallery', function( $out ){$out['link'] = 'file'; return $out; });


/**
 * Identify external links automatically and open them in a new window - add class "ext"
 * @param $content
 * @return null|string|string[]
 */
function doublee_change_target($content){
	return preg_replace_callback('/<a[^>]+/', 'doublee_target_callback', $content);
}
function doublee_target_callback($matches){
	$link = $matches[0];$mu_url = home_url();
	if (strpos($link, 'target') === false){
		$link = preg_replace("%(href=\S(?!$mu_url))%i", 'target="_blank" class="ext" $1', $link);}
	elseif (preg_match("%href=\S(?!$mu_url)%i", $link)){
		$link = preg_replace('/target=S(?!_blank)\S*/i', 'target="_blank" class="ext"', $link);
	} 
	return $link;
}
add_filter('the_content', 'doublee_change_target');


/**
 * Filter <p> tags from images and iframes
 * @param $content
 * @return null|string|string[]
 */
function doublee_p_filter($content) { 
	$content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content); 
	return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content); 
} 
add_filter('the_content', 'doublee_p_filter');