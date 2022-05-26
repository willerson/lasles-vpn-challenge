<?php
/**
 * Sidebar + Content layout.
 *
 * Render a layout with the Sidebar at the left side and the Content on the right side.
 *
 * @link https://docs.wpemerge.com/#/framework/views/layouts
 * @package Fuerza
 */

\Fuerza::render( 'header' );
fuerza_component( 'header' );

if ( ! is_singular() ) {
	fuerza_the_title( '<h2 class="post-title">', '</h2>' );
}

\Fuerza::render( 'sidebar' );

\Fuerza::layoutContent();

fuerza_component( 'footer' );
\Fuerza::render( 'footer' );
