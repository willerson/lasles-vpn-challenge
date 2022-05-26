<?php
/**
 * Template helpers.
 *
 * @package Fuerza
 */

/**
 * Render a template using WPEmerge::render();
 * Interface matches get_template_part() with the addition of $context.
 *
 * @param string              $view - The path for the view.
 * @param array<string|mixed> $context - The context to be passed to $view.
 */
function fuerza_render( $view, $context = [] ) {
	\Fuerza::render( $view, $context );
}

/**
 * Render a component.
 *
 * @param string              $component - The component name.
 * @param array<string|mixed> $context - The context that will be passed to $component.
 */
function fuerza_component( $component, $context = [] ) {
	fuerza_render( "views/components/$component", $context );
}

/**
 * Render a partial.
 *
 * @param string              $partial - The partial name.
 * @param array<string|mixed> $context - The context that will be passed to $partial.
 */
function fuerza_partial( $partial, $context = [] ) {
	fuerza_render( "views/partials/$partial", $context );
}
