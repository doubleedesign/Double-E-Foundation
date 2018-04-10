<?php
/**
 * Miscellaneous functions
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 3.0
 */


/**
 * Add classes to the body tag
 * @param $classes
 * @return array
 * @since Double-E Foundation 3.0
 */
function doublee_body_classes($classes) {
	// Get some info, set some variables for later use
	global $post;
	$current_page_id = $post->ID;
	$ancestors = get_post_ancestors($current_page_id);

	// Page parent/section
	if (is_page()) {
		if ($post->post_parent) {
			$parent  = end($ancestors);
		} else {
			$parent = $post->ID;
		}
		$post_data = get_post($parent, ARRAY_A);
		$classes[] .= 'section-' . $post_data['post_name'];
	}

	// Browser
	$browser = doublee_get_browser();
	$classes[] .= $browser;

	// Shall we animate?
	if($browser != 'ie') {
		$classes[] .= 'layout-animations-supported';
	}

	// Return the classes for use by the filter
	return $classes;
}
add_filter('body_class', 'doublee_body_classes');


/**
 * Allow shortcodes in category/term descriptions
 */
add_filter( 'term_description', 'do_shortcode');


/**
 * Remove extraneous p tags from shortcodes
 */
// Remove wpautop from wherever it is
remove_filter('the_content', 'wpautop');
remove_filter('term_description', 'wpautop');
// Add it pack at priority 99
add_filter('the_content', 'wpautop', 99);
add_filter('term_description', 'wpautop', 99);
// Run shortcode_unautop after wpautop
add_filter('the_content', 'shortcode_unautop', 100);
add_filter('term_description', 'shortcode_unautop', 100);


/**
 * Change upload directory for PDF files
 * Source: https://wordpress.stackexchange.com/questions/47415/change-upload-directory-for-pdf-files
 * TODO: This should probably be in a plugin
 */

add_filter('wp_handle_upload_prefilter', 'doublee_pre_upload');
add_filter('wp_handle_upload', 'doublee_post_upload');

function doublee_pre_upload($file){
    add_filter('upload_dir', 'doublee_custom_upload_dir');
    return $file;
}

function doublee_post_upload($fileinfo){
    remove_filter('upload_dir', 'doublee_custom_upload_dir');
    return $fileinfo;
}

function doublee_custom_upload_dir($path){    
    $extension = substr(strrchr($_POST['name'],'.'),1);
    if(!empty($path['error']) ||  $extension != 'pdf') { return $path; } //error or other filetype; do nothing. 
    $customdir = '/pdf';
    $path['path']    = str_replace($path['subdir'], '', $path['path']); //remove default subdir (year/month)
    $path['url']     = str_replace($path['subdir'], '', $path['url']);      
    $path['subdir']  = $customdir;
    $path['path']   .= $customdir; 
    $path['url']    .= $customdir;  
    return $path;
}


/**
 * Move Yoast SEO to the bottom of edit screens
 */
add_filter( 'wpseo_metabox_prio', 'doublee_move_yoast_seo_metabox' );
function doublee_move_yoast_seo_metabox() {
	return 'low';
}