<?php
/**
 * Image-related functions
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 0.1.3
 */

/* ==========================================
	IMAGE SIZES
============================================*/

if ( ! function_exists( 'doublee_images' ) ) :
function doublee_images() {
	set_post_thumbnail_size(480,480,true);	
}
add_action( 'after_setup_theme', 'doublee_images' );
endif;


/* ==========================================
	ADD A CLASS TO LINKED IMAGES' PARENT ANCHORS
============================================*/

function doublee_linked_images_class($content) { 
	$classes = 'img'; if ( preg_match('/<a.*? class=".*?"><img/', $content) ) { 
		$content = preg_replace('/(<a.*? class=".*?)(".*?><img)/', '$1 ' . $classes . '$2', $content); 
	} else { $content = preg_replace('/(<a.*?)><img/', '$1 class="' . $classes . '" ><img', $content); 
	} 
	return $content; 
} 
add_filter('the_content','doublee_linked_images_class');


/* ==========================================
	IF NO FEATURED IMAGE SET, USE FIRST ATTACHMENT
============================================*/

function auto_featured_image() {
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
// Temporarily generate all featured images
add_action('the_post', 'auto_featured_image');
// For new posts
add_action('save_post', 'auto_featured_image'); 
add_action('draft_to_publish', 'auto_featured_image'); 
add_action('new_to_publish', 'auto_featured_image'); 
add_action('pending_to_publish', 'auto_featured_image'); 
add_action('future_to_publish', 'auto_featured_image');


/* ==========================================
	ENABLE CAPTIONS ON FEATURED IMAGES
	Template usage: the_post_thumbnail_caption();
============================================*/

/* Function to display caption on featured image, when called in template*/
function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>'; //Change markup as needed here
  }
}

/* ==========================================
	OTHER IMAGE FUNCTIONS
============================================*/

// Always default to 'None' when inserting images
function doublee_image_setup() {$image_set = get_option( 'image_default_link_type' );if ($image_set !== 'none') {update_option('image_default_link_type', 'none');}}add_action('admin_init', 'doublee_image_setup', 10);

// Always default to 'Media File' when inserting galleries
add_filter('shortcode_atts_gallery', function( $out ){$out['link'] = 'file'; return $out; });

// Identify external links automatically and open them in a new window - add class "ext"
function doublee_change_target($content){return preg_replace_callback('/<a[^>]+/', 'doublee_target_callback', $content);}function doublee_target_callback($matches){$link = $matches[0];$mu_url = get_bloginfo('url');if (strpos($link, 'target') === false){$link = preg_replace("%(href=\S(?!$mu_url))%i", 'target="_blank" class="ext" $1', $link);}elseif (preg_match("%href=\S(?!$mu_url)%i", $link)){$link = preg_replace('/target=S(?!_blank)\S*/i', 'target="_blank" class="ext"', $link);} return $link;}add_filter('the_content', 'doublee_change_target');

// Filter <p> tags from images and iframes
function doublee_p_filter($content) { $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content); return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content); } add_filter('the_content', 'doublee_p_filter'); 

?>
