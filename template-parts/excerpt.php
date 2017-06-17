<?php
/**
 * The template part for displaying excerpts
 
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 2.3.0
 */
?>

<div class="card-wrapper small-12 medium-6 large-4 columns">

	<div class="card">
		
		<?php 
		$format = get_post_format(); 
		$type = get_post_type(); 
		$category = get_the_category(); 
		?>

		<div class="image">

			<?php if ($type == 'post') { ?>
			<div class="meta row">
				<?php 
				if ($format == 'video') {
					echo '<span class="label shrink columns"><i class="fa fa-play-circle"></i></span>';
				} else {
					echo '<span class="label shrink columns"><i class="fa fa-newspaper-o"></i></span>';
				}
				echo '<span class="label shrink columns"><a href="/category/'. $category[0]->slug .'">' . $category[0]->name . '</a></span>';
				?>
			</div>
			<?php } ?>
		
			<?php 
			if(has_post_thumbnail()) {
				the_post_thumbnail();
			} else { ?>
				<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/default-thumb.jpg" alt="" />
			<?php } ?>

		</div>

		<div class="card-section">
			<?php the_title( '<h3>', '</h3>' ); ?>
			<?php 
			// Use the manual excerpt if set
			if(has_excerpt()) {
				the_excerpt();
			// Otherwise, use custom excerpt function, which can be found in functions/developer.php
			} else {
				echo doublee_custom_excerpt(get_the_content());
			}
			?>
			<?php 
			if ($format == 'video') {
				$button_text = "Watch"; 
			} else {
				$button_text = "Read more";
			}
			?>
			<a class="small button" href="<?php the_permalink(); ?>"><?php echo $button_text; ?></a>
		</div>

	</div>

</div>