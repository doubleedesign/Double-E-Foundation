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

<div id="page" class="archive">
	
	<main class="row">
		<div class="small-12 medium-8 columns">
			<?php echo term_description(); ?>
		</div>
		<?php get_sidebar(); ?>
	</main>

	<div class="row">
	<?php if ( have_posts() ) { ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/excerpt', get_post_format() ); ?>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>

		<?php } // End have_posts() check. ?>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if ( function_exists( 'doublee_pagination' ) ) { doublee_pagination(); } else if ( is_paged() ) { ?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', '' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', '' ) ); ?></div>
			</nav>
		<?php } ?>
	</div>
    
</div>

<?php get_footer(); ?>