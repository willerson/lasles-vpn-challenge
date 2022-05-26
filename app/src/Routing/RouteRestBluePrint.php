<?php
namespace Fuerza\Routing;

use WPEmerge\Helpers\HasAttributesTrait;

/**
 * Provide a fluent interface for registering rest routes.
 */
class RouteRestBluePrint {
	use HasAttributesTrait;

	/**
	 * Router.
	 *
	 * @var RouterRest
	 */
	protected $router_rest = null;

	/**
	 * Constructor.
	 *
	 * @codeCoverageIgnore
	 * @param RouterRest $router_rest The router rest service.
	 */
	public function __construct( RouterRest $router_rest ) {
		$this->router_rest = $router_rest;
	}

	/**
	 * Set the arguments attribute to a URL.
	 *
	 * @param  array<string, mixex> $args - Router args.
	 * @return static   $this
	 */
	public function args( $args ) {
		$args = $this->router_rest->mergeArgsAttribute(
			(array) $this->getAttribute( 'args', [] ),
			(array) $args
		);

		return $this->attribute( 'args', $args );
	}

	/**
	 * Set the permission attribute to the current route.
	 *
	 * @param string|function $permission - Router permission.
	 * @return static $this
	 */
	public function permission( $permission ) {
		return $this->attribute( 'permission', $permission );
	}

	/**
	 * Create a route group.
	 *
	 * @param  Closure|string $routes - Closure or path to file.
	 * @return void
	 */
	public function group( $routes ) {
		$this->router_rest->group( $this->getAttributes(), $routes );
	}

	/**
	 * Match requests using one of the specified methods.
	 *
	 * @param  string $methods - Router methods.
	 * @return static $this
	 */
	public function methods( $methods ) {
		return $this->attribute( 'methods', $methods );
	}

	/**
	 * Match requests with a method for readable content.
	 *
	 * @return static $this
	 */
	public function get() {
		return $this->methods( \WP_REST_Server::READABLE );
	}

	/**
	 * Match requests with a method for editable content.
	 *
	 * @return static $this
	 */
	public function post() {
		return $this->methods( \WP_REST_Server::EDITABLE );
	}

	/**
	 * Match requests with a method for deletable content.
	 *
	 * @return static $this
	 */
	public function delete() {
		return $this->methods( \WP_REST_Server::DELETABLE );
	}

	/**
	 * Match requests with a any method.
	 *
	 * @return static $this
	 */
	public function any() {
		return $this->methods( \WP_REST_Server::ALLMETHODS );
	}

	/**
	 * Set the URL path.
	 *
	 * @param  string $url - Router URL path.
	 * @return static $this
	 */
	public function url( $url ) {
		return $this->attribute( 'url', $url );
	}

	/**
	 * Set the namespace attribute.
	 *
	 * @param  string $namespace - Router namespace (defaults, 'api/v1').
	 * @return static $this
	 */
	public function setNamespace( $namespace ) {
		$namespace = $this->router_rest->mergeNamespaceAttribute(
			$this->getAttribute( 'namespace', '' ),
			$namespace
		);

		return $this->attribute( 'namespace', $namespace );
	}

	/**
	 * Create a route.
	 *
	 * @param  string $handler - Router handler.
	 * @return void
	 */
	public function handle( $handler = '' ) {
		if ( ! empty( $handler ) ) {
			$this->attribute( 'handler', $handler );
		}

		$route = $this->router_rest->route( $this->getAttributes() );

		$this->router_rest->addRoute( $route );
	}
}
