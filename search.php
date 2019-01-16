<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 3.1.2
 */

get_header(); ?>

<?php get_template_part('template-parts/featured-image-banner'); ?>

<div id="page" class="search-results">

	<main class="row align-center" role="main">

		<div class="small-12 medium-8 columns">

			<h1>Search results for &ldquo;<?php get_search_query(); ?>&rdquo;</h1>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/excerpts/excerpt-list'); ?>
				<?php endwhile; ?>

				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>

			<?php endif;?>

			<?php doublee_pagination(); ?>

		</div>

	</main>
    
</div>
<?php get_footer(); ?>