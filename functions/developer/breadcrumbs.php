<?php
/**
 * Filter the output of Yoast breadcrumbs so each item is an <li>
 * @param $link_output
 * @param $link
 *
 * @return string
 */
function doublee_filter_yoast_breadcrumb_items( $link_output, $link ) {

	$new_link_output = '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
	$new_link_output .= '<a href="' . $link['url'] . '" itemprop="url">' . $link['text'] . '</a>';
	$new_link_output .= '</li>';

	return $new_link_output;
}
add_filter( 'wpseo_breadcrumb_single_link', 'doublee_filter_yoast_breadcrumb_items', 10, 2 );


/**
 * Filter the output of Yoast breadcrumbs to remove <span> tags added by the plugin
 * @param $output
 *
 * @return mixed
 */
function doublee_filter_yoast_breadcrumb_output( $output ){

	$from = '<span>';
	$to = '</span>';
	$output = str_replace( $from, $to, $output );

	return $output;
}
add_filter( 'wpseo_breadcrumb_output', 'doublee_filter_yoast_breadcrumb_output' );


/**
 * Shortcut function to output Yoast breadcrumbs
 * wrapped in the appropriate markup
 */
function doublee_breadcrumbs() {
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('<ul class="breadcrumbs">', '</ul>');
	}
}