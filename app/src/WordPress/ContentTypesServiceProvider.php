<?php
namespace Fuerza\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

use Fuerza\ContentTypes\PostTypes\ExamplePostType;
use Fuerza\ContentTypes\Taxonomies\ExampleCategory;

/**
 * Register Post Types and Taxonomies
 */
class ContentTypesServiceProvider implements ServiceProviderInterface {

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
		add_action( 'init', [ &$this, 'registerPostTypes' ] );
		add_action( 'init', [ &$this, 'registerTaxonomies' ] );
		add_action( 'after_switch_theme', [ &$this, 'addCapabilities' ] );
		add_filter( 'enter_title_here', [ &$this, 'customizeEnterTitleText' ], 10, 2 );
	}

	/**
	 * Register project custom post types.
	 *
	 * @return void
	 */
	public function registerPostTypes() {
		ExamplePostType::getInstance()->registerPostType();
	}

	/**
	 * Register project custom taxonomies
	 *
	 * @return void
	 */
	public function registerTaxonomies() {
		ExampleCategory::getInstance()->registerTaxonomy();
	}

	/**
	 * Add the capabilities for each custom post type created. Uses the CPT Controllers to define specific capabilites
	 *
	 * @return void
	 */
	public function addCapabilities() {
		ExamplePostType::getInstance()->addCustomCapabilities();

		ExampleCategory::getInstance()->addCustomCapabilities();
	}

	/**
	 * Customize the placeholder for the 'Add title' field on add new post screen.
	 *
	 * This uses 'enter_title_here' WordPress filter and runs in all post types, cause this,
	 * we did a smart code to use the CPT Controllers to define what is the correct text.
	 *
	 * @param string  $text the title text.
	 * @param WP_Post $post post object.
	 * @return string The text to display
	 */
	public function customizeEnterTitleText( $text, $post ) {
		$class = 'Fuerza\ContentTypes\PostTypes\\' . ucfirst( str_replace( 'fuerza-', '', $post->post_type ) ) . 'PostType';

		if ( ! class_exists( $class ) || ! method_exists( $class, 'getInstance' ) || ! method_exists( $class, 'get_enter_title_text' ) ) {
			return $text;
		}

		return $class::getInstance()->getEnterTitleText();
	}
}
