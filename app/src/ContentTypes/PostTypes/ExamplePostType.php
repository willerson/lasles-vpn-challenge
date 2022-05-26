<?php
namespace Fuerza\ContentTypes\PostTypes;

/**
 * Controller to CPT Example. Add here all logical to this post type
 */
class ExamplePostType extends AbstractPostType {

	/**
	 * Class construct. Setup slug, singular and plural name for this CPT
	 */
	public function __construct() {
		$this->slug     = 'Fuerza-example';
		$this->singular = __( 'Example', 'Fuerza' );
		$this->plural   = __( 'Examples', 'Fuerza' );
	}

	/**
	 * Customize the register_post_type() params to register the post_type
	 *
	 * @param array $args You can customize args to register_post_type.
	 * @return void
	 */
	public function registerPostType( $args = [] ) {
		$defaults = [
			'menu_position' => 5,
			'menu_icon'     => 'dashicons-admin-post',
		];

		$args = wp_parse_args( $args, $defaults );

		parent::registerPostType( $args );
	}
}
