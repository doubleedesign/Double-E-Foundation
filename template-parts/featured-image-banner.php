<?php
// See functions/featured-image-banner.php
?>
<div id="featured-hero" role="banner">
	
	<?php /*
	<div class="row align-middle align-justify">
		<h1 class="entry-title small-12 large-6 columns">
			<span>
			<?php
				$page_for_posts = get_option( 'page_for_posts' );
				$category = get_the_category(); 
				
				if (class_exists('Woocommerce')) {
					$shop_page = get_option( 'woocommerce_shop_page_id' ); 
				}
	
				// On the shop page and single product pages, show the Shop page title
				if (class_exists('Woocommerce')) {
					if(is_shop() || is_product()) {
						$visual_page_title = get_post_meta( $shop_page, 'tsi_visual-page-title-entry', true ); 
						if (!empty($visual_page_title)) {
							echo $visual_page_title; 
						} else {
							the_title(); 
						}
				}
				
				// If this is a single post, get the first category name 
				} else if (is_single()) {
					 echo $category[0]->name; 

				// If this is a category archive, get the category name
				} else if (is_category()) {
					single_cat_title(); 
				
				// If this is the blog page or another archive page, get the site name and blog page name
				} else if (is_home() || is_archive() ) {
					echo get_bloginfo('name') . ' ' . get_the_title($page_for_posts); 
				
				// Otherwise, show this page's title
				} else {
					$visual_page_title = get_post_meta( $post->ID, 'tsi_visual-page-title-entry', true ); 
					if (!empty($visual_page_title)) {
						echo $visual_page_title; 
					} else {
						the_title(); 
					}
				}
			?>
			</span>
		</h1>
	</div>
	*/
	?>
</div>