<?php
/**
 * The template part for displaying excerpts in list format

 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 5.0
 */
?>

<a href="<?php the_permalink(); ?>" class="tile--post row collapse animate">
	<?php
	if(has_post_thumbnail()) { ?>
		<div class="tile--post__image small-12 medium-4 large-3 columns">
			<?php the_post_thumbnail('thumbnail'); ?>
		</div>
		<div class="tile--post__copy body-copy small-12 medium-8 large-7 xlarge-6 columns">
	<?php
	} else { ?>
		<div class="tile--post__copy body-copy small-12 large-10 xlarge-9 columns">
	<?php } ?>
		<div class="tile--post__copy__inner">
			<h2><?php the_title(); ?></h2>
			<?php
			if(has_excerpt()) {
				echo wpautop(get_the_excerpt());
			} else {
				echo wpautop(doublee_custom_excerpt(get_the_content(), 30));
			} ?>
		</div>
	</div>
</a>