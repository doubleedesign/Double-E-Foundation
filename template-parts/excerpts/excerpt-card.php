<?php
/**
 * The template part for displaying excerpts in card format

 * @package WordPress
 * @subpackage Double-E Foundation 
 * @since Double-E Foundation 3.0.0
 */
?>

<div class="card-wrapper small-12 medium-6 large-4 columns">

	<div <?php post_class('excerpt card'); ?>>

		<?php
		$format = get_post_format();
		$type = get_post_type();
		$category = get_the_category();
		?>

		<?php the_post_thumbnail('medium'); ?>

		<div class="card-section">
			<?php include( 'meta.php' ); // get_template_part doesn't work for same subfolder ?>
			<h2><?php the_title(); ?></h2>
			<?php
			// Use the manual excerpt if set
			if(has_excerpt()) {
				the_excerpt();
				// Otherwise, use custom excerpt function, which can be found in functions/developer.php
			} else {
				echo doublee_custom_excerpt(get_the_content(), 30);
			}
			?>
			<?php
			if ($format == 'video') {
				$button_text = "Watch";
			} else if($type == 'question') {
				$button_text = "Read answer";
			} else {
				$button_text = "Read more";
			} ?>
		</div>

		<div class="card-divider">
			<a class="small button" href="<?php the_permalink(); ?>">
				<?php echo $button_text; ?>
			</a>
		</div>

	</div>

</div>