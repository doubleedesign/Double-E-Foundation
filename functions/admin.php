<?php
/**
 * Admin area customisations
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 5.0
 */

/**
 * Change the excerpt explanation in the backend
 * @param $translated_text
 * @param $text
 * @param $domain
 *
 * @return string
 */
function doublee_change_excerpt_explanation( $translated_text, $text, $domain ) {
	$post_type = get_post_type();
	switch ($translated_text) {
		case 'Excerpts are optional hand-crafted summaries of your content that can be used in your theme. <a href="%s">Learn more about manual excerpts</a>.' :
			if($post_type == 'page') {
				$translated_text = 'Preview text';
				break;
			}
			if($post_type == 'post') {
				$translated_text = 'Preview text';
				break;
			}
	}

	return $translated_text;
}
add_filter( 'gettext', 'doublee_change_excerpt_explanation', 20, 3 );


/**
 * Move Yoast SEO to the bottom of edit screens
 */
add_filter( 'wpseo_metabox_prio', 'doublee_move_yoast_seo_metabox' );
function doublee_move_yoast_seo_metabox() {
	return 'low';
}