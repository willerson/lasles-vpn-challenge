<?php
namespace Fuerza\Components;

/**
 * Footer Component
 *
 * @package Fuerza
 */
class FooterComponent implements ComponentInterface {

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
				'copyright' => [ &$this, 'getCopyright' ],
			],
			$context
		);
	}

	/**
	 * Copyright.
	 */
	public function getCopyright() {
		$current_year = gmdate( 'Y' );
		$copyright    = fuerza_field( 'copyright', 'options' );
		$text         = str_replace( '{{ copy }}', "© $current_year", $copyright );

		return $text ? $text : "Copyright © $current_year. All rights reserved.";
	}

	/**
	 * Privacy menu.
	 */
	public function privacyMenu() {
		wp_nav_menu(
			[
				'container'      => false,
				'depth'          => 2,
				'theme_location' => 'privacy-menu',
				'menu_class'     => 'menu c-menu c-menu-privacy',
				'fallback_cb'    => false,
			]
		);
	}
}
