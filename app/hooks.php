<?php
/**
 * Declare any actions and filters here.
 * In most cases you should use a service provider, but in cases where you
 * just need to add an action/filter and forget about it you can add it here.
 *
 * @package Fuerza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hooks.
 * This hooks makes part of the Fuerza Studio starter theme.
 *
 * @package Fuerza
 */
add_filter( 'acf/settings/show_admin', 'fuerza_show_acf_admin' );
add_filter( 'fuerza_option_pages', 'fuerza_add_option_pages' );
add_filter( 'body_class', 'fuerza_cleanup_body_classes' );
add_filter( 'acf/fields/wysiwyg/toolbars', 'fuerza_add_acf_wysiwyg_toolbars' );
add_filter( 'acf/get_post_types', 'fuerza_filter_acf_get_post_types', 10, 1 );
add_filter( 'acf/load_field/key=field_627ad049df7e7', 'fuerza_load_acf_social_media' );

add_action( 'admin_menu', 'fuerza_add_reusable_block_menu' );
add_action( 'acf/update_value/type=wysiwyg', 'fuerza_filter_acf_wysiwyg_field_on_update', 10, 3 );

/**
 * Any other actions and filters can be defined here.
 */
