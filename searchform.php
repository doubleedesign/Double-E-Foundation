<?php
/**
 * The template for displaying search form
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 2.3.0
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="row collapse">

		<div class="expand columns">
			<input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Search our site', '' ); ?>">
		</div>

		<div class="shrink columns">
			<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', '' ); ?>" class="success button">
		</div>

	</div>
</form>