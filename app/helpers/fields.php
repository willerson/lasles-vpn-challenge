<?php
/**
 * Helper functions for custom fields.
 *
 * @package Fuerza
 */

/**
 * Determine if the ACF admin page should be shown.
 *
 * @return boolean
 */
function fuerza_show_acf_admin() {
	$local_domains = [ '.local', '.test' ];

	return ! empty(
		array_filter(
			$local_domains,
			function( $local_domain ) {
				return substr( get_bloginfo( 'url' ), -1 * strlen( $local_domain ) ) === $local_domain;
			}
		)
	);
}

/**
 * A wrapper around get_field for easier processing of Blade components.
 * Returns empty array if field is not defined.
 *
 * @see https://www.advancedcustomfields.com/resources/get_field/
 *
 * @param string $selector The field name or field key.
 * @param mixed  $post_id The post ID where the value is saved. Defaults to the current post.
 * @param bool   $format_value Whether to apply formatting logic. Defaults to true.
 * @return mixed
 */
function fuerza_field( $selector, $post_id = 0, $format_value = true ) {
	if ( ! function_exists( 'get_field' ) ) {
		return [];
	}
	$field = get_field( $selector, $post_id, $format_value );

	return null !== $field ? $field : [];
}

/**
 * A wrapper around fuerza_field that can return multiple fields at once.
 * Returns empty array if selectors are not defined or no fields are found.
 *
 * @param array $selectors Array of field names or field keys.
 * @return array
 */
function fuerza_fields( array $selectors ) : array {
	if ( is_null( $selectors ) ) {
		return [];
	}

	// Setup empty return value.
	$fields = [];

	// Get all keys from selectors.
	$keys = array_keys( $selectors );

	// Loop through keys.
	foreach ( $keys as $key ) {
		// If key is a string, use both the key and value.
		if ( is_string( $key ) ) {
			$fields[ $key ] = fuerza_field( $key, $selectors[ $key ] );
		} else { // Else, use only the value.
			$fields[ $selectors[ $key ] ] = fuerza_field( $selectors[ $key ] );
		}
	}

	return $fields;
}

/**
 * Returns $value if it is set, otherwise returns $default.
 *
 * @param mixed $value Value.
 * @param mixed $default Default value.
 * @return mixed
 */
function fuerza_value_or_default( &$value, $default = false ) {
	return isset( $value ) ? $value : $default;
}

/**
 * Returns $value if it is set, otherwise returns acf field.
 *
 * @param mixed  $value Value.
 * @param string $selector The field name or field key.
 * @param mixed  $post_id The post ID where the value is saved. Defaults to the current post.
 * @param bool   $format_value Whether to apply formatting logic. Defaults to true.
 * @return mixed
 */
function fuerza_value_or_field( &$value, $selector, $post_id = 0, $format_value = true ) {
	return isset( $value ) ? $value : fuerza_field( $selector, $post_id, $format_value );
}

/**
 * A wrapper for fuerza_value_or_default that checks if multiple values are set.
 *
 * @param array $default_values Values to check.
 * @param array $defined_vars   List of already defined variables.
 * @return array
 */
function fuerza_defaults( array $default_values, array $defined_vars ) : array {
	// If the default values array or defined variables array is null, return an empty array.
	if ( is_null( $default_values ) || is_null( $defined_vars ) ) {
		return [];
	}

	// Create empty array that will be returned.
	$return_values = [];

	// Loop through array of default values.
	foreach ( $default_values as $key => $value ) {
		if ( ! is_string( $key ) && ! is_string( $value ) ) {
			// Skip when we don't have a valid variable name.
			continue;
		}
		// Whether we have the variable name in the key.
		$is_key_var_name = is_string( $key );

		// If the key is a string, use the default key for the returned key. Otherwise, use the value for the returned key.
		$return_key = $is_key_var_name ? $key : $value;

		// Assign default return value.
		$return_value = false;

		// If the value is a function, invoke it!
		if ( $is_key_var_name && is_callable( $value ) ) {
			// Pass real value (if defined, otherwise pass false), pass all of the returned values up to this point, and pass all of the defined variables.
			$return_value = call_user_func_array(
				$value,
				[
					$defined_vars[ $return_key ] ?? false,
					$return_values,
					$defined_vars,
				]
			);
		} elseif ( isset( $defined_vars[ $return_key ] ) ) { // Else, if the needed variable exists in the scope, return that.
			$return_value = $defined_vars[ $return_key ];
		} elseif ( $is_key_var_name ) { // Else, the variable is not defined; return the default value.
			$return_value = $value;
		}

		// Add key and value to the return array.
		$return_values[ $return_key ] = $return_value;
	}

	return $return_values;
}

/**
 * Find an ACF custom field group by title.
 * Note: This only works after ACF has been initiated.
 *
 * @param string $title Custom group title.
 * @param bool   $case_sensitive Whether to perform case-sensitive string comparison.
 * @return array|false
 */
function fuerza_field_group_by_title( string $title, bool $case_sensitive = true ) {
	if ( ! function_exists( 'acf_get_store' ) ) {
		return false;
	}
	$groups      = acf_get_field_groups();
	$str_compare = $case_sensitive ? 'strcmp' : 'strcasecmp';
	$result      = array_filter(
		$groups,
		function ( $group ) use ( $title, $str_compare ) {
			return 0 === call_user_func( $str_compare, $group['title'], $title );
		}
	);

	return reset( $result );
}

/**
 * Get the default values from an array of custom fields metadata.
 *
 * @param array $fields ACF custom fields information (e.g. result of calling acf_get_fields).
 * @return array
 */
function fuerza_fields_defaults( array $fields ) : array {
	$defaults = [];

	foreach ( $fields as $field ) {
		$name              = $field['name'];
		$value             = fuerza_field_default( $field );
		$defaults[ $name ] = $value;
	}

	return $defaults;
}

/**
 * Get the default value from the metadata of an ACF custom field.
 *
 * @param array $field Metadata about custom field.
 * @return array|string Default value if set on the field options, empty array or empty string otherwise.
 */
function fuerza_field_default( $field ) {
	if ( isset( $field['default_value'] ) ) {
		// Use default value when defined in the field properties.
		if ( is_array( $field['default_value'] ) ) {
			if ( isset( $field['return_format'] ) && 'value' === $field['return_format'] ) {
				// The field is set to return a single value,
				// but the default value is an array.
				if ( empty( $field['default_value'] ) ) {
					// Return empty string when the default value (array) is empty.
					return '';
				}

				// Return first value in array.
				return reset( $field['default_value'] );
			}
		}

		return $field['default_value'];
	}

	switch ( $field['type'] ) {
		case 'google_map':
		case 'group':
		case 'relationship':
		case 'repeater':
		case 'flexible_content':
			// These types should return arrays in all cases.
			return [];
		default:
			if ( isset( $field['multiple'] ) && $field['multiple'] ) {
				// Return empty array when field is set to multiple values.
				return [];
			}

			if ( isset( $field['return_format'] ) && 'array' === $field['return_format'] ) {
				// Return empty array when field return format is set to array.
				return [];
			}

			// Use empty string for all other cases.
			return '';
	}
}

/**
 * Workaround for ACF behavior for Select fields.
 * ACF tends to return an array when returning the default value for Select fields (Select fields that don't have any value saved),
 * even for Select fields that are not set to multiple values
 * and whose return format has been set to value instead of array.
 *
 * @param mixed $value Return value.
 * @param int   $post_id WP_Post id.
 * @param array $field Custom field metadata.
 * @return mixed
 */
function fuerza_coerce_array_to_value( $value, $post_id, $field ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
	if (
		isset( $field['return_format'] )
		&& 'value' === $field['return_format']
		&& ( ! isset( $field['multiple'] ) || ! $field['multiple'] )
		&& is_array( $value )
		&& array_key_exists( 0, $value )
	) {
		return $value[0];
	}

	return $value;
}

/**
 * Add Custom Toolbars for ACF WYSIWYG field.
 *
 * @param array $toolbars Toolbar args.
 * @return array
 */
function fuerza_add_acf_wysiwyg_toolbars( $toolbars ) {
	$toolbars['Very Simple']    = [];
	$toolbars['Very Simple'][1] = [ 'bold', 'italic', 'underline' ];

	return $toolbars;
}

/**
 * Strip ACF WYSIWYG field value to only allow allowed html tags.
 *
 * @param string $value Field Value.
 */
function fuerza_strip_simple_wysiwyg_field( $value ) {
	return strip_tags( $value, '<b><strong><i><em><br><u><span>' );
}

/**
 * Filter ACF WYSIWYG field value to only allow allowed html tags.
 *
 * @param string $value Field Value.
 * @param int    $post_id ID of the post.
 * @param array  $field ACF field array.
 */
function fuerza_filter_acf_wysiwyg_field_on_update( $value, $post_id, $field ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
	if ( 'very_simple' === $field['toolbar'] ) {
		$value = fuerza_strip_simple_wysiwyg_field( $value );
	}

	return $value;
}
