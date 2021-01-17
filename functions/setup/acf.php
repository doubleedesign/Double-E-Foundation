<?php
if (class_exists('ACF')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Site-Wide Options',
		'menu_title'	=> 'Site-Wide Options',
		'menu_slug' 	=> 'site-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}