<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 2.3.0
 */

?>

<header class="page-header small-12 columns">
	<h1 class="page-title"><?php _e( 'Nothing Found', '' ); ?></h1>
</header>

<div class="entry-content small-12 columns">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', '' ), admin_url( 'post-new.php' ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', '' ); ?></p>
	<?php get_search_form(); ?>

	<?php else : ?>

	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', '' ); ?></p>
	<?php get_search_form(); ?>

	<?php endif; ?>
</div>