<?php
/**
 * Rest Api Routes.
 *
 * @package Fuerza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// phpcs:disable
/**
 * Route definition
 * A typical route definition consists of several attribute declaration and a finalizer, for example:
 *
 * \Fuerza::rest()->get()->url( 'example' )->handle( 'ExampleController@handle' );
 *
 * Les's break it down:
 * - `\Fuerza::rest()` - The rest() utility allows us to start registering a new rest api route. All of your routes will start this way.
 * - `get()` - Shorthand for `methods( 'GET' )`.
 * - `url( 'example' )` - Defining the URL path.
 * - `handle( 'ExampleController@handle' )` - Finalize the definition as a single route which is handled by ExampleController@handle when its conditions are satisfied.
 *
 * Attributes
 *
 * # Arguments
 * The `args` attribute defines the acceptable arguments of the route.
 *
 *
 * \Fuerza::rest()->...->args([
 * 		'id' => [
 * 			'description'      => __( 'The `id` example', 'fuerza' ),
 * 			'validate_callback => 'is_numeric,
 * 		]
 * ])->...
 *
 * # Namespace
 * The `setNamespace` define a unique namespace for your current route.
 *
 * \Fuerza::rest()->setNamespace( 'my-api/v2' )->get()->url( 'example' )->handle( 'ExampleController@handle' );
 *
 * # Permission
 * The `permission` define if a route need to be authenticated.
 *
 * \Fuerza::rest()->permission( '__return_false' )->get()->url( 'example' )->handle( 'ExampleController@handle' );
 * \Fuerza::rest()->permission( \Fuerza::closure()->method( '\Fuerza\Controllers\RestApi\ExampleController', 'setPermission' ) )->get()->url( 'example' )->handle( 'ExampleController@handle' );
 */
// \Fuerza::rest()->get()->url( 'example' )->handle( 'ExampleController@handle' );
