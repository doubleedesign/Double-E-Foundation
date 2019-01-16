<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 0.1.4
 */

get_header(); ?>

<?php get_template_part('template-parts/featured-image-banner'); ?>

<div id="single-post" class="row">

	<?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class('small-12 medium-8 columns') ?> id="post-<?php the_ID(); ?>">

            <header>
		    	<h1><?php the_title(); ?></h1>
                <?php echo doublee_entry_meta(); ?>
            </header>
    
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="featured-image-wrapper">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>
    
    		<div class="entry-content">
            	<?php the_content(); ?>
            </div>

            <footer>
                <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', '' ), 'after' => '</p></nav>' ) ); ?>
                <p><?php the_tags(); ?></p>
            </footer>
            
            <?php comments_template(); ?>
            
        </article>
    <?php endwhile;?>
    
    <?php get_sidebar(); ?>

</div>
<?php get_footer(); ?>
