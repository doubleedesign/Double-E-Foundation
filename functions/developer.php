<?php
/**
 * Developer functions - tools for theme development
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 3.0
 */

/**
 * Get the browser from the $_SERVER special variable
 * @return string
 */
function doublee_get_browser() {
	// Get the user agent string
	$useragent = $_SERVER['HTTP_USER_AGENT'];

	// Check what's inside it; note: check for Edge before Chrome, because it's sneaky and tries to masquerade as Chrome
	switch($useragent) {
		case(stripos($useragent, 'Trident') > 0):
			$browser = 'ie';
			break;
		case(stripos($useragent, 'MSIE') > 0):
			$browser = 'ie';
			break;
		case(stripos($useragent, 'Edge') > 0):
			$browser = 'ie edge';
			break;
		case(stripos($useragent, 'chrome') > 0):
			$browser = 'chrome';
			break;
		case(stripos($useragent, 'firefox') > 0):
			$browser = 'firefox';
			break;
		case(stripos($useragent, 'safari') > 0):
			$browser = 'safari';
			break;
		default:
			$browser = '';
	}

	// Return browser string for template use
	return $browser;
}


/**
 * Get the visual page title, or if empty get the regular title
 * @return string
 * @since Double-E Foundation 3.0
 * @uses Advanced Custom Fields
 */
function doublee_get_page_title() {
	if((class_exists('ACF')) && get_field('visual_page_title')) {
		return get_field('visual_page_title');
	} else {
		return get_the_title();
	}
}


/**
 * Get post entry meta in a consistent format
 * @return stringOut
 */
function doublee_entry_meta() {
	$meta = '<span class="byline author">';
	$meta .= __( 'Posted by ', '' );
	$meta .= '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author">';
	$meta .= get_the_author();
	$meta .= '</a>';
	$meta .= ' on <time class="date">';
	$meta .= get_the_date('l, F j, Y');
	$meta .= '</time>';
	$meta .= '</span>';
	return $meta;
}


/**
 * Build a "slug" from the page title or other relevant string, such as the visual page title (as the actual slug may be different)
 * @param $string - the string to use to build the slug, generally doublee_get_page_title or get_the_title
 * @return null|string
 * @since Double-E Foundation 3.0
 */
function doublee_build_title_slug($string) {
	$title_slug = strtolower($string); // make title lowercase for use as slug
	$title_slug = preg_replace("/[^a-z0-9_\s-]/", "", $title_slug); // make alphanumeric
	$title_slug = preg_replace("/[\s-]+/", " ", $title_slug); // clean up multiple dashes or whitespaces
	$title_slug = preg_replace("/[\s_]/", "-", $title_slug); // convert whitespaces and underscore to dash

	return $title_slug;
}


/**
 * Get the first paragraph from a given string
 * @param $text - the string to get the first paragraph from
 * @return bool|string
 * @since Double-E Foundation 3.0
 */
function doublee_get_first_paragraph($text){
	$text = wpautop($text);
	$text = substr( $text, 0, strpos( $text, '</p>' ) + 4 );
	$text = strip_tags($text, '<a><strong><em>');
	return $text;
}


/**
 * Split a string in half and wrap each in a span
 * useful for avoiding widows in titles
 * @param $string - the string to split
 * @return string - a new string with <span> tags added
 * @since Double-E Foundation 3.0
 */
function doublee_split_text($string) {
	$word_count = str_word_count($string);
	$words = explode(' ', $string);
	$words_per_line = round($word_count/2); // if the word count is an odd number, rounding puts the larger number of words on the top (e.g. 4 then 3)
	$first_half = array_slice($words, 0, $words_per_line);
	$second_half = array_slice($words, $words_per_line, $word_count);
	$string_one = implode(' ', $first_half);
	$string_two = implode(' ', $second_half);

	$output = '<span>' . $string_one . '</span>' . ' ';
	$output .= '<span>' . $string_two . '</span>';

	return $output;
}


