<?php
namespace Fuerza\Routing;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Provide custom route conditions.
 * This is an example class so feel free to modify or remove it.
 */
class RouteConditionsServiceProvider implements ServiceProviderInterface {

	/**
	 * Register route conditions
	 *
	 * @param \Pimple\Container $container container to register.
	 * @return void
	 */
	public function register( $container ) {
		// Example route condition registration.
		// $this->registerRouteCondition( $container, 'my_condition', MyCondition::class );!
	}

	/**
	 * Bootstrap the class
	 *
	 * @param \Pimple\Container $container container to register.
	 * @return void
	 */
	public function bootstrap( $container ) {
		// Nothing to bootstrap.
	}

	/**
	 * Register a class as a route condition
	 *
	 * @param  \Pimple\Container $container container to register.
	 * @param  string            $name route name.
	 * @param  string            $class_name name for the class.
	 * @return void
	 */
	protected function registerRouteCondition( $container, $name, $class_name ) {
		$container[ WPEMERGE_ROUTING_CONDITION_TYPES_KEY ] = array_merge(
			$container[ WPEMERGE_ROUTING_CONDITION_TYPES_KEY ],
			[
				$name => $class_name,
			]
		);
	}
}
