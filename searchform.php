<?php
/**
 * The template for displaying search form
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 3.1.2
 */
?>
<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	<div class="row collapse">
		<div class="expand columns">
			<input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Search ' . get_bloginfo('name') , '' ); ?>">
		</div>
		<div class="shrink columns">
			<button type="submit" class="button">
				<i class="fas fa-search"></i>
			</button>
		</div>
	</div>
</form>