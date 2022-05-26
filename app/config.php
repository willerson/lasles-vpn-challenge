<?php
/**
 * WP Emerge configuration.
 *
 * @link https://docs.wpemerge.com/#/framework/configuration
 *
 * @package Fuerza
 */

return [
	/**
	 * Array of service providers you wish to enable.
	 */
	'providers'           => [
		/**
		 * WPEmerge related service providers.
		 */
		\WPEmergeAppCore\AppCore\AppCoreServiceProvider::class,
		\WPEmergeAppCore\Assets\AssetsServiceProvider::class,
		\WPEmergeAppCore\Avatar\AvatarServiceProvider::class,
		\WPEmergeAppCore\Config\ConfigServiceProvider::class,
		\WPEmergeAppCore\Image\ImageServiceProvider::class,
		\WPEmergeAppCore\Sidebar\SidebarServiceProvider::class,

		/**
		 * Fuerza theme service providers.
		 */
		\Fuerza\Routing\RoutingServiceProvider::class,
		\Fuerza\Routing\RouteConditionsServiceProvider::class,
		\Fuerza\View\ViewServiceProvider::class,

		/**
		 * WordPress related service providers.
		 */
		\Fuerza\WordPress\AdminServiceProvider::class,
		\Fuerza\WordPress\AssetsServiceProvider::class,
		\Fuerza\WordPress\ContentTypesServiceProvider::class,
		\Fuerza\WordPress\LoginServiceProvider::class,
		\Fuerza\WordPress\MenusServiceProvider::class,
		\Fuerza\WordPress\ShortcodesServiceProvider::class,
		\Fuerza\WordPress\ThemeServiceProvider::class,
		\Fuerza\WordPress\WidgetsServiceProvider::class,
		\Fuerza\WordPress\CF7ServiceProvider::class,
		\Fuerza\WordPress\OptionsServiceProvider::class,
		\Fuerza\WordPress\ComponentsServiceProvider::class,
		\Fuerza\WordPress\BlocksServiceProvider::class,

		/**
		 * Any other service provider.
		 */
		\Fuerza\ServiceProviders\GoogleTagManagerServiceProvider::class,
	],

	/**
	 * Array of route group definitions and default attributes.
	 * All of these are optional so if we are not using
	 * a certain group of routes we can skip it.
	 * If we are not using routing at all we can skip
	 * the entire 'routes' option.
	 */
	'routes'              => [
		'web'   => [
			'definitions' => __DIR__ . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'web.php',
			'attributes'  => [
				'namespace' => 'Fuerza\\Controllers\\Web\\',
			],
		],
		'admin' => [
			'definitions' => __DIR__ . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'admin.php',
			'attributes'  => [
				'namespace' => 'Fuerza\\Controllers\\Admin\\',
			],
		],
		'ajax'  => [
			'definitions' => __DIR__ . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'ajax.php',
			'attributes'  => [
				'namespace' => 'Fuerza\\Controllers\\Ajax\\',
			],
		],
	],

	/**
	 * View Composers settings.
	 */
	'view_composers'      => [
		'namespace' => 'Fuerza\\ViewComposers\\',
	],

	/**
	 * Register middleware class aliases.
	 * Use fully qualified middleware class names.
	 *
	 * Internal aliases that you should avoid overriding:
	 * - 'flash'
	 * - 'old_input'
	 * - 'csrf'
	 * - 'user.logged_in'
	 * - 'user.logged_out'
	 * - 'user.can'
	 */
	'middleware'          => [
		// phpcs:ignore
		// 'mymiddleware' => \Fuerza\Middleware\MyMiddleware::class,
	],

	/**
	 * Register middleware groups.
	 * Use fully qualified middleware class names or registered aliases.
	 * There are a couple built-in groups that you may override:
	 * - 'web'      - Automatically applied to web routes.
	 * - 'admin'    - Automatically applied to admin routes.
	 * - 'ajax'     - Automatically applied to ajax routes.
	 * - 'global'   - Automatically applied to all of the above.
	 * - 'wpemerge' - Internal group applied the same way 'global' is.
	 *
	 * Warning: The 'wpemerge' group contains some internal WP Emerge
	 * middleware which you should avoid overriding.
	 */
	'middleware_groups'   => [
		'global' => [],
		'web'    => [],
		'ajax'   => [],
		'admin'  => [],
	],

	/**
	 * Optionally specify middleware execution order.
	 * Use fully qualified middleware class names.
	 */
	'middleware_priority' => [
		// phpcs:ignore
		// \Fuerza\Middleware\MyMiddlewareThatShouldRunFirst::class,
		// \Fuerza\Middleware\MyMiddlewareThatShouldRunSecond::class,
	],

	/**
	 * Custom directories to search for views.
	 * Use absolute paths or leave blank to disable.
	 * Applies only to the default PhpViewEngine.
	 */
	'views'               => [ get_stylesheet_directory(), get_template_directory() ],

	/**
	 * App Core configuration.
	 */
	'app_core'            => [
		'path' => dirname( __DIR__ ),
		'url'  => get_template_directory_uri(),
	],

	/**
	 * Other config goes after this comment.
	 */

	/**
	 * Debug settings.
	 */
	'debug'               => [
		// Enable the use of filp/whoops for an enhanced error interface. Defaults to true.
		'pretty_errors' => false,
	],
];
