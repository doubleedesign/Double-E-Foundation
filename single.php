<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 0.1.4
 */

get_header(); ?>

<div id="single-post" class="row">

	<?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
            <header>
                <?php if (get_field('visual_page_title')) { the_field('visual_page_title'); } else { the_title(); } ?>
                <?php doublee_entry_meta(); ?>
            </header>
            <div class="entry-content">
    
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="row">
                    <div class="column">
                        <?php the_post_thumbnail( '', array('class' => 'th') ); ?>
                    </div>
                </div>
            <?php endif; ?>
    
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
