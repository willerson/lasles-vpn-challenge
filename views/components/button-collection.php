<?php
/**
 * Displays the Button Collection.
 *
 * @package Fuerza
 */

if ( empty( $buttons ) ) {
	return;
}
?>
<ul class="<?php echo esc_attr( 'c-btn-collection ' . $class ); ?>">
	<?php foreach ( $buttons as $button ) : ?>
	<li class="c-btn-collection__item">
		<?php fuerza_component( 'button', $button ); ?>
	</li>
	<?php endforeach; ?>
</ul>
