<?php

namespace Fuerza\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register widgets and sidebars.
 */
class MenusServiceProvider implements ServiceProviderInterface {

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
		add_action( 'after_setup_theme', [ $this, 'registerMenus' ] );
	}

	/**
	 * Register menu locations.
	 *
	 * @return void
	 */
	public function registerMenus() {
		register_nav_menus(
			[
				'main-menu'    => __( 'Main Menu', 'fuerza' ),
				'privacy-menu' => __( 'Privacy Menu', 'fuerza' ),
			]
		);
	}
}
