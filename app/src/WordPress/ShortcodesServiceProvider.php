<?php

namespace Fuerza\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register shortcodes.
 */
class ShortcodesServiceProvider implements ServiceProviderInterface {

	/**
	 * Class register
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
		// phpcs:ignore
		// add_shortcode( 'example', [$this, 'shortcodeExample'] );
	}

	/**
	 * Example shortcode.
	 *
	 * @param  array $atts shortcode attributes.
	 * @return string
	 */
	public function shortcodeExample( $atts ) {
		$atts = shortcode_atts(
			[
				'example_attribute' => 'example_value',
			],
			$atts,
			'example'
		);

		ob_start();
		?>
		<div class="shortcode-example">
			<!-- Your shortcode content goes here ... -->
		</div>
		<?php
		$html = ob_get_clean();

		// Alternatively, you can use a WP Emerge View instead of a buffer:!
		// $html = \Fuerza::view( 'some-view' )->with( $atts )->with( 'content', $content )->toString();!

		return $html;
	}
}
