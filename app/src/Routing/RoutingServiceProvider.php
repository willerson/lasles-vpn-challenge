<?php
namespace Fuerza\Routing;

use Pimple\Container;
use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Provide routing dependencies
 *
 * @codeCoverageIgnore
 */
class RoutingServiceProvider implements ServiceProviderInterface {

	/**
	 * Register function
	 *
	 * @param \Pimple\Container $container container to register.
	 * @return void
	 */
	public function register( $container ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		$container['fuerza.routing.router_rest'] = function() {
			return new RouterRest();
		};

		$container['fuerza.routing.route_rest_register'] = function( $c ) {
			return new RouteRestBluePrint( $c['fuerza.routing.router_rest'] );
		};

		$app = $container[ WPEMERGE_APPLICATION_KEY ];
		$app->alias( 'rest', 'fuerza.routing.route_rest_register' );
	}

	/**
	 * Class bootstrap
	 *
	 * @param \Pimple\Container $container container to register.
	 * @return void
	 */
	public function bootstrap( $container ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		// Nothing to bootstrap.
	}
}
