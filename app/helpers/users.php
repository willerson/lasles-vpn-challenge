<?php
/**
 * Helper functions related to WordPress users.
 *
 * @package Fuerza
 */

/**
 * Add custom capabilities to a role
 *
 * @param string       $role_name The name for the role.
 * @param string|array $capabilities The capabilities to attach to role.
 * @return void|bool
 */
function fuerza_add_capabilities_to_role( $role_name, $capabilities ) {
	if ( ! is_array( $capabilities ) ) {
		$role = get_role( $role_name );
		return $role->add_cap( $capabilities );
	}

	foreach ( $capabilities as $cap ) {
		fuerza_add_capabilities_to_role( $role_name, $cap );
	}
}
