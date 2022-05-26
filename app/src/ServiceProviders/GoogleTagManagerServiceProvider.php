<?php
namespace Fuerza\ServiceProviders;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Google Tag Manager.
 *
 * Register a options to include the GTM Tag.
 *
 * @package Fuerza.
 */
class GoogleTagManagerServiceProvider implements ServiceProviderInterface {

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
	 * Class bootstrap
	 *
	 * @param \Pimple\Container $container container to register.
	 * @return void
	 */
	public function bootstrap( $container ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		add_filter( 'fuerza_option_pages', [ &$this, 'registerOption' ] );
		add_action( 'wp_head', [ &$this, 'headScript' ], 1 );
		add_action( 'wp_body_open', [ &$this, 'bodyScript' ], 1 );
	}

	/**
	 * Add the GTM subpage to the options page.
	 *
	 * @param array $sub_pages - The registered subpages.
	 */
	public function registerOption( $sub_pages ) {
		return array_merge(
			$sub_pages,
			[
				[
					'page_title' => 'Google Tag Manager Settings',
					'menu_title' => 'Google Tag Manager',
				],
			]
		);
	}

	/**
	 * Adds GTM code to HEAD
	 */
	public function headScript() {
		// Exit if GTM not enabled in options.
		if ( ! $this->isEnabledAndValid() ) {
			return;
		}

		// Get GMT container ID.
		$gtm_container_id = get_field( 'gtm_container_id', 'option' );

		// Print out GTM with container ID.
		?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','<?php echo esc_js( $gtm_container_id ); ?>');</script>
	<!-- End Google Tag Manager -->
		<?php

	}

	/**
	 * Adds GTM noscript code to BODY
	 */
	public function bodyScript() {
		// Exit if GTM not enabled in options.
		if ( ! $this->isEnabledAndValid() ) {
			return;
		}

		// Get GMT container ID.
		$gtm_container_id = get_field( 'gtm_container_id', 'option' );

		// Print out GTM noscript with container ID.
		?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_js( $gtm_container_id ); ?>"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
		<?php
	}

	/**
	 * Checks if GTM is enabled and the container ID is not empty
	 */
	public function isEnabledAndValid() {
		return get_field( 'gtm_enabled', 'option' ) === true && ! empty( get_field( 'gtm_container_id', 'option' ) );
	}
}
