<?php
namespace Fuerza\Components;

/**
 * Link Component
 *
 * @package Fuerza
 */
class LinkComponent implements ComponentInterface {

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
				'url'        => '',
				'title'      => '',
				'target'     => '_self',
				'data'       => [],
				'attributes' => [ &$this, 'getAttributes' ],
			],
			$context
		);
	}

	/**
	 * Attributes.
	 *
	 * @param array $attrs = The tag attributes.
	 * @param array $defaults - The default tag attributes.
	 */
	public function getAttributes( $attrs, $defaults ) {
		$attrs = [
			'href'   => $defaults['url'],
			'class'  => $this->context['class'],
			'target' => $defaults['target'],
		];

		foreach ( $defaults['data'] as $key => $value ) {
			$attrs[ 'data-' . $key ] = $value;
		}

		return $attrs;
	}
}
