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
 * @since Double-E Foundation 5.0
 */

if(is_category()) {
	$title = get_the_archive_title();
}
else if(is_search()) {
	$title = 'Search results for &ldquo' . get_search_query() .' &rdquo;';
}
else {
	$title = get_the_title(get_option('page_for_posts'));
}

get_header(); ?>

<div class="archive archive--post">

	<header class="page-header pseudo-module row animate">
		<div class="small-12 large-8 columns body-copy">
			<h1><?php echo $title; ?></h1>
		</div>
	</header>

	<div class="row">
		<div class="small-12 large-8 columns">
			<?php
			if ( have_posts() ) {
				// Start the Loop
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/excerpt');
				endwhile;
			} else {
				get_template_part( 'content', 'none' );
			} ?>
		</div>
	</div>

	<?php get_template_part('template-parts/pagination'); ?>

</div>

<?php get_footer(); ?>