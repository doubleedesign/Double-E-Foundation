<?php
/**
 * Developer functions - tools for theme development
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 2.2.3
 */

/* ==========================================
	OUTPUT POST ENTRY META
	Template usage: doublee_entry_meta(); 
============================================*/
if ( ! function_exists( 'doublee_entry_meta' ) ) :
	function doublee_entry_meta() {
		echo '<p class="byline author">'. __( 'Posted by', '' ) .' <a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'" rel="author">'. get_the_author() .'</a> on <time class="date">' . get_the_date('l, F j, Y') . '</time></p>';
	}
endif;


/* ==========================================
	CONTENT SPLITTER
	Splits get_the_content() into an array using the <!--more--> tag
	Template usage:
	<?php
	// split content into array
	$content = get_the_content('',FALSE,''); // arguments remove 'more' text
	$splitcontent = doublee_split_content($content);
	echo '<div class="your-markup">' . $splitcontent[0] . '</div>';
	echo '<div class="your-markup">' . $splitcontent[1] . '</div>';
	echo '<div class="your-markup">' . $splitcontent[2] . '</div>';
	//and so on for more sections!
	?>	
============================================*/
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

/* ==========================================
	GALLERY / CONTENT SPLITTER
	Output a gallery separately from the rest of the content
	More information: http://www.doubleedesign.com.au/developer-blog/separate-a-page-or-post-gallery-from-the-main-content-3
============================================*/

/** One gallery - strip the gallery shortcode **

	Template usage: 
	
	** Single content section **
	//Get the content without the gallery
	$content = strip_shortcode_gallery( get_the_content() ); 
	$content = str_replace( ']]>', ']]>', apply_filters( 'the_content', $content ) ); 
	// Show the gallery here
	$gallery = get_post_gallery();
	echo $gallery;			
	//Show it
	echo $content;
	
	** Combine with split content (using content splitter function above) **
	// Get the content without the gallery
	$content = doublee_strip_shortcode_gallery( get_the_content() ); 
	$content = str_replace( ']]>', ']]>', apply_filters( 'the_content', $content ) );          
	// Split it
	$splitcontent = doublee_split_content($content);
	echo $splitcontent[0];
	echo $splitcontent[1];
	// Show the gallery
	$gallery = get_post_gallery();
	echo $gallery;	
*/
function  doublee_strip_shortcode_gallery( $content ) {
    preg_match_all( '/'. get_shortcode_regex() .'/s', $content, $matches, PREG_SET_ORDER );
    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if ($pos !== false)
                    return substr_replace( $content, '', $pos, strlen($shortcode[0]) );
            }
        }
    }
    return $content;
}

/** Multiple galleries - strip all shortcodes - not suitable if you are using other shortcodes **
	Template usage: 
	// Show the content without the gallery
	$content = strip_shortcodes(get_the_content());
	echo wpautop($content);
	// Show the galleries
	$shortcodes = doublee_get_shortcodes( get_the_content());
	$gallery = $shortcodes[0];
	echo do_shortcode($gallery[0]); 
	echo do_shortcode($gallery[1]); 
	//and so on for further galleries
*/
// Return all shortcodes from the post
function doublee_get_shortcodes( $the_content ) {
    $shortcode = "";
    $pattern = get_shortcode_regex();
    preg_match_all('/'.$pattern.'/uis', $the_content, $matches);
    for ( $i=0; $i < 40; $i++ ) {
        if ( isset( $matches[0][$i] ) ) {
           $shortcode .= $matches[0][$i];
        }
    }
    //return $shortcode; //returns all galleries in one go, we don't necessarily want this
    return $matches; // returns an array, see above for template usage
}


/* ==========================================
	EXCERPT CUSTOMISER
	Strip headings and set the length
	Template usage: 
	// Check for a manually-set excerpt first
	if(has_excerpt()) {
		the_excerpt();
		// You can also use the function to shorten the manual excerpt:
		// doublee_custom_excerpt(get_the_excerpt()); 
	} else {
		doublee_custom_excerpt(get_the_content()); 
	}
============================================*/
function doublee_custom_excerpt($text) {

	 // Remove shortcode tags from the given content
	 $text = strip_shortcodes( $text );
	 $text = apply_filters('the_content', $text);
	 $text = str_replace(']]>', ']]&gt;', $text);

	 // Regular expression that strips the header tags and their content
	 $regex = '#(<h([1-6])[^>]*>)\s?(.*)?\s?(<\/h\2>)#';
	 $text = preg_replace($regex,'', $text);

	 // Set the word count
	 $excerpt_word_count = 30; // WP default is 55
	 $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);

	 // Set the ending
	 $excerpt_end = '...'; // The WP default is [...]
	 $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);

	 $excerpt = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	 return wpautop(apply_filters('wp_trim_excerpt', $excerpt, $raw_excerpt));
}


?>