<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 2.3.0
 */

get_header(); ?>

<?php get_template_part('template-parts/featured-image'); ?>

<div id="search-results">

	<main class="row" role="main">

		<?php if ( have_posts() ) : ?>
    
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/excerpt'); ?>
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
    
</div>
<?php get_footer(); ?>