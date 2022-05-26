<?php
/**
 * Helper functions related to Gutenberg editor.
 *
 * @package Fuerza
 */

/**
 * Get editor color palette.
 *
 * @return array
 */
function fuerza_get_editor_color_palette() {
	$keys   = array_keys( \Fuerza::core()->config()->get( 'variables.color' ) );
	$values = array_values( \Fuerza::core()->config()->get( 'variables.color' ) );

	return array_map(
		function( $slug, $color ) {
			$name = ucfirst( str_replace( '-', ' ', $slug ) );

			return [
				'slug'  => $slug,
				'color' => $color,
				'name'  => $name,
			];
		},
		$keys,
		$values
	);
}

/**
 * Get editor gradient presets.
 *
 * @return array
 */
function fuerza_get_editor_gradient_presets() {
	$keys   = array_keys( \Fuerza::core()->config()->get( 'variables.gradient' ) );
	$values = array_values( \Fuerza::core()->config()->get( 'variables.gradient' ) );

	return array_map(
		function( $slug, $gradient ) {
			$name = ucfirst( str_replace( '-', ' ', $slug ) );

			return [
				'slug'     => $slug,
				'gradient' => $gradient,
				'name'     => $name,
			];
		},
		$keys,
		$values
	);
}

/**
 * Get editor font sizes.
 *
 * @return array
 */
function fuerza_get_editor_font_sizes() {
	$keys   = array_keys( \Fuerza::core()->config()->get( 'variables.font-size' ) );
	$values = array_values( \Fuerza::core()->config()->get( 'variables.font-size' ) );

	return array_map(
		function( $slug, $font_size ) {
			$name = str_replace( '-', ' ', $slug );

			return [
				'slug' => $slug,
				'size' => $font_size,
				'name' => strtoupper( $name ),
			];
		},
		$keys,
		$values
	);
}
