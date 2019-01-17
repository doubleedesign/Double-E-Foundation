<?php
/**
 * The template part for displaying excerpts of the child pages of the current page
 
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 3.1.2
 */
?>

<?php
$count = 0;
$args = array( 
	'posts_per_page'	=> -1,
	'orderby'			=> 'menu_order',
	'order' 			=> 'ASC',
	'post_parent' 		=> $post->ID,
	'post_type' 		=> 'page',
	'post_status' 		=> 'publish', 
);
$childpages = new WP_Query( $args );
if ( $childpages->have_posts() ) { ?>
	<section id="children">
		<?php while ( $childpages->have_posts() ) {
			$childpages->the_post();
			$count++;
			?>
			<?php
			// Default order is image then content, stacked on mobile
			// Adjust order through classes to alternate order on on larger screens
			if ($count % 2 == 0) { // if $count is even
				$even_odd = 'even';
				$content_classes = 'small-12 large-6 columns large-order-1';
				$image_classes = 'small-12 large-6 columns large-order-2';
			} else { // $count is odd
				$even_odd = 'odd';
				$content_classes = 'small-12 large-6 columns';
				$image_classes = 'small-12 large-6 columns';
			} ?>
			<div <?php post_class('child-page copy-image ' . $even_odd); ?>>
				<div class="row align-center">
					<?php if(has_post_thumbnail()) { ?>
						<div class="image <?php echo $image_classes; ?>">
							<?php the_post_thumbnail('large'); ?>
						</div>
					<?php } ?>
					<div class="content <?php echo $content_classes; ?>">
						<h2><?php the_title(); ?></h2>
						<?php
						// Use the manual excerpt if set
						if(has_excerpt()) {
							the_excerpt();
							// Otherwise, use custom excerpt function,
							// which can be found in functions/developer.php
						} else {
							echo doublee_custom_excerpt(get_the_content(), 30);
						} ?>
						<a class="primary button">Read more <i class="fal fa-angle-right"></i></a>
					</div>
				</div>
			</div>
		<?php } ?>
	</section>
<?php
}
wp_reset_postdata();
