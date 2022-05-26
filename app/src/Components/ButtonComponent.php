<?php
namespace Fuerza\Components;

/**
 * Button Component
 *
 * @package Fuerza
 */
class ButtonComponent implements ComponentInterface {

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
				'link'      => [ &$this, 'getLink' ],
				'has_link'  => [ &$this, 'hasLink' ],
				'btn_class' => [ &$this, 'getBtnClass' ],
			],
			$context
		);
	}

	/**
	 * Get button link.
	 *
	 * @param Array $link - The link props.
	 * @return array
	 **/
	public function getLink( $link ) {
		return ( $link ?? [] ) + [
			'url'    => '',
			'target' => '',
			'title'  => '',
		];
	}

	/**
	 * Verify if has link.
	 *
	 * @param Boolean $has_link - Has link.
	 * @param array   $defaults - Default props.
	 */
	public function hasLink( $has_link, $defaults ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		return ! empty( $defaults['link'] )
			&& is_array( $defaults['link'] )
			&& ( ! empty( $defaults['link']['title'] ) || ! empty( $defaults['link']['url'] ) );
	}

	/**
	 * Get button css class.
	 *
	 * @return array
	 */
	public function getBtnClass() {
		return classNames(
			[
				'c-btn',
				$this->context['class'],
				$this->context['style'],
			]
		);
	}
}
