<?php

namespace Fuerza\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register login page filters.
 */
class LoginServiceProvider implements ServiceProviderInterface {

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
		add_filter( 'login_headerurl', [ $this, 'filterLoginHeaderUrl' ] );

		if ( version_compare( get_bloginfo( 'version' ), '5.2', '<' ) ) {
			add_filter( 'login_headertitle', [ $this, 'filterLoginHeaderTest' ] );
		}

		add_filter( 'login_headertext', [ $this, 'filterLoginHeaderTest' ] );
	}

	/**
	 * Filter the login page header URL.
	 *
	 * @return string
	 */
	public function filterLoginHeaderUrl() {
		return home_url( '/' );
	}

	/**
	 * Filter the login page header text.
	 *
	 * @return string
	 */
	public function filterLoginHeaderTest() {
		return get_bloginfo( 'name' );
	}
}
