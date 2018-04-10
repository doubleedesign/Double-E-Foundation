<?php
/**
 * The template part for displaying excerpts in card format

 * @package WordPress
 * @subpackage Double-E Foundation 
 * @since Double-E Foundation 3.0.0
 */
?>

<div class="card-wrapper small-12 medium-6 large-4 columns">

	<div <?php post_class('card'); ?>>

		<?php
		$format = get_post_format();
		$type = get_post_type();
		$category = get_the_category();
		?>

		<div class="labels image nested row">
			<div class="meta small-12 columns">
				<div class="inner">
					<?php
					if($type == 'post') {
						if ($format == 'video') {
							echo '<span class="label shrink columns"><i class="fa fa-play-circle"></i></span>';
						} else {
							echo '<span class="label shrink columns"><i class="fa fa-newspaper-o"></i></span>';
						}
						echo '<span class="label shrink columns"><a href="/category/' . $category[0]->slug . '">' . $category[0]->name . '</a></span>';
					}
					?>
				</div>
			</div>
		</div>

		<div class="card-section">
			<div class="wrap">
				<?php the_title( '<h3>', '</h3>' ); ?>
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
				}
				?>
			</div>
			<a class="small button" href="<?php the_permalink(); ?>"><?php echo $button_text; ?></a>
		</div>

	</div>

</div>