<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 2.3.0
 */

get_header(); ?>

<?php get_template_part('template-parts/featured-image-banner'); ?>

<div id="page" class="archive">
	
	<main class="row">
		<div class="small-12 medium-8 columns">
			<?php //echo term_description(); ?>
		</div>
		<?php get_sidebar(); ?>
	</main>

	<div class="row">
		<?php 
		if ( have_posts() ) {
			// Start the Loop 
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/excerpt', get_post_format() );
			endwhile; 
		} else {
			get_template_part( 'content', 'none' );
		} // End have_posts() check. 
		?>
	</div>
	
	<?php // Display navigation to next/previous pages when applicable 
	if ( function_exists( 'doublee_pagination' ) ) { 
		doublee_pagination(); 
	} else if ( is_paged() ) { ?>
		<nav id="post-nav" class="row align-center align-justify">
			<div class="post-previous columns"><?php next_posts_link( __( '&larr; Older posts', '' ) ); ?></div>
			<div class="post-next columns"><?php previous_posts_link( __( 'Newer posts &rarr;', '' ) ); ?></div>
		</nav>
	<?php } ?>
    
</div>

<?php get_footer(); ?>
