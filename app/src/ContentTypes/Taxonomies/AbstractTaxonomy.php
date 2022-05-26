<?php
namespace Fuerza\ContentTypes\Taxonomies;

/**
 * Abstract class to implement default logic in Taxonomies
 *
 * Uses Singleton pattern to instantiate the inherited classes.
 */
class AbstractTaxonomy {

	/**
	 * Singleton instance
	 *
	 * @var array
	 */
	private static $instances = [];

	/**
	 * Taxonomy slug. Used in register_taxonomy
	 *
	 * @var string
	 */
	protected $slug;

	/**
	 * Custom Post Types to the taxonomy. Used in register_taxonomy
	 *
	 * @var string|array
	 */
	protected $post_types;

	/**
	 * Taxonomy Singular Name. Used in Labels of register_taxonomy
	 *
	 * @var string
	 */
	protected $singular;

	/**
	 * Taxonomy Plural Name. Used in Labels of register_taxonomy
	 *
	 * @var string
	 */
	protected $plural;

	/**
	 * Class construct. Do nothing here
	 */
	public function __construct() {}

	/**
	 * Singleton get unique instance
	 *
	 * @return object A inherited class object
	 */
	final public static function getInstance() {
		self::$instances[ static::class ] = self::$instances[ static::class ] ?? new static();

		return self::$instances[ static::class ];
	}

	/**
	 * Register taxonomy with default options.
	 *
	 * Use the $args to customize the default options in inherited classes
	 *
	 * @param array $args register_taxonomy arguments.
	 * @return void
	 */
	public function registerTaxonomy( $args = [] ) {
		$defaults = [
			'labels'            => $this->getTaxonomyLabels(),
			'public'            => true,
			'show_ui'           => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'capabilities'      => fuerza_get_all_taxonomy_capabilities_mapped( strtolower( $this->slug . 's' ) ),
		];

		$args = wp_parse_args( $args, $defaults );

		register_taxonomy( $this->slug, $this->post_types, $args );
	}

	/**
	 * Add taxonomy capabilities to Administrator and Editor WordPress roles
	 *
	 * @return void
	 */
	public function addCustomCapabilities() {
		fuerza_add_capabilities_to_role( 'administrator', fuerza_get_all_taxonomy_capabilities_mapped( strtolower( $this->slug . 's' ) ) );
		fuerza_add_capabilities_to_role( 'editor', fuerza_get_all_taxonomy_capabilities_mapped( strtolower( $this->slug . 's' ) ) );
	}

	/**
	 * Returns the taxonomy slug
	 *
	 * @return string
	 */
	public function getSlug() {
		return $this->slug;
	}

	/**
	 * Returns the taxonomy plural name
	 *
	 * @return string
	 */
	public function getPluralName() {
		return $this->plural;
	}

	/**
	 * Get the labels customized for the Taxonomy
	 *
	 * @return array
	 */
	private function getTaxonomyLabels() {
		return [
			'name'                       => $this->plural,
			'singular_name'              => $this->singular,
			/* translators: %s: taxonomy plural name */
			'search_items'               => sprintf( __( 'Search %s', 'Fuerza' ), $this->plural ),
			/* translators: %s: taxonomy plural name */
			'popular_items'              => sprintf( __( 'Popular %s', 'Fuerza' ), $this->plural ),
			/* translators: %s: taxonomy singular name */
			'all_items'                  => sprintf( __( 'All %s', 'Fuerza' ), $this->plural ),
			/* translators: %s: taxonomy singular name */
			'parent_item'                => sprintf( __( 'Parent %s', 'Fuerza' ), $this->singular ),
			/* translators: %s: taxonomy singular name */
			'parent_item_colon'          => sprintf( __( 'Parent: %s', 'Fuerza' ), $this->singular ),
			/* translators: %s: taxonomy singular name */
			'edit_item'                  => sprintf( __( 'Edit %s', 'Fuerza' ), $this->singular ),
			/* translators: %s: taxonomy singular name */
			'view_item'                  => sprintf( __( 'View %s', 'Fuerza' ), $this->singular ),
			/* translators: %s: taxonomy singular name */
			'update_item'                => sprintf( __( 'Update %s', 'Fuerza' ), $this->singular ),
			/* translators: %s: taxonomy singular name */
			'add_new_item'               => sprintf( __( 'Add New %s', 'Fuerza' ), $this->singular ),
			/* translators: %s: taxonomy singular name */
			'new_item_name'              => sprintf( __( 'New %s Name', 'Fuerza' ), $this->singular ),
			/* translators: %s: taxonomy plural name */
			'separate_items_with_commas' => sprintf( __( 'Separate %s with commas', 'Fuerza' ), $this->plural ),
			/* translators: %s: taxonomy plural name */
			'add_or_remove_items'        => sprintf( __( 'Add or remove %s', 'Fuerza' ), $this->plural ),
			/* translators: %s: taxonomy plural name */
			'choose_from_most_used'      => sprintf( __( 'Choose from the most used %s', 'Fuerza' ), $this->plural ),
			/* translators: %s: taxonomy plural name */
			'not_found'                  => sprintf( __( 'No %s found', 'Fuerza' ), $this->plural ),
			/* translators: %s: taxonomy plural name */
			'no_terms'                   => sprintf( __( 'No %s', 'Fuerza' ), $this->plural ),
			/* translators: %s: taxonomy singular name */
			'filter_by_item'             => sprintf( __( 'Filter by %s', 'Fuerza' ), $this->singular ),
			/* translators: %s: taxonomy plural name */
			'items_list_navigation'      => sprintf( __( '%s list navigation', 'Fuerza' ), $this->plural ),
			/* translators: %s: taxonomy plural name */
			'items_list'                 => sprintf( __( '%s list', 'Fuerza' ), $this->plural ),
			/* translators: %s: taxonomy plural name */
			'most_used'                  => sprintf( __( 'Most Used %s', 'Fuerza' ), $this->plural ),
			/* translators: %s: taxonomy plural name */
			'back_to_items'              => sprintf( __( 'Back to %s', 'Fuerza' ), $this->plural ),
			/* translators: %s: taxonomy singular name */
			'item_link'                  => sprintf( __( '%s Link', 'Fuerza' ), $this->singular ),
			/* translators: %s: taxonomy singular name */
			'item_link_description'      => sprintf( __( 'A link to a %s', 'Fuerza' ), $this->singular ),
		];
	}
}
