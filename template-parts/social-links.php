<?php if( ( class_exists('ACF') ) && have_rows('social_media_links', 'option' ) ) { ?>
	<ul class="social">
		<?php while( have_rows('social_media_links', 'option') ) {
			the_row();
			// Fields
			$label = get_sub_field('label');
			$icon = get_sub_field('font_awesome_icon_class');
			$url = get_sub_field('url');
			// Output ?>
			<li><a class="tippy" title="<?php echo $label; ?>" href="<?php echo $url; ?>" target="_blank"><i class="fab <?php echo $icon; ?>"></i></a></li>
		<?php } ?>
	</ul>
<?php } ?>