/**
 * Get ordinal word from a given integer (up to 9)
 * @param $num - the number to get the ordinal word for
 * @return string
 * @since Double-E Foundation 3.0
 */
function doublee_integer_to_ordinal_word($num) {
	$word = array('first','second','third','fourth','fifth','sixth','seventh','eighth','ninth','tenth');
	if($num <= 9) {
		return $word[$num];
	} else {
		return '';
	}
}


/**
 * Content splitter
 * Splits get_the_content() into an array using the <!--more--> tag
 *
 * Template usage:
 * <?php
 * // split content into array
 * $content = get_the_content('',FALSE,''); // arguments remove 'more' text
 * $splitcontent = doublee_split_content($content);
 * echo $splitcontent[0];
 * echo $splitcontent[1];
 * //and so on for more sections!
 *
 * @param $content - the string to split at the <!--more--> tags
 * @return array[]|false|mixed|string[]
 * @since Double-E Foundation 3.0
 */
function doublee_split_content($content){
	// run through a couple of essential tasks to prepare the content
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);

	// the first "more" is converted to a span with ID
	$columns = preg_split('/(<span id="more-\d+"><\/span>)|(<!--more-->)<\/p>/', $content);
	$col_count = count($columns);

	if($col_count > 1) {
		for($i=0; $i<$col_count; $i++) {
			// check to see if there is a final </p>, if not add it
			if(!preg_match('/<\/p>\s?$/', $columns[$i]) )  {
				$columns[$i] .= '</p>';
			}
			// check to see if there is an appending </p>, if there is, remove
			$columns[$i] = preg_replace('/^\s?<\/p>/', '', $columns[$i]);
			// now add the div wrapper
			//$columns[$i] = '<div class="dynamic-col-'.($i+1).'">'.$columns[$i].'</div>'; //only need this if returning $content, not $columns
			$columns[$i] = $columns[$i];
		}
		//$content = join($columns, "\n").'<div class="clear"></div>'; //only need this if returning $content, not $columns
	}
	else {
		// this page does not have dynamic columns
		$content = wpautop($content);
	}
	// remove any left over empty <p> tags if returning $content
	//$content = str_replace('<p></p>', '', $content);
	//return $content; //returns everything in one variable, with divs around each "column" ready for styling
	// remove any left over empty <p> tags if returning $columns
	$columns = str_replace('<p></p>', '', $columns);
	return $columns; //returns an array so we can select where to echo each "column"
}


/**
 * Split a single gallery from the content
 * @param $content
 * @return mixed
 *
 * Template usage:
 *
 * * Single content section:
 * * // Get the content without the gallery
 * * $content = str_replace( ']]>', ']]>', apply_filters( 'the_content', $content ) );
 * * // Show the gallery here
 * * $gallery = get_post_gallery();
 * * echo $gallery;
 * * //Show it
 * * echo $content;
 *
 * * Combine with split content function:
 * * // Get the content without the gallery
 * * $content = doublee_strip_shortcode_gallery( get_the_content() );
 * * $content = str_replace( ']]>', ']]>', apply_filters( 'the_content', $content ) );
 * * // Split it
 * * $splitcontent = doublee_split_content($content);
 * * echo $splitcontent[0];
 * * echo $splitcontent[1];
 * * // Show the gallery
 * * $gallery = get_post_gallery();
 * * echo $gallery;
 *
 */
function  doublee_strip_shortcode_gallery($content) {
	preg_match_all( '/'. get_shortcode_regex() .'/s', $content, $matches, PREG_SET_ORDER );
	if ( ! empty( $matches ) ) {
		foreach ( $matches as $shortcode ) {
			if ( 'gallery' === $shortcode[2] ) {
				$pos = strpos( $content, $shortcode[0] );
				if ($pos !== false) {
					return substr_replace($content, '', $pos, strlen($shortcode[0]));
				}
			}
		}
	}
	return $content;
}


/**
 * Split multiple galleries from the content
 * Not suitable if you are using other shortcodes
 * @param $content
 * @return mixed
 *
 * Template usage:
 * * // Show the content without the gallery
 * * $content = strip_shortcodes(get_the_content());
 * * echo wpautop($content);
 * * // Show the galleries
 * * $shortcodes = doublee_get_shortcodes( get_the_content());
 * * $gallery = $shortcodes[0];
 * * echo do_shortcode($gallery[0]);
 * * echo do_shortcode($gallery[1]);
 * * //and so on for further galleries
 *
 */
function doublee_get_shortcodes($content) {
	$shortcode = "";
	$pattern = get_shortcode_regex();
	preg_match_all('/' . $pattern . '/uis', $content, $matches);
	for ($i = 0; $i < 40; $i++) {
		if (isset($matches[0][$i])) {
			$shortcode .= $matches[0][$i];
		}
	}
	// return $shortcode; //returns all galleries in one go, we don't necessarily want this
	return $matches; // returns an array, see above for template usage
}


/**
 * Excerpt customiser
 * Strips headings and sets a custom length
 * * Template usage:
 * if(has_excerpt()) { the_excerpt(); }
 * * You can also use the function to shorten the manual excerpt:
 * doublee_custom_excerpt(get_the_excerpt());
 * * Or simply shorten the content:
 * doublee_custom_excerpt(get_the_content());
 *
 * @param $text - the string to strip headings and shorten, generally get_the_excerpt or get_the_content
 * @param $word_count - how many words to include in the output
 * @return string
 * @since Double-E Foundation 3.0
 */
function doublee_custom_excerpt($text, $word_count) {

	// Remove shortcode tags from the given content
	$text = strip_shortcodes( $text );
	$text = apply_filters('the_content', $text);
	$text = str_replace(']]>', ']]&gt;', $text);

	// Regular expression that strips the header tags and their content
	$regex = '#(<h([1-6])[^>]*>)\s?(.*)?\s?(<\/h\2>)#';
	$text = preg_replace($regex,'', $text);

	// Set the word count
	$excerpt_length = apply_filters('excerpt_length', $word_count); // WP default word count is 55

	// Set the ending
	$excerpt_end = '...'; // The WP default is [...]
	$excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);

	$excerpt = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	return wpautop(apply_filters('wp_trim_excerpt', $excerpt));
}


/**
 * Shortcut function for displaying address from ACF options screen in various formats
 * @param $format
 *
 * @return string
 */
function doublee_address($format) {
	$output = '';

	if(class_exists('ACF')) {

		// Get fields from the theme options
		$street_address = get_field('street_address', 'option');
		$suburb = get_field('suburb', 'option');
		$state = get_field('state', 'option');
		$postcode = get_field('postcode', 'option');
		$phone = get_field('phone', 'option');

		// Return in the relevant format for output
		$output = '';
		if($format == 'compact') {
			$output .= '<span>';
			$output .= $street_address . ' ';
			$output .= $suburb . ' ';
			$output .= $state . ' ';
			$output .= $postcode . ' ';
			$output .= '</span>';
			$output .= '<span class="phone">';
			$output .= $phone;
			$output .= '</span>';
		} else if($format == 'expanded') {
			$output .= '<address itemscope itemtype="http://schema.org/LocalBusiness">';
			$output .= '<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';
			if(!empty($street_address)) {
				$output .= '<div class="address"><i class="fas fa-envelope"></i><span itemprop="streetAddress">'.$street_address.'</span></div>';
			}
			if(!empty($suburb)) {
				$output .= '<div><span itemprop="addressLocality">'.$suburb.'</span></div>';
			}
			if(!empty($state)) {
				$output .= '<div><span itemprop="addressRegion">'.$state.'</span></div>';
			}
			if(!empty($postcode)) {
				$output .= '<div><span itemprop="postalCode">'.$postcode.'</span></div>';
			}
			if(!empty($phone)) {
				$output .= '<div class="phone"><i class="fas fa-phone"></i><span itemprop="telephone">'.$phone.'</span></div>';
			}
			$output .= '</div></address>';
		}
	}

	return $output;
}


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
