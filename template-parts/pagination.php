<?php
global $wp_query;

$big = 999999999; // This needs to be an unlikely integer

// For more options and info view the docs for paginate_links()
// http://codex.wordpress.org/Function_Reference/paginate_links
$paginate_links = paginate_links( array(
	'base' => str_replace( $big, '%#%', html_entity_decode( get_pagenum_link( $big ) ) ),
	'current' => max( 1, get_query_var( 'paged' ) ),
	'total' => $wp_query->max_num_pages,
	'mid_size' => 5,
	'prev_next' => true,
	'prev_text' => __( '&laquo;', '' ),
	'next_text' => __( '&raquo;', '' ),
	'type' => 'list',
) );

$paginate_links = str_replace( "<ul class='page-numbers'>", "<ul class='pagination'>", $paginate_links );
$paginate_links = str_replace( '<li><span class="page-numbers dots">', "<li><a href='#'>", $paginate_links );
$paginate_links = str_replace( "<li><span class='page-numbers current'>", "<li class='current'>", $paginate_links );
$paginate_links = str_replace( '</span>', '</a>', $paginate_links );
$paginate_links = str_replace( "<li><a href='#'>&hellip;</a></li>", "<li><span class='dots'>&hellip;</span></li>", $paginate_links );
$paginate_links = preg_replace( '/\s*page-numbers/', '', $paginate_links );

// Display the pagination if more than one page is found.
if ( $paginate_links ) {
	echo '<div class="pagination row align-center">';
		echo $paginate_links;
	echo '</div><!--// end .pagination -->';
}