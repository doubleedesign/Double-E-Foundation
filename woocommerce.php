<?php
/**
 * Basic WooCommerce support
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 2.3.0
 */

get_header(); ?>

<?php get_template_part('template-parts/featured-image-banner'); ?>

<div class="row">
		
	<?php if(is_shop()) { ?>
		<div class="small-12 large-8 columns">
		<?php get_sidebar(); ?>
	<?php } else { ?>
		<div class="small-12 columns">	
	<?php } ?>

	<?php while ( woocommerce_content() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>

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

	</div>
	
</div>
<?php get_footer(); ?>