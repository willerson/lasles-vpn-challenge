<?php
/**
 * Option pages.
 *
 * @package Fuerza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns option sub pages.
 *
 * @param array $sub_pages The options sub pages.
 * @return array The options sub pages to show in the options page.
 */
function fuerza_add_option_pages( $sub_pages ) {
	return array_merge(
		$sub_pages,
		[
			[
				'page_title' => 'General Settings',
				'menu_title' => 'General',
			],
			[
				'page_title' => 'Header Settings',
				'menu_title' => 'Header',
			],
			[
				'page_title' => 'Footer Settings',
				'menu_title' => 'Footer',
			],
			[
				'page_title' => '404 page',
				'menu_title' => '404 page',
			],
		]
	);
}
