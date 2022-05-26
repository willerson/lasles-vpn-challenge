<?php
/**
 * Displays a link component.
 *
 * @package Fuerza
 * @see https://wordpress.stackexchange.com/questions/309233/sanitize-and-data-validation-with-apply-filters-function
 */

// phpcs:ignore
echo apply_filters( 'the_content', wp_kses_post( $content ) );
