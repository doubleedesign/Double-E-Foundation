<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 2.0
 */

 get_header(); ?>

 <?php get_template_part( 'template-parts/featured-image-banner' ); ?>

 <div id="page" class="row">

	 <?php while ( have_posts() ) : the_post(); ?>
       <main <?php post_class('small-12 medium-8 columns') ?> id="post-<?php the_ID(); ?>">
       
           <header>
               <h1 class="entry-title">
                    <?php
				   		$visual_page_title = get_post_meta( $post->ID, 'doublee_visual-page-title-entry', true ); 
				   		if (!empty($visual_page_title)) {
							echo $visual_page_title; 
						} else {
							the_title(); 
						}
				   	?>
               </h1>
           </header>
           
           <div class="entry-content">
               <?php the_content(); ?>
           </div>
           
           <footer>
               <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', '' ), 'after' => '</p></nav>' ) ); ?>
               <p><?php the_tags(); ?></p>
           </footer>
           
       </main>
     <?php endwhile;?>
    
     <?php get_sidebar(); ?>

 </div>

 <?php get_footer(); ?>
