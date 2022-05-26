<?php
namespace Fuerza\Routing;

/**
 * Allow objects to have routes
 */
trait HasRoutesRestTrait {
	/**
	 * Array of registered routes
	 *
	 * @var array
	 */
	protected $routes_rest = [];

	/**
	 * Get routes.
	 *
	 * @codeCoverageIgnore
	 * @return RouterRest[]
	 */
	public function getRoutes() {
		return $this->routes_rest;
	}

	/**
	 * Get route arguments.
	 *
	 * @param RouterRest $route The route settings.
	 * @return array
	 */
	public function getRouteArgs( $route ) {
		$handler    = $route->getAttribute( 'handler' );
		$methods    = $route->getAttribute( 'methods' );
		$args       = $route->getAttribute( 'args' );
		$permission = $route->getAttribute( 'permission' );

		return [
			'methods'             => $methods,
			'callback'            => $handler,
			'args'                => $args,
			'permission_callback' => $permission,
		];
	}

	/**
	 * Add a route.
	 *
	 * @throws ConfigurationException Throw routes conditions.
	 * @param RouterRest $route The route settings.
	 * @return void
	 */
	public function addRoute( RouterRest $route ) {
		$routes_rest = $this->getRoutes();
		$name        = $route->getAttribute( 'name' );

		if ( in_array( $route, $routes_rest, true ) ) {
			throw new ConfigurationException( 'Attempted to register a route twice.' );
		}

		if ( '' !== $name ) {
			foreach ( $routes_rest as $registered ) {
				if ( $name === $registered->getAttribute( 'name' ) ) {
					throw new ConfigurationException( "The route name \"$name\" is already registered." );
				}
			}
		}

		$url       = $route->getAttribute( 'url' );
		$namespace = $route->getAttribute( 'namespace' );

		register_rest_route( $namespace, $url, $this->getRouteArgs( $route ) );

		$this->routes_rest[] = $route;
	}
}
