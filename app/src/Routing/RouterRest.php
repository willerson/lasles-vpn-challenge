<?php
namespace Fuerza\Routing;

use WPEmerge\Support\Arr;
use WPEmerge\Helpers\HasAttributesTrait;
use WPEmerge\Application\Closure;

/**
 * Provide routing for rest api requests.
 */
class RouterRest {
	use HasAttributesTrait;
	use HasRoutesRestTrait;

	/**
	 * Group stack.
	 *
	 * @var array<array<string, mixed>>
	 */
	protected $group_stack = [];

	/**
	 * Get the top group from the stack.
	 *
	 * @codeCoverageIgnore
	 * @return array<string, mixed>
	 */
	protected function getGroup() {
		return Arr::last( $this->group_stack, null, [] );
	}

	/**
	 * Add a group to the group stack, merging all previous attributes.
	 *
	 * @codeCoverageIgnore
	 * @param array<string, mixed> $group Router group.
	 * @return void
	 */
	protected function pushGroup( $group ) {
		$this->group_stack[] = $this->mergeAttributes( $this->getGroup(), $group );
	}

	/**
	 * Remove last group from the group stack.
	 *
	 * @codeCoverageIgnore
	 * @return void
	 */
	protected function popGroup() {
		array_pop( $this->group_stack );
	}

	/**
	 * Create a route group.
	 *
	 * @codeCoverageIgnore
	 * @param  array<string, mixed> $attributes Router attributes.
	 * @param  Closure|string       $routes Closure or path to file.
	 * @return void
	 */
	public function group( $attributes, $routes ) {
		$this->pushGroup( $attributes );

		if ( is_string( $routes ) ) {
			// phpcs:ignore @noinspection PhpIncludeInspection
			// phpcs:ignore @codeCoverageIgnore
			require_once $routes;
		} else {
			$routes();
		}

		$this->popGroup();
	}

	/**
	 * Merge attributes into route.
	 *
	 * @param  array<string, mixed> $old Old.
	 * @param  array<string, mixed> $new New.
	 * @return array<string, mixed>
	 */
	public function mergeAttributes( $old, $new ) {
		return [
			'args'       => $this->mergeArgsAttribute(
				Arr::get( $old, 'args', [] ),
				Arr::get( $new, 'args', [] )
			),

			'methods'    => $this->mergeMethodsAttribute(
				Arr::get( $old, 'methods', '' ),
				Arr::get( $new, 'methods', '' )
			),

			'namespace'  => $this->mergeNamespaceAttribute(
				Arr::get( $old, 'namespace', 'api/v1' ),
				Arr::get( $new, 'namespace', '' )
			),

			'handler'    => $this->mergeHandlerAttribute(
				Arr::get( $old, 'handler', '' ),
				Arr::get( $new, 'handler', '' )
			),

			'name'       => $this->mergeNameAttribute(
				Arr::get( $old, 'name', '' ),
				Arr::get( $new, 'name', '' )
			),

			'url'        => $this->mergeUrlAttribute(
				Arr::get( $old, 'url', '' ),
				Arr::get( $new, 'url', '' )
			),

			'permission' => $this->mergePermissionAttribute(
				Arr::get( $old, 'permission', '__return_true' ),
				Arr::get( $new, 'permission', '' )
			),
		];
	}

	/**
	 * Merge the methods attribute combining values.
	 *
	 * @param  string[] $old Old.
	 * @param  string[] $new New.
	 * @return string[]
	 */
	public function mergeArgsAttribute( $old, $new ) {
		return array_merge( $old, $new );
	}

	/**
	 * Merge the namespace attribute taking the latest value.
	 *
	 * @param  string $old Old.
	 * @param  string $new New.
	 * @return string
	 */
	public function mergeNamespaceAttribute( $old, $new ) {
		return ! empty( $new ) ? $new : $old;
	}

	/**
	 * Merge the namespace attribute taking the latest value.
	 *
	 * @param  string|function $old Old.
	 * @param  string|function $new New.
	 * @return string|function
	 */
	public function mergePermissionAttribute( $old, $new ) {
		return ! empty( $new ) ? $new : $old;
	}

	/**
	 * Merge the url attribute taking the latest value.
	 *
	 * @param  string $old Old.
	 * @param  string $new New.
	 * @return string
	 */
	public function mergeUrlAttribute( $old, $new ) {
		$url = "$old/$new";

		// Trim slashes.
		$url = preg_replace( '/^\/|\/$/', '', $url );
		// Resuce multiple slashes to a single one.
		$url = preg_replace( '/\/{2,}/', '/', $url );

		return $url;
	}

	/**
	 * Merge the methods attribute combining values.
	 *
	 * @param  string $old Old.
	 * @param  string $new New.
	 * @return string
	 */
	public function mergeMethodsAttribute( $old, $new ) {
		return ! empty( $new ) ? $new : $old;
	}

	/**
	 * Merge the handler attribute taking the latest value.
	 *
	 * @param  string|Closure $old Old.
	 * @param  string|Closure $new New.
	 * @return string|Closure
	 */
	public function mergeHandlerAttribute( $old, $new ) {
		return ! empty( $new ) ? $new : $old;
	}

	/**
	 * Merge the name attribute combining values with a dot.
	 *
	 * @param  string $old Old.
	 * @param  string $new New.
	 * @return string
	 */
	public function mergeNameAttribute( $old, $new ) {
		$name = implode( '.', array_filter( [ $old, $new ] ) );

		// Trim dots.
		$name = preg_replace( '/^\.+|\.+$/', '', $name );

		// Reduce multiple dots to a single one.
		$name = preg_replace( '/\.{2,}/', '.', $name );

		return $name;
	}

	/**
	 * Make a route handler.
	 *
	 * @codeCoverageIgnore
	 * @throws ConfigurationException Throw if no route handler specified.
	 * @param  string|null $handler The route handler.
	 * @return Closure
	 */
	protected function routeHandler( $handler ) {
		if ( null === $handler ) {
			throw new ConfigurationException( 'No route handler specified. Did you miss to call handle()?' );
		}

		$namespace                   = '\Fuerza\\Controllers\\RestApi\\';
		list( $controller, $method ) = explode( '@', $handler );

		return \Fuerza::closure()->method( $namespace . $controller, $method );
	}

	/**
	 * Make a route.
	 *
	 * @throws ConfigurationException Throw if not have assigner request method.
	 * @param  array<string, mixed> $attributes Route attributes.
	 * @return array<mixed>
	 */
	public function route( $attributes ) {
		$attributes = $this->mergeAttributes( $this->getGroup(), $attributes );

		$attributes = array_merge(
			$attributes,
			[
				'handler' => $this->routeHandler( $attributes['handler'] ),
			]
		);

		if ( empty( $attributes['methods'] ) ) {
			throw new ConfigurationException(
				'Route does not have any assigned request methods. ' .
				'Did you miss to call get() or post() on your route definition, for example?'
			);
		}

		return $this->attributes( $attributes );
	}
}
