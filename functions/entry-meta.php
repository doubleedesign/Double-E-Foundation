<?php
/**
 * Entry meta information for posts
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 2.1
 */

if ( ! function_exists( 'doublee_entry_meta' ) ) :
	function doublee_entry_meta() {
		echo '<p class="byline author">'. __( 'Posted by', '' ) .' <a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'" rel="author">'. get_the_author() .'</a> on <time class="date">' . get_the_date('l, F j, Y') . '</time></p>';
	}
endif;
?>