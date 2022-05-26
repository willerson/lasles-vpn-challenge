<?php

namespace Fuerza\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register theme support options.
 */
class ThemeServiceProvider implements ServiceProviderInterface {

	/**
	 * Register function
	 *
	 * @param \Pimple\Container $container container to register.
	 * @return void
	 */
	public function register( $container ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		// Nothing to register.
	}

	/**
	 * Bootstrap function
	 *
	 * @param \Pimple\Container $container container to register.
	 * @return void
	 */
	public function bootstrap( $container ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		add_action( 'after_setup_theme', [ $this, 'loadTextdomain' ] );
		add_action( 'after_setup_theme', [ $this, 'addThemeSupport' ] );
	}

	/**
	 * Load textdomain.
	 *
	 * @return void
	 */
	public function loadTextdomain() {
		load_theme_textdomain( 'fuerza', get_template_directory() . DIRECTORY_SEPARATOR . 'languages' );
	}

	/**
	 * Add theme support.
	 *
	 * @return void
	 */
	public function addThemeSupport() {
		/**
		 * Support custom logo.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/custom-logo/
		 */
		add_theme_support(
			'custom-logo',
			[
				'height'      => 100,
				'width'       => 400,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => [ 'site-title', 'site-description' ],
			]
		);

		/**
		 * Support automatic feed links.
		 *
		 * @link https://codex.wordpress.org/Automatic_Feed_Links
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support post thumbnails.
		 *
		 * @link https://codex.wordpress.org/Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Support document title tag.
		 *
		 * @link https://codex.wordpress.org/Title_Tag
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Support HTML5 markup.
		 *
		 * @link https://codex.wordpress.org/Theme_Markup
		 */
		add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );

		/**
		 * Manually select Post Formats to be supported.
		 *
		 * @link http://codex.wordpress.org/Post_Formats
		 */
		// phpcs:ignore
		// add_theme_support( 'post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'] );

		/**
		 * Support default editor block styles.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
		 */
		add_theme_support( 'wp-block-styles' );

		/**
		 * Support wide alignment for editor blocks.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
		 */
		add_theme_support( 'align-wide' );

		/**
		 * Support block editor styles.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
		 */
		add_theme_support( 'editor-styles' );
		add_editor_style( 'dist/styles/editor.css' );

		/**
		 * Support custom editor block color palette.
		 * Uses colors registered on config.json.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
		 */
		add_theme_support( 'editor-color-palette', fuerza_get_editor_color_palette() );

		/**
		 * Support custom editor block gradient presets.
		 * Uses gradients registered on config.json.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
		 */
		add_theme_support( 'editor-gradient-presets', fuerza_get_editor_gradient_presets() );

		/**
		 * Support color palette enforcement.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
		 */
		// phpcs:ignore
		// add_theme_support( 'disable-custom-colors' );

		/**
		 * Support custom editor block font sizes.
		 * Don't forget to edit resources/styles/shared/variables.scss when you update these.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
		 */
		add_theme_support( 'editor-font-sizes', fuerza_get_editor_font_sizes() );

		/**
		 * Support WooCommerce.
		 */
		add_theme_support( 'woocommerce' );
	}
}
