<?php
/*
Template Name: Full Width
*/
get_header(); ?>

<?php get_template_part( 'parts/featured-image' ); ?>

<div id="page-full-width" >

	<?php while ( have_posts() ) : the_post(); ?>
      <main <?php post_class('entry-content small-12 columns') ?> id="post-<?php the_ID(); ?>">
      
          <header>
              <h1 class="entry-title"><?php the_title(); ?></h1>
          </header>

          <?php the_content(); ?>
          
          <footer>
              <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', '' ), 'after' => '</p></nav>' ) ); ?>
              <p><?php the_tags(); ?></p>
          </footer>

          <?php comments_template(); ?>

      </main>
    <?php endwhile;?>


</div>

<?php get_footer(); ?>
