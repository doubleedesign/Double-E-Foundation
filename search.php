<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row">

	<main class="small-12 large-8 columns" role="main">

		<h2><?php _e( 'Search Results for', '' ); ?> "<?php echo get_search_query(); ?>"</h2>

		<?php if ( have_posts() ) : ?>
    
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endwhile; ?>
    
            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
    
        <?php endif;?>


		<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>

		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', '' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', '' ) ); ?></div>
		</nav>
        
	<?php } ?>

	</main>
    
	<?php get_sidebar(); ?>
    
</div>
<?php get_footer(); ?>
