<?php
namespace Fuerza\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register blocks.
 *
 * Register Gutenberg Blocks automatically using the ACF.
 *
 * @package Fuerza.
 */
class BlocksServiceProvider implements ServiceProviderInterface {

	/**
	 * The blocks directory.
	 * By default we're looking to `views/blocks` directory.
	 *
	 * @var string
	 */
	protected $directory = 'views/blocks';

	/**
	 * The blocks category.
	 * Register a block category to wrap all blocks.
	 *
	 * @see https://developer.wordpress.org/reference/hooks/block_categories_all/
	 *
	 * @var string
	 */
	protected $category_slug = 'fuerza';

	/**
	 * Title for block category
	 *
	 * @var string
	 */
	protected $category_title = 'Fuerza';

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
	 * Class bootstrap
	 *
	 * @param \Pimple\Container $container container to register.
	 * @return void
	 */
	public function bootstrap( $container ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		add_filter( 'block_categories_all', [ &$this, 'registerCategories' ], 10, 2 );
		add_action( 'acf/init', [ &$this, 'registerBlocks' ] );
	}

	/**
	 * Register categories for blocks
	 *
	 * @param array $categories categories.
	 * @return array
	 */
	public function registerCategories( $categories ) {
		// Add our custom category as first on categories menu.
		return array_merge(
			[
				[
					'slug'  => $this->category_slug,
					'title' => $this->category_title,
				],
			],
			$categories
		);
	}

	/**
	 * Register the blocls
	 *
	 * @return void
	 */
	public function registerBlocks() {
		if ( ! function_exists( 'acf_register_block' ) ) {
			return;
		}

		$block_files = $this->getBlockFiles();

		foreach ( $block_files as $block_file ) {
			$default_settings = $this->getDefaultBlockSettings( $block_file['slug'] );
			$block_settings   = $this->getBlockSettings( $block_file );
			$final_settings   = array_merge(
				$default_settings,
				array_filter( $block_settings ) // array_filter removes empty strings.
			);

			acf_register_block( $final_settings );
		}
	}

	/**
	 * Get all block files
	 *
	 * @return array
	 */
	public function getBlockFiles() {
		// Set the directory blocks are stored in.
		$template_directory   = $this->directory;
		$stylesheet_directory = get_stylesheet_directory();
		$path                 = "$stylesheet_directory/$template_directory";

		// Bail if it's not a directory.
		if ( ! is_dir( $path ) ) {
			return [];
		}

		// Get templates directory iterator.
		$dir = new \DirectoryIterator( locate_template( $template_directory ) );

		// Loop through found templates and set up data.
		$files = [];

		foreach ( $dir as $file_info ) {
			if ( $file_info->isDot() ) {
				continue;
			}

			$files[] = $this->getBlockFile( $file_info );
		}

		return $files;
	}

	/**
	 * Get a single block file
	 *
	 * @param mixed $block_file block file.
	 * @return array
	 */
	public function getBlockFile( $block_file ) {
		$extension = '.php';
		// Create a slug based on file name.
		$slug = str_replace( $extension, '', $block_file->getFilename() );
		// Set the directory where the block are stored on.
		$template_directory = $this->directory;
		$file_path          = locate_template( "$template_directory/${slug}${extension}" );

		return [
			'slug'    => $slug,
			'headers' => get_file_data(
				$file_path,
				[
					'title'       => 'Title',
					'description' => 'Description',
					'category'    => 'Category',
					'icon'        => 'Icon',
					'keywords'    => 'Keywords',
					'mode'        => 'Mode',
					'post_types'  => 'PostTypes',
				]
			),
		];
	}

	/**
	 * Get default block settings
	 *
	 * @param string $block_slug block slug.
	 * @return array
	 */
	public function getDefaultBlockSettings( $block_slug ) {
		$title = ucfirst( str_replace( '-', ' ', $block_slug ) );

		return [
			'name'            => $block_slug,
			'title'           => $title,
			'description'     => $title . ' block',
			'icon'            => 'format-image',
			'category'        => $this->category_slug,
			'keywords'        => array_merge( [ $this->category_slug ], explode( '-', $block_slug ) ),
			'mode'            => 'auto',
			'render_callback' => [ &$this, 'renderBlock' ],
		];
	}

