<?php
/**
 * Visual Page Title field for pages
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 2.0
 */

// The metabox
class doublee_visual_page_title {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
		add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'visual-page-title',
			'Visual page title',
			array( $this, 'render_metabox' ),
			'page',
			'normal',
			'high'
		);

	}

	public function render_metabox( $post ) {

		// Retrieve an existing value from the database.
		$doublee_visual_page_title_entry = get_post_meta( $post->ID, 'doublee_visual-page-title-entry', true );

		// Set default values.
		if( empty( $doublee_visual_page_title_entry ) ) $doublee_visual_page_title_entry = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="doublee_visual-page-title-entry" class="doublee_visual-page-title-entry_label">' . 'Visual page title' . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="doublee_visual_page_title_entry" style="width:500px;" name="doublee_visual-page-title-entry" class="doublee_visual_page_title_entry_field" placeholder="' . '' . '" value="' . esc_attr__( $doublee_visual_page_title_entry ) . '">';
		echo '			<p class="description">' . 'If you would like to use a different, more descriptive title on the actual page itself, add it here. If nothing is added, the normal page title will be used.' . '</p>';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {
		
		// Allow certain HTML tags
		$doublee_vpt_allowed_html = array(
			'em' => array(),
			'strong' => array(),
			'span' => array(),
		);

		// Sanitize user input using wp_kses instead of sanitize_text_field to allow the above HTML to be used
		$doublee_new_visual_page_title_entry = isset( $_POST[ 'doublee_visual-page-title-entry' ] ) ? wp_kses( $_POST[ 'doublee_visual-page-title-entry' ], $doublee_vpt_allowed_html ) : '';

		// Update the meta field in the database
		update_post_meta( $post_id, 'doublee_visual-page-title-entry', $doublee_new_visual_page_title_entry );

	}

}

new doublee_visual_page_title;


?>