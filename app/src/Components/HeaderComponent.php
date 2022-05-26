<?php
namespace Fuerza\Components;

/**
 * Header Component
 *
 * @package Fuerza
 */
class HeaderComponent implements ComponentInterface {

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
				'social_media'   => fuerza_field( 'general_social_media', 'options' ),
				'header_buttons' => fuerza_field( 'header_buttons', 'options' ),
			],
			$context
		);
	}

	/**
	 * Main menu.
	 */
	public function mainMenu() {
		wp_nav_menu(
			[
				'container'      => false,
				'depth'          => 2,
				'theme_location' => 'main-menu',
				'menu_class'     => 'menu c-menu c-menu-main',
				'fallback_cb'    => false,
			]
		);
	}
}
