<?php
/**
 * Helper functions related to gutenberg blocks.
 *
 * @package Fuerza
 */

/**
 * Render the block attributes.
 * This function is used in all block opening tag.
 *
 * @param array $block List of data.
 */
function fuerza_block_attrs( $block ) {
	// Block id.
	$custom_block_id = fuerza_field( 'custom_block_id' );
	$block_id        = empty( $custom_block_id ) ? $block['id'] : $custom_block_id;

	// Block classes.
	$layout = fuerza_field( 'layout' );
	$items  = fuerza_field( 'items' );
	$count  = ! empty( $items ) && \is_array( $items ) ? count( $items ) : false;
	$styles = fuerza_field( 'style' );

	if ( ! empty( $styles ) && \is_array( $styles ) ) {
		$style_classes = [];

		foreach ( $styles as $style ) {
			$style_classes[] = "b-{$block['slug']}-style-{$style}";
		}
	} else {
		$style_classes = [];
	}

	$classes = \array_merge(
		[
			$block['classes'],
			"b-{$block['slug']}--layout-{$layout}" => ! empty( $layout ),
			"b-{$block['slug']}--items-{$count}"   => ! empty( $count ),
		],
		$style_classes
	);

	$attributes = [
		'id'    => $block_id,
		'class' => classNames( $classes ),
	];

	echo fuerza_attributes( $attributes );
}
