<?php

namespace Fuerza\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Add option pages.
 */
class OptionsServiceProvider implements ServiceProviderInterface {

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
		add_action( 'acf/init', [ &$this, 'addOptionsPages' ] );
	}

	/**
	 * Add Options pages.
	 *
	 * @return void
	 */
	public function addOptionsPages() {
		if ( ! function_exists( 'acf_add_options_page' ) ) {
			return;
		}

		acf_add_options_page(
			[
				'page_title' => __( 'Theme Options', 'fuerza' ),
				'menu_title' => __( 'Theme', 'fuerza' ),
				'menu_slug'  => 'fuerza-settings',
				'icon_url'   => 'dashicons-hammer',
			]
		);

		$sub_pages = apply_filters( 'fuerza_option_pages', [] );

		foreach ( $sub_pages as $page ) {
			acf_add_options_sub_page(
				[
					// phpcs:ignore
					'page_title'  => __( $page['page_title'], 'fuerza' ),
					// phpcs:ignore
					'menu_title'  => __( $page['menu_title'], 'fuerza' ),
					'parent_slug' => 'fuerza-settings',
				]
			);
		}
	}
}
