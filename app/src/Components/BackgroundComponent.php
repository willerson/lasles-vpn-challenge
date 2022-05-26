<?php
namespace Fuerza\Components;

/**
 * Background Component
 *
 * @package Fuerza
 */
class BackgroundComponent implements ComponentInterface {

	/**
	 * Constructor.
	 *
	 * @param array $file - The component file.
	 * @param array $context - The view context.
	 */
	public function __construct( $file, $context ) {
		$this->file    = $file;
		$this->context = $context;
	}

	/**
	 * Component context.
	 *
	 * @param array $file - The component file.
	 * @param array $context - The view context.
	 */
	public function getContext( $file, $context ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		return fuerza_defaults(
			[
				'size'             => 'full',
				'image_url'        => [ &$this, 'getImageUrl' ],
				'background_attrs' => [ &$this, 'getBackgroundAttrs' ],
				'has_background'   => [ &$this, 'hasBackground' ],
			],
			$context
		);
	}

	/**
	 * Check if has background.
	 *
	 * @param string $image_url - The image url.
	 * @param array  $defaults - The default values.
	 * @return string
	 **/
	public function getImageUrl( $image_url, $defaults ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		return is_string( $this->context['image'] )
			? $this->context['image']
			: wp_get_attachment_image_url( $this->context['image'], $defaults['size'] );
	}

	/**
	 * Get background element attributes.
	 *
	 * @param array $background_attrs The background attributes.
	 * @param array $defaults - The default values.
	 *
	 * @return array
	 */
	public function getBackgroundAttrs( $background_attrs, $defaults ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		return [
			'class' => 'c-background__image',
			'style' => $defaults['image_url'] ? 'background-image: url("' . $defaults['image_url'] . '");' : '',
		];
	}

	/**
	 * Check if has background.
	 *
	 * @param Boob  $has_background - Has background.
	 * @param array $defaults - The default values.
	 * @return bool
	 **/
	public function hasBackground( $has_background, $defaults ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		return $this->context['display_background'] && ( ! empty( $defaults['image_url'] ) );
	}
}
