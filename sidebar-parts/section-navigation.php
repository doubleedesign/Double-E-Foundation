<?php
/**
 * If on a page, show the hierarchy of pages in the current section
 * If on a post or archive, show a list of categories
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 2.3.1
 */
?>

<?php
$page_for_posts = get_option( 'page_for_posts' );
$blog_title = get_the_title($page_for_posts); 
$blog_url = get_permalink($page_for_posts); 

if (is_page()) {
	if ($post->post_parent)	{
		// This is a child page
		$ancestors = get_post_ancestors($post->ID);
		$root = count($ancestors)-1;
		$parent = $ancestors[$root];
		$parent_title = get_the_title($parent);
		$parent_url = get_permalink($parent); 
		?>

		<h3><a href="<?php echo $parent_url; ?>"><?php echo $parent_title; ?></a></h3>
		<?php 
		$children = wp_list_pages('sort_column=menu_order&title_li=&child_of='. $parent .'&echo=0&depth=2,');
		if ($children) { ?>
			<ul class="vertical menu">
				<?php echo $children; ?>
			</ul>
		<?php } 
	} else {
		// This is the top-level page
		$page = $post->ID;
		$page_title = get_the_title($page);
		$page_url = get_permalink($page); 
		?>
		<h3><a href="<?php echo $page_url; ?>"><?php echo $page_title; ?></a></h3>
		<?php 
		$children = wp_list_pages('sort_column=menu_order&title_li=&child_of='. $page .'&echo=0&depth=2,');
		if ($children) { ?>
			<ul class="vertical menu">
				<?php echo $children; ?>
			</ul>
		<?php } 
	}
	
} else if (is_singular('post') || is_archive() || is_category() || is_home() ) { ?>
	<h3><a href="<?php echo $blog_url; ?>"><?php echo $blog_title; ?></a></h3>
	<ul class="vertical menu">
		<?php wp_list_categories('title_li='); ?>
	</ul>
<?php } ?>