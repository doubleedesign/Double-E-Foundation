<?php
/**
 * The template part for displaying excerpts in list format

 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 1.0
 */
?>

<?php
$format = get_post_format();
$type = get_post_type();
$category = get_the_category();

// Determine wrapping tag
if($type == 'post') {
	$tag = 'article';
} else {
	$tag = 'div';
}

// Determine button text
if ($format == 'video') {
	$button_text = "Watch";
} else {
	$button_text = "Read more";
}
?>

<<?php echo $tag; ?> <?php post_class('excerpt-wrapper excerpt-list-style row collapse'); ?>>

<div class="small-12 columns">

	<div class="nested row">

			<div class="content small-12 medium-8 xlarge-9 columns">

				<?php
				// Meta/labels for posts
				if($type == 'post') { ?>
					<div class="meta nested row">
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
				// If manual excerpt is set, use that
				if(has_excerpt()) {
					the_excerpt();
				} else {
					// Otherwise, use custom excerpt function, which can be found in functions/developer.php
					echo doublee_custom_excerpt(get_the_content(), 30);
				} ?>
				<a class="small button" href="<?php the_permalink(); ?>"><?php echo $button_text; ?></a>

			</div>

		</div>

	</div>

</<?php echo $tag; ?>>