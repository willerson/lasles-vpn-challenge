<?php
/**
 * Content + Sidebar layout.
 *
 * Render a layout with the Content at the left side and the Sidebar on the right side.
 *
 * @link https://docs.wpemerge.com/#/framework/views/layouts
 * @package Fuerza
 */

\Fuerza::render( 'header' );
fuerza_component( 'header' );

if ( ! is_singular() ) {
	fuerza_the_title( '<h2 class="post-title">', '</h2>' );
}

\Fuerza::layoutContent();

\Fuerza::render( 'sidebar' );

fuerza_component( 'footer' );
\Fuerza::render( 'footer' );
