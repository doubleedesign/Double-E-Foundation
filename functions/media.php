<?php
/**
 * Media-related functions
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 3.0.1
 */

/**
 * Set post thumbnail size and add additional image sizes
 * @since Double-E Foundation 1.0
 */
if ( ! function_exists( 'doublee_images' ) ) :
	function doublee_images() {
		add_image_size('banner',1920,580,true);
	}
	add_action( 'after_setup_theme', 'doublee_images' );
endif;


/**
 * Alter the default gallery markup to:
 * - Incorporate Swipebox
 * - Remove <br> tags
 * - Use the markup we want (by default, galleries are definition lists unless theme support for HTML5 has been added and galleries included in that;
 * 	 this allows further customisation than that
 * Adapted from: http://robido.com/wordpress/wordpress-gallery-filter-to-modify-the-html-output-of-the-default-gallery-shortcode-and-style/
 * @param $output
 * @param $attr
 * @return string
 * @since Double-E Foundation 3.0.1
 */
function doublee_post_gallery_markup( $output, $attr ) {

	// Initialize
	global $post, $wp_locale;

	// Gallery instance counter
	static $instance = 0;
	$instance++;

	// Validate the author's orderby attribute
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( ! $attr['orderby'] ) unset( $attr['orderby'] );
	}

	// Get attributes from shortcode
	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		// Change your wrapping elements here if you want/need to
		'itemtag'    => 'figure',
		'icontag'    => 'div',
		'captiontag' => 'figcaption',
		//
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr ) );

	// Initialize
	$id = intval($id);
	$attachments = array();
	if ($order == 'RAND') $orderby = 'none';
	if (!empty($include)) {
		// Include attribute is present
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts(
			array(
				'include' => $include,
				'post_status' => 'inherit',
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'order' => $order,
				'orderby' => $orderby
			)
		);
		// Setup attachments array
		foreach ($_attachments as $key => $val) {
			$attachments[ $val->ID ] = $_attachments[ $key ];
		}
	} else if (!empty($exclude)) {
		// Exclude attribute is present
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );

		// Setup attachments array
		$attachments = get_children(
			array(
				'post_parent' => $id,
				'exclude' => $exclude,
				'post_status' => 'inherit',
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'order' => $order,
				'orderby' => $orderby
			)
		);
	} else {
		// Setup attachments array
		$attachments = get_children(
			array(
				'post_parent' => $id,
				'post_status' => 'inherit',
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'order' => $order,
				'orderby' => $orderby
			)
		);
	}
	if ( empty( $attachments ) ) return '';

	// Filter gallery differently for feeds
	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) $output .= wp_get_attachment_link( $att_id, $size, true ) . "\n";
		return $output;
	}

	// Filter tags and attributes
	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor( 100 / $columns ) : 100;
	$float = is_rtl() ? 'right' : 'left';
	$selector = "gallery-{$instance}";

	// Wrapping div; remove this if you don't want your gallery items wrapped
	$output = apply_filters( 'gallery_style', "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size}'>");

	// Iterate through the attachments in this gallery instance
	foreach ( $attachments as $id => $attachment ) {

		// Build the attachment link
		if(isset( $attr['link'] ) && 'file' == $attr['link']) { // The gallery is set to link to the image files
			$id = $attachment->ID;
			$url = wp_get_attachment_url($id);
			$title = get_the_title($id);
			$image_file = wp_get_attachment_image_src($id, $size);
			$setimage = $image_file[0];
			$link = '<a class="swipebox" href="'.$url.'" title="'.$title.'"><img src="'.$setimage.'" alt="'.$title.'"/></a>';
		} else { // It's not (i.e. it's set to attachment page or none)
			$link = wp_get_attachment_link($id, $size, false, false, false, false);
		}

		// Start itemtag
		$output .= "<{$itemtag} class='gallery-item'>";
		// Add the link
		$output .= $link;
		// Add the caption
		if ( $captiontag && trim( $attachment->post_excerpt ) ) {
			$output .= "
		<{$captiontag} class='gallery-caption'>
			" . wptexturize($attachment->post_excerpt) . "
		</{$captiontag}>";
		}
		// End itemtag
		$output .= "</{$itemtag}>";
	}

	// End gallery output
	$output .= "</div>\n";
	return $output;
}

// Apply filter to default gallery shortcode
add_filter( 'post_gallery', 'doublee_post_gallery_markup', 10, 2 );


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
