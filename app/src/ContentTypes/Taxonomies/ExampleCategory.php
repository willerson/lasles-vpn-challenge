<?php
namespace Fuerza\ContentTypes\Taxonomies;

use Fuerza\ContentTypes\PostTypes\ExamplePostType;

/**
 * Controller to Category Example taxonomy. Add here all logical to this taxonomy
 */
class ExampleCategory extends AbstractTaxonomy {

	/**
	 * Class construct, define here the protected attributes from AbstractTaxonomyController class
	 */
	public function __construct() {
		$this->slug       = 'Fuerza-category-example';
		$this->singular   = __( 'Category Example', 'Fuerza' );
		$this->plural     = __( 'Categories Example', 'Fuerza' );
		$this->post_types = [ ExamplePostType::getInstance()->getSlug() ];
	}

	/**
	 * Regsiter the taxonomy. If necessary, customize the $args to parent method
	 *
	 * @param array $args register_taxonomy arguments.
	 * @return void
	 */
	public function registerTaxonomy( $args = [] ) {
		$defaults = [];

		$args = wp_parse_args( $args, $defaults );

		parent::registerTaxonomy( $args );
	}
}
