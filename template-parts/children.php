<?php
/**
 * The template part for displaying excerpts of the child pages of the current page
 
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 2.3.0
 */
?>

<?php 
// WP_Query arguments
$args = array( 
	'posts_per_page'	=> -1,
	'orderby'			=> 'menu_order',
	'order' 			=> 'ASC',
	'post_parent' 		=> $post->ID,
	'post_type' 		=> 'page',
	'post_status' 		=> 'publish', 
); 

// The Query
$childpages = new WP_Query( $args );

// The Loop
if ( $childpages->have_posts() ) { ?>
	<div id="children" class="row">
		<?php while ( $childpages->have_posts() ) {
			$childpages->the_post();
			get_template_part('excerpts/excerpt-card');
		} ?>
	</div>

<?php
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();
?>