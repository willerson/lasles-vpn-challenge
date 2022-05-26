<?php
namespace Fuerza\Blocks;

interface BlockInterface {

	/**
	 * Get data that will be available when rendering the block template.
	 *
	 * @param array $context An array with the default context.
	 *  $context = [
	 *      'block'         => (array) The block settings and attributes.
	 *      'content'       => (string) The block inner HTML (empty).
	 *      'is_preview'    => (bool) True during AJAX preview.
	 *      'post_id'       => (int|string) The post ID this block is saved to.
	 *      ...             => A member for each custom field (with the key being the field name).
	 *  ].
	 * @return array Each item in the array will be available as a separate variable in the block template.
	 */
	public function getContext( $context );
}
