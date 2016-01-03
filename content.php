<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 0.1.4
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry-content'); ?>>

	<header>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php doublee_entry_meta(); ?>
	</header>
    
    <div class="entry-content">
		<?php the_content( __( 'Continue reading <i class="fa fa-angle-right"></i>', '' ) ); ?>
    </div>

	<footer>
		<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
    
</article>
