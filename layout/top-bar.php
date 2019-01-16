<div id="top-bar" class="main-navigation top-bar" role="navigation">
	<div class="row align-middle align-justify">
		<div class="small-12 large-4 columns">
			<div id="logo" class="row align-middle">
				<div class="columns"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
			</div>
		</div>
		<nav id="site-navigation" class="small-12 large-8 columns" data-toggler>
			<?php doublee_top_bar_menu(); ?>
			<?php //get_template_part( 'layout/mobile-top-bar' ); ?>
		</nav>
	</div>
</div>
