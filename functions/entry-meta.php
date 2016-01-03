<?php
/**
 * Entry meta information for posts
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 0.1.4
 */

if ( ! function_exists( 'doublee_entry_meta' ) ) :
	function doublee_entry_meta() {
		echo '<time class="date">Posted on ' . the_date('l, F j, Y') . '</time>';
		echo '<p class="byline author">'. __( 'Posted by', '' ) .' <a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'" rel="author">'. get_the_author() .'</a></p>';
	}
endif;
?>
