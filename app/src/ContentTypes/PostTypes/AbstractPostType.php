<?php
namespace Fuerza\ContentTypes\PostTypes;

/**
 * Abstract class to implement default logic in Custom Post Types.
 *
 * Uses Singleton pattern to instantiate the inherited classes.
 */
class AbstractPostType {

	/**
	 * Singleton instance
	 *
	 * @var array
	 */
	private static $instances = [];

	/**
	 * CPT slug. Used in register_post_type
	 *
	 * @var string
	 */
	protected $slug;

	/**
	 * CPT Singular Name. Used in Labels of register_post_type
	 *
	 * @var string
	 */
	protected $singular;

	/**
	 * CPT Plural Name. Used in Labels of register_post_type
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
	 * Register post type with default options.
	 *
	 * Use the $args to customize the default options in inherited classes
	 *
	 * @param array $args register_post_type arguments.
	 * @return void
	 */
	public function registerPostType( $args = [] ) {
		$defaults = [
			'labels'          => $this->getPostTypeLabels(),
			'public'          => true,
			'show_in_menu'    => true,
			'hierarchical'    => false,
			'supports'        => [ 'title', 'editor', 'excerpt', 'thumbnail' ],
			'capability_type' => [ strtolower( $this->slug ), strtolower( $this->slug . 's' ) ],
			'has_archive'     => true,
			'show_in_rest'    => true,
		];

		$args = wp_parse_args( $args, $defaults );

		register_post_type( $this->slug, $args );
	}

	/**
	 * Add post type custom capabilities to Administrator and Editor WordPress roles
	 *
	 * @return void
	 */
	public function addCustomCapabilities() {
		fuerza_add_capabilities_to_role( 'administrator', fuerza_get_all_post_type_capabilities_mapped( strtolower( $this->slug ), strtolower( $this->slug . 's' ) ) );
		fuerza_add_capabilities_to_role( 'editor', fuerza_get_all_post_type_capabilities_mapped( strtolower( $this->slug ), strtolower( $this->slug . 's' ) ) );
	}

	/**
	 * Customize the enter title field for a custom post type
	 *
	 * @return string
	 */
	public function getEnterTitleText() {
		/* translators: %s: post type singular name */
		return sprintf( __( 'Add %s title', 'Fuerza' ), $this->singular );
	}

	/**
	 * Returns the post_type slug
	 *
	 * @return string
	 */
	public function getSlug() {
		return $this->slug;
	}

	/**
	 * Returns the post_type plural name
	 *
	 * @return string
	 */
	public function getPluralName() {
		return $this->plural;
	}

	/**
	 * Get the labels customized for the custom post type
	 *
	 * @return array
	 */
	private function getPostTypeLabels() {
		return [
			'name'                     => $this->plural,
			'singular_name'            => $this->singular,
			'add_new'                  => __( 'Add New', 'Fuerza' ),
			/* translators: %s: post type singular name */
			'add_new_item'             => sprintf( __( 'Add new %s', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'edit_item'                => sprintf( __( 'Edit %s', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'new_item'                 => sprintf( __( 'New %s', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'view_item'                => sprintf( __( 'View %s', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type plural name */
			'view_items'               => sprintf( __( 'View %s', 'Fuerza' ), $this->plural ),
			/* translators: %s: post type plural name */
			'search_items'             => sprintf( __( 'Search %s', 'Fuerza' ), $this->plural ),
			/* translators: %s: post type plural name */
			'not_found'                => sprintf( __( 'No %s found', 'Fuerza' ), $this->plural ),
			/* translators: %s: post type plural name */
			'not_found_in_trash'       => sprintf( __( 'No %s found in Trash', 'Fuerza' ), $this->plural ),
			/* translators: %s: post type singular name */
			'parent_item_colon'        => sprintf( __( 'Parent %s', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type plural name */
			'all_items'                => sprintf( __( 'All %s', 'Fuerza' ), $this->plural ),
			/* translators: %s: post type singular name */
			'archives'                 => sprintf( __( '%s Archives', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'attributes'               => sprintf( __( '%s Attributes', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'insert_into_item'         => sprintf( __( 'Insert into %s', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'uploaded_to_this_item'    => sprintf( __( 'Uploaded to this %s', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'featured_image'           => sprintf( __( '%s featured image', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'set_featured_image'       => sprintf( __( 'Set %s featured image', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'remove_featured_image'    => sprintf( __( 'Remove %s featured image', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'use_featured_image'       => sprintf( __( 'Use as %s featured image', 'Fuerza' ), $this->singular ),
			'menu_name'                => $this->plural,
			/* translators: %s: post type plural name */
			'filter_items_list'        => sprintf( __( 'Filter %s list', 'Fuerza' ), $this->plural ),
			/* translators: %s: post type plural name */
			'filter_by_date'           => sprintf( __( 'Filter %s by date', 'Fuerza' ), $this->plural ),
			/* translators: %s: post type plural name */
			'items_list_navigation'    => sprintf( __( '%s list navigation', 'Fuerza' ), $this->plural ),
			/* translators: %s: post type plural name */
			'items_list'               => sprintf( __( '%s list', 'Fuerza' ), $this->plural ),
			/* translators: %s: post type singular name */
			'item_published'           => sprintf( __( '%s published', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'item_published_privately' => sprintf( __( '%s published privately', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'item_reverted_to_draft'   => sprintf( __( '%s reverted to draft', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'item_scheduled'           => sprintf( __( '%s scheduled', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'item_updated'             => sprintf( __( '%s updated', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'item_link'                => sprintf( __( '%s link', 'Fuerza' ), $this->singular ),
			/* translators: %s: post type singular name */
			'item_link_description'    => sprintf( __( 'A link to a %s', 'Fuerza' ), $this->singular ),
		];
	}
}
