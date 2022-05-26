<?php
namespace Fuerza\Components;

interface ComponentInterface {
	/**
	 * Get data that will be available when rendering the component template.
	 *
	 * @param array $file An array with file information.
	 *  $file = [
	 *      'filename' => (string) Component file name (e.g. "button-collection.php").
	 *      'slug'     => (string) Component slug (e.g. "button-collection").
	 *  ].
	 * @param array $context An array with the current context.
	 *  $context = [
	 *      'slot'          => (array) Slot content.
	 *      'global'        => (array) globals array registered with WPEmerge.
	 *      ...             => A member for each variable passed in the array to the component.
	 *      ...             => A member for each custom field associated with the custom fields group of the component.
	 *  ].
	 * @return array Each item in the array will be available as a separate variable in the component template.
	 */
	public function getContext( $file, $context );
}
