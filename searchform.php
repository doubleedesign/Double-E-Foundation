<?php
/**
 * The template for displaying search form
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since FoundationPress 1.0.0
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="row collapse">

		<div class="small-8 columns">
			<input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', '' ); ?>">
		</div>

		<div class="small-4 columns">
			<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', '' ); ?>" class="prefix button">
		</div>

	</div>
</form>
