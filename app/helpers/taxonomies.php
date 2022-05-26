<?php
/**
 * Helper functions related to WordPress taxonomies
 *
 * @package Fuerza
 */

/**
 * Retrieve all custom taxonomy capabilities
 *
 * @param string $taxonomy Taxonomy name.
 * @return array
 */
function fuerza_get_all_taxonomy_capabilities_mapped( $taxonomy ) {
	return [
		'manage_terms' => "manage_$taxonomy",
		'edit_terms'   => "edit_$taxonomy",
		'delete_terms' => "delete_$taxonomy",
		'assign_terms' => "assign_$taxonomy",
	];
}
