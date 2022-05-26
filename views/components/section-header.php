<?php
/**
 * Displays the section header.
 *
 * @package Fuerza
 */

// phpcs:ignore
$title    = fuerza_strip_simple_wysiwyg_field( $title );
$subtitle = fuerza_strip_simple_wysiwyg_field( $subtitle );
?>

<header class="c-section-header">
	<h2 class="c-section-header__title c-title">
		<?php echo wp_kses_post( $title ); ?>
	</h2>
	<h3 class="c-section-header__sub-title c-title">
		<?php echo wp_kses_post( $subtitle ); ?>
	</h3>

	<div class="c-section-header__text c-text">
		<?php echo wp_kses_post( $text ); ?>
	</div>
</header>
