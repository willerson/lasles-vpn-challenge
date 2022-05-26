<?php
/**
 * Base layout.
 *
 * Render a full width layout without sidebars.
 *
 * @link https://docs.wpemerge.com/#/framework/views/layouts
 * @package Fuerza
 */

\Fuerza::render( 'header' );
fuerza_component( 'header' );

\Fuerza::layoutContent();

fuerza_component( 'footer' );
\Fuerza::render( 'footer' );
