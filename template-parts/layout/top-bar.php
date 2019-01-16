<div id="upper-bar" class="show-for-medium">
	<div class="row">
		<div class="shrink columns">
			<?php echo doublee_address('compact'); ?>
			<?php get_template_part('template-parts/social-links'); ?>
			<?php get_search_form(); ?>
		</div>
	</div>
</div>
<div id="top-bar" class="main-navigation top-bar" role="navigation">
	<div class="row align-middle align-justify">
		<div class="small-12 large-4 columns">
			<div id="logo">
				<a href="<?php echo site_url(); ?>" rel="home">
					<?php bloginfo('name'); ?>
				</a>
			</div>
		</div>
		<nav id="site-navigation" class="small-12 large-8 columns" data-toggler>
			<?php doublee_top_bar_menu(); ?>
			<?php //get_template_part( 'template-parts/layout/mobile-top-bar' ); ?>
		</nav>
	</div>
</div>
