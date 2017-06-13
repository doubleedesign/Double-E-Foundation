<?php
/**
 * Miscellaneous functions
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 2.2.4
 */

/* ==========================================
	ADD PARENT PAGE SLUG TO THE BODY CLASS
	(Adds both to the parent page itself and its child pages)
============================================*/
function doublee_body_class_section($classes) {  
	global $wpdb, $post;  
	$current_page_id = $post->ID;
	if (is_page()) {  
		if ($post->post_parent) {  
			$parent  = end(get_post_ancestors($current_page_id));  
		} else {  
			$parent = $post->ID;  
		}  
		$post_data = get_post($parent, ARRAY_A);  
		$classes[] = 'section-' . $post_data['post_name'];  
	}  
	return $classes;  
}  
add_filter('body_class', 'doublee_body_class_section'); 


/* ==========================================
	ALLOW SHORTCODES IN CATEGORY/TERM DESCRIPTIONS
============================================*/
add_filter( 'term_description', 'do_shortcode');


/* ==========================================
	REMOVE EXTRANEOUS P TAGS FROM SHORTCODES
============================================*/
// Remove wpautop from wherever it is
remove_filter('the_content', 'wpautop');
remove_filter('term_description', 'wpautop');
// Add it pack at priority 99
add_filter('the_content', 'wpautop', 99);
add_filter('term_description', 'wpautop', 99);
// Run shortcode_unautop after wpautop
add_filter('the_content', 'shortcode_unautop', 100);
add_filter('term_description', 'shortcode_unautop', 100);


/* ==========================================
	CHANGE UPLOAD DIRECTORY FOR PDF FILES
	Source: https://wordpress.stackexchange.com/questions/47415/change-upload-directory-for-pdf-files
	** This should eventually be put into a plugin **
============================================*/

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

/* ==========================================
	MOVE YOAST SEO TO THE BOTTOM OF EDIT SCREENS
============================================*/
add_filter( 'wpseo_metabox_prio', 'doublee_move_yoast_seo_metabox' );
function doublee_move_yoast_seo_metabox() {
	return 'low';
}
?>