<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since FoundationPress 2.3.0
 */

?>

		</section>
		<div id="footer-container">
			<footer id="footer" class="row align-middle align-justify">
				<div class="small-12 large-expand columns">
					<?php doublee_footer_menu(); ?>
				</div>
				<div class="shrink columns">
					<small>Website by <a href="http://www.doubleedesign.com.au">Double-E Design</a>.</small>
				</div>
			</footer>
		</div>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>


<?php wp_footer(); ?>

</body>
</html>