	/**
	 * Get block Settings
	 *
	 * @param array $block_file block file.
	 * @return array
	 */
	public function getBlockSettings( $block_file ) {
		$block_settings = [
			'name'            => $block_file['slug'],
			'title'           => $block_file['headers']['title'],
			'description'     => $block_file['headers']['description'],
			'category'        => $block_file['headers']['category'],
			'icon'            => $block_file['headers']['icon'],
			'keywords'        => $block_file['headers']['keywords'] ? explode( ' ', $block_file['headers']['keywords'] ) : '',
			'mode'            => $block_file['headers']['mode'],
			'render_callback' => [ &$this, 'renderBlock' ],
		];

		// If the PostTypes header is set in the template, restrict this block to those types.
		if ( ! empty( $block_file['headers']['post_types'] ) ) {
			$block_settings['post_types'] = explode( ' ', $block_file['headers']['post_types'] );
		}

		return $block_settings;
	}

	/**
	 * * The render block method.
	 *
	 * Set all block data and then render on the specified template file.
	 *
	 * @param mixed   $block block.
	 * @param string  $content content.
	 * @param boolean $is_preview is preview.
	 * @param integer $post_id post id.
	 * @return void
	 */
	public function renderBlock( $block, $content = '', $is_preview = false, $post_id = 0 ) {
		$block              = $this->getBlockDataForRendering( $block, $content, $is_preview, $post_id );
		$slug               = $block['slug'];
		$general_context    = [
			'block'      => $block,
			'content'    => $content,
			'is_preview' => $is_preview,
			'post_id'    => $post_id,
		];
		$fields_context     = function_exists( 'get_fields' ) ? ( get_fields() ?: [] ) : []; // phpcs:ignore
		$context            = array_merge( $general_context, $fields_context );
		$additional_context = $this->getBlockContext( $context );

		// Set the directory where the block are stored on.
		$template_directory = $this->directory . DIRECTORY_SEPARATOR . $slug;

		// Render block.
		\Fuerza::render(
			$template_directory,
			array_merge(
				$context,
				$additional_context
			)
		);
	}

	/**
	 * Get Block Data for rendering.
	 *
	 * @param array      $block The block settings and attributes.
	 * @param string     $content The block inner HTML (empty).
	 * @param bool       $is_preview True during AJAX preview.
	 * @param int|string $post_id The post ID this block is saved to.
	 *
	 * @return array $block - New data format to the render block.
	 */
	public function getBlockDataForRendering( $block, $content = '', $is_preview = false, $post_id = 0 ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		$page_slug       = get_post_field( 'post_name', $post_id );
		$slug            = str_replace( 'acf/', '', $block['name'] );
		$block_classes   = isset( $block['className'] ) ? $block['className'] : '';
		$default_classes = 'c-block';
		$alignment       = ! empty( $block['align'] ) ? 'align' . $block['align'] : '';

		// Set up block data.
		$block['slug']    = $slug;
		$block['classes'] = implode(
			' ',
			[
				$default_classes,
				'b-' . $slug,
				'b-' . $slug . '--page-' . $page_slug,
				$alignment,
			]
		);

		// Update block id.
		$block['id'] = $this->createBlockId( $block );

		return $block;
	}

	/**
	 * Create Block ID
	 *
	 * @param array $block block.
	 * @return string
	 */
	public function createBlockId( $block ) {
		$slug    = $block['slug'];
		$counter = 'block-id-index-' . $slug;

		if ( ! isset( $GLOBALS[ $counter ] ) || empty( $GLOBALS[ $counter ] ) ) {
			$GLOBALS[ $counter ] = 1;
		} else {
			$GLOBALS[ $counter ] += 1;
		}

		$index = $GLOBALS[ $counter ];

		return "$slug-$index";
	}

	/**
	 * Get Block Context
	 *
	 * @param array $context context.
	 * @return array
	 */
	public function getBlockContext( $context ) {
		$composer_class = '\\Fuerza\\Blocks\\' . fuerza_kebab_to_pascal( $context['block']['slug'] );

		if ( ! class_exists( $composer_class ) ) {
			return [];
		}

		$composer = new $composer_class( $context );

		return array_merge(
			$composer->getContext( $context ),
			[ 'composer' => $composer ]
		);
	}
}
