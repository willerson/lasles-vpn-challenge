<?php
namespace Fuerza\View;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register view composers and globals.
 * This is an example class so feel free to modify or remove it.
 */
class ViewServiceProvider implements ServiceProviderInterface {

	/**
	 * Register function
	 *
	 * @param \Pimple\Container $container container to register.
	 * @return void
	 */
	public function register( $container ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		// Nothing to register.
	}

	/**
	 * Bootstrap function
	 *
	 * @param \Pimple\Container $container container to register.
	 * @return void
	 */
	public function bootstrap( $container ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		$this->registerGlobals();
		$this->registerComposers();
	}

	/**
	 * Register view globals.
	 *
	 * @return void
	 */
	protected function registerGlobals() {
		/**
		 * Globals
		 *
		 * @link https://docs.wpemerge.com/#/framework/views/overview
		 */
		// phpcs:ignore
		// \Fuerza::views()->addGlobal( 'foo', 'bar' );
	}

	/**
	 * Register view composers.
	 *
	 * @return void
	 */
	protected function registerComposers() {
		/**
		 * View composers
		 *
		 * @link https://docs.wpemerge.com/#/framework/views/view-composers
		 */
		// phpcs:ignore
		// \Fuerza::views()->addComposer( 'views/partials/foo', 'FooPartialViewComposer' );
	}
}
