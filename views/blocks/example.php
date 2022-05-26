<?php
/**
 * Title: Example block
 * Description: WARNING: Don't use this block in your page content.
 * Keywords: example
 * Mode: auto
 *
 * This is a base template for creating a non-complex blocks.
 * Copy this template and rename it to your block name and make
 * changes as needed.
 *
 * @package Fuerza
 */

?>

<section <?php fuerza_block_attrs( $block ); ?>>
	<?php fuerza_component( 'background', $background ); ?>

	<div class="container">
		<?php fuerza_component( 'section-header', $section_header ); ?>
		<?php fuerza_component( 'button-collection', $button_collection + [ 'class' => 'b-example__buttons' ] ); ?>
		<?php fuerza_component( 'form', $form ); ?>
	</div>
</section>
