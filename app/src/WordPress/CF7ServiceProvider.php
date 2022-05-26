<?php

namespace Fuerza\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Contact Form 7 Service Provider.
 */
class CF7ServiceProvider implements ServiceProviderInterface {

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
		remove_action( 'wpcf7_init', 'wpcf7_add_form_tag_submit' );
		add_filter( 'wpcf7_autop_or_not', '__return_false' );
		add_action( 'wpcf7_init', [ &$this, 'registerFormTag' ] );
	}

	/**
	 * Register a form tag.
	 *
	 * @return void
	 */
	public function registerFormTag() {
		wpcf7_add_form_tag( 'submit', [ &$this, 'addFormTagSubmit' ] );
	}

	/**
	 * Add submit tag html.
	 *
	 * @param array $tag tag properties.
	 * @return string
	 */
	public function addFormTagSubmit( $tag ) {
		$atts             = [];
		$tag              = new \WPCF7_FormTag( $tag );
		$css_class        = wpcf7_form_controls_class( $tag->type );
		$atts['type']     = 'submit';
		$atts['id']       = $tag->get_id_option();
		$atts['class']    = $tag->get_class_option( $css_class );
		$atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );

		$atts  = wpcf7_format_atts( $atts );
		$value = isset( $tag->values[0] )
			? $tag->values[0]
			: esc_html__( 'Send', 'atlas' );

		$html = sprintf(
			'<button %1s>
				<span>%2s</span>
			</button>',
			$atts,
			$value
		);

		return $html;
	}
}
