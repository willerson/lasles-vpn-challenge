<?php
/**
 * Helper functions related to WordPress posts
 *
 * @package Fuerza
 */

/**
 * Retrieves all custom post type capabilites
 *
 * @param string $singular Singular text.
 * @param string $plural Plurar text.
 * @return array
 */
function fuerza_get_all_post_type_capabilities_mapped( $singular, $plural ) {
	return [
		'edit_post'              => "edit_$singular",
		'read_post'              => "read_$singular",
		'delete_post'            => "delete_$singular",
		'edit_posts'             => "edit_$plural",
		'edit_others_posts'      => "edit_others_$plural",
		'publish_posts'          => "publish_$plural",
		'read_private_posts'     => "read_private_$plural",
		'read'                   => 'read',
		'delete_posts'           => "delete_$plural",
		'delete_private_posts'   => "delete_private_$plural",
		'delete_published_posts' => "delete_published_$plural",
		'delete_others_posts'    => "delete_others_$plural",
		'edit_private_posts'     => "edit_private_$plural",
		'edit_published_posts'   => "edit_published_$plural",
		'create_posts'           => "edit_$plural",
	];
}
