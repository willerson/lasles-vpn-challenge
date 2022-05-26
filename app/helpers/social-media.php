<?php
/**
 * Helper functions related to social media.
 *
 * @package Fuerza
 */

/**
 * Populates Social Media Custom Field (Select) with values/social defined in config.
 *
 * @param array $field custom fiield.
 * @return array
 */
function fuerza_load_acf_social_media( $field ) {
	$social_medias = \Fuerza::core()->config()->get( 'supports.social-media', [] );

	if ( is_array( $social_medias ) && ! empty( $social_medias ) ) {
		// Only customize the choices when not editing the group in ACF.
		if ( get_post_type() !== 'acf-field-group' ) {
			// Reset choices.
			$field['choices'] = [];

			// Loop through colors and add to field 'choices'.
			foreach ( $social_medias as $social ) {
				$field['choices'][ $social ] = fuerza_kebab_to_human_capitalized( $social );
			}
		}
	}

	return $field;
}
