<?php
namespace Fuerza\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register components.
 *
 * This is a class that prepare context for all components view. Each
 * component located at `views/components` can have a PHP Class to control
 * what's happens when they are included.
 */
class ComponentsServiceProvider implements ServiceProviderInterface {

	/**
	 * Components directory.
	 * Path where components are stored.
	 *
	 * @var string
	 */
	protected $components_directory = 'views/components';

	/**
	 * Files.
	 * Components files.
	 *
	 * @var array
	 */
	protected $components_files = [];

	/**
	 * Register function
	 *
	 * @param \Pimple\Container $container container to register.
	 * @return void
	 */
	public function register( $container ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		$this->components_files = $this->getComponentsFiles();
	}

	/**
	 * Bootstrap function
	 *
	 * @param \Pimple\Container $container container to register.
	 * @return void
	 */
	public function bootstrap( $container ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
		add_action( 'acf/init', [ &$this, 'registerComposers' ] );
	}

	/**
	 * Register view composers.
	 *
	 * @return void
	 */
	public function registerComposers() {

		/**
		 * View composers
		 *
		 * @link https://docs.wpemerge.com/#/framework/views/view-composers
		 */
		foreach ( $this->components_files as $component_file ) {
			$this->registerComposer( $component_file );
		}
	}

	/**
	 * Register view composer.
	 *
	 * @param array $component_file - The file.
	 * @return void
	 */
	public function registerComposer( $component_file ) {
		$path = $this->components_directory . '/' . $component_file['slug'];

		\Fuerza::views()->addComposer(
			$path,
			function( $view ) use ( $component_file ) {
				$fields_context  = fuerza_fields_defaults( $this->getComponentFields( $component_file ) );
				$view_context    = $view->getContext();
				$css_context     = [ 'class' => $this->getCssClass( $component_file, $view_context ) ];
				$default_context = array_merge(
					$fields_context,
					$view_context,
					$css_context,
				);

				$additional_context = $this->getComponentContext( $component_file, $default_context );

				$view->with(
					array_merge(
						$default_context,
						$additional_context,
					)
				);
			}
		);
	}

	/**
	 * Get CSS class.
	 * Get CSS class based on the component file.
	 *
	 * @param array $component_file - The component file.
	 * @param array $view_context - The view context.
	 * @return array
	 */
	public function getCssClass( $component_file, $view_context ) {
		$css_class    = 'c-' . $component_file['slug'];
		$custom_class = $view_context['class'] ?? '';

		return classNames( [ $custom_class, $css_class ] );
	}

	/**
	 * Component Fields.
	 *
	 * @param array $component_file - The component file.
	 * @return array
	 */
	public function getComponentFields( $component_file ) {
		if ( ! function_exists( 'acf_get_fields' ) ) {
			return [];
		}

		$group = $this->getComponentGroup( $component_file );

		if ( ! $group ) {
			return [];
		}

		return acf_get_fields( $group );
	}

	/**
	 * Component Group Fiels.
	 *
	 * @param array $component_file - The component file.
	 * @return array
	 */
	public function getComponentGroup( $component_file ) {
		if ( isset( $component_file['headers']['key'] ) ) {
			return $component_file['headers']['key'];
		}

		$slug_humanized = fuerza_kebab_to_human_capitalized( $component_file['slug'] );
		$title          = $component_file['headers']['title'] ?? $slug_humanized;
		$group_title    = 'Component: ' . $title;

		return fuerza_field_group_by_title( $group_title, false );
	}

	/**
	 * Get component context.
	 *
	 * @param array $file - The component file.
	 * @param array $default_context - The default context.
	 * @return array
	 */
	public function getComponentContext( $file, $default_context ) {
		$composer_class = '\\Fuerza\\Components\\' . fuerza_kebab_to_pascal( $file['slug'] ) . 'Component';

		if ( ! class_exists( $composer_class ) ) {
			return [];
		}

		$composer = new $composer_class( $file, $default_context );

		return array_merge(
			$composer->getContext( $file, $default_context ),
			[ 'composer' => $composer ]
		);
	}

	/**
	 * Get components files.
	 * Get all components files.
	 *
	 * @return array
	 */
	protected function getComponentsFiles() {
		$components_directory = get_stylesheet_directory() . '/' . $this->components_directory;

		if ( ! is_dir( $components_directory ) ) {
			return [];
		}

		$components_files     = [];
		$components_directory = new \DirectoryIterator( locate_template( $this->components_directory ) );

		foreach ( $components_directory as $file ) {
			if ( $file->isDot() ) {
				continue;
			}

			$components_files[] = $this->getComponentFile( $file );
		}

		return $components_files;
	}

	/**
	 * Get component file.
	 *
	 * @param mixed $file_info fileinfo.
	 * @return array
	 */
	protected function getComponentFile( $file_info ) {
		$filename = $file_info->getFilename();
		$slug     = str_replace( '.php', '', $file_info->getFilename() );
		$path     = $file_info->getPathName();
		$headers  = array_filter(
			get_file_data(
				$path,
				[
					'key'   => 'Key',
					'title' => 'Title',
				]
			)
		);

		return [
			'filename' => $filename,
			'headers'  => $headers,
			'path'     => $path,
			'slug'     => $slug,
		];
	}
}
