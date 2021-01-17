<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 3.0
 */

?>

			</div><!-- #content -->

			<footer id="footer">
				<div class="row">
					<div class="small-12 large-expand columns">
						<?php doublee_footer_menu(); ?>
					</div>
					<div class="shrink columns">
						<small>Website by <a href="http://www.doubleedesign.com.au">Double-E Design</a>.</small>
					</div>
				</div>
			</footer>

		<?php // Remove these three divs if not using offcanvas ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->


<?php // Preloader ?>
<script>
	var elem = document.getElementById('preloader');
	window.addEventListener('load', function(){
		elem.classList.add('fadeOut');
	});
</script>

<?php wp_footer(); ?>

</body>
</html>
