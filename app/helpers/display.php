<?php
/**
 * Helper functions related to display, rendering and manipulating HTML.
 *
 * @package Fuerza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter body classes by removing unwanted strings.
 *
 * @param array $classes CSS body classes.
 * @return array
 */
function fuerza_cleanup_body_classes( array $classes ) {
	if ( is_single() || is_page() && ! is_front_page() ) {
		$base = basename( get_permalink() );

		if ( ! in_array( $base, $classes, true ) ) {
			$classes[] = $base;
		}
	}

	$classes = array_map(
		function ( $class ) {
			return preg_replace( [ '/-php?$/', '/^page-template-templates/' ], '', $class );
		},
		$classes
	);

	return array_filter( $classes );
}

/**
 * Renders the attributes for an HTML tag.
 * The function accepts attributes in associative array,
 * filters out falsy attributes and escapes the attribute values.
 *
 * @param array $attributes List of attributes to render.
 * @return string
 */
function fuerza_attributes( array $attributes = [] ) {
	$attributes = array_map(
		function( $name, $value ) {
			// All the falsy attributes should be filtered out except the alt attribute for the images.
			if ( ! boolval( $value ) && ! in_array( $name, [ 'alt' ], true ) ) {
				return false;
			}

			if ( true === $value ) {
				return $name;
			}

			if ( is_callable( $value ) ) {
				$value = $value();
			}

			if ( is_array( $value ) || is_object( $value ) ) {
				$value = wp_json_encode( $value );
			}

			return $name . '="' . esc_attr( $value ) . '"';
		},
		array_keys( $attributes ),
		array_values( $attributes )
	);

	return join( ' ', array_filter( $attributes ) );
}
