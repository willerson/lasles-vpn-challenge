<?php
/**
 * Displays a background.
 *
 * @package Fuerza
 */

if ( ! $has_background ) {
	return;
}

?>

<div class="<?php echo esc_attr( $class ); ?>">
	<div <?php echo fuerza_attributes( $background_attrs ); ?> ></div>
</div>
