<?php
/**
 * Helper functions related to reusable blocks.
 *
 * @package Fuerza
 */

/**
 * Add reusable blocks to ACF post type.
 *
 * @param array $post_types ACF post types array.
 * @return array ACF post types array with wp_block added.
 */
function fuerza_filter_acf_get_post_types( $post_types ) {
	if ( ! in_array( 'wp_block', $post_types, true ) ) {
		$post_types[] = 'wp_block';
	}

	return $post_types;
}

/**
 * Add reusable blocks menu.
 */
function fuerza_add_reusable_block_menu() {
	add_menu_page( 'linked_url', __( 'Reusable Blocks', 'fuerza' ), 'read', 'edit.php?post_type=wp_block', '', 'dashicons-layout', 22 );
}
