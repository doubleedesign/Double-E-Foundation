<?php
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

	// Return the classes for use by the filter
	return $classes;
}
add_filter('body_class', 'doublee_body_classes');


/**
 * Add menu item classes
 * @param $classes
 * @param $item
 *
 * @return mixed
 */
function doublee_menu_classes($classes, $item) {
	global $post;
	$id = (isset($post->ID) ? get_the_ID() : NULL);

	// Add current-menu-item to post type archive link for this post's type
	if(isset($id) && $item->type == 'post_type_archive') {
		$current_post_type = get_post_type($id);
		$link_post_type = $item->object;
		if($current_post_type == $link_post_type) {
			$classes[] = 'current-menu-item';
		}
	}

	return $classes;
}
add_filter('nav_menu_css_class', 'doublee_menu_classes', 10, 2);