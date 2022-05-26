<?php
/**
 * Displays a form.
 *
 * @package Fuerza
 */

if ( empty( $form ) ) {
	return;
}

echo do_shortcode( "[contact-form-7 id=\"$form\" ]" );
