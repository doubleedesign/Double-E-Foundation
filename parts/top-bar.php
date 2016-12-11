<div id="top-bar" class="main-navigation top-bar" role="navigation">
	<div class="row">
		<div class="small-12 columns">
			<div class="top-bar-left">
				<ul class="menu">
					<li class="home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></li>
				</ul>
			</div>
			<nav id="site-navigation" class="top-bar-right">
				<?php doublee_top_bar_menu(); ?>

				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
					<?php get_template_part( 'parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</nav>
		</div>
	</div>
</div>