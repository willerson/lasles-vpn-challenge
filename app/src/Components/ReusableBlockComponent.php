<?php
namespace Fuerza\Components;

/**
 * Reusable Block Component
 *
 * @package Fuerza
 */
class ReusableBlockComponent implements ComponentInterface {

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
				'content' => [ &$this, 'getContent' ],
			],
			$context
		);
	}

	/**
	 * Get content.
	 */
	public function getContent() {
		if ( $this->context['reusable_block'] > 0 ) {
			$reusable_block_post = get_post( $this->context['reusable_block'] );

			return $reusable_block_post->post_content;
		} else {
			return '';
		}
	}
}
