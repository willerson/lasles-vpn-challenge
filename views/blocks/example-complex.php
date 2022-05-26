<?php
/**
 * Title: Example complex block
 * Description: WARNING: Don't use this block in your page content.
 * Keywords: example, complex
 * Mode: auto
 *
 * This is a base template for creating complex blocks.
 * Copy this template and rename it to your block name and make
 * changes as needed.
 *
 * @package Fuerza
 */

?>

<section <?php fuerza_block_attrs( $block ); ?>>
	<?php fuerza_component( 'background', $background ); ?>

	<div class="container">
		<div class="b-example-complex__head">
			<?php fuerza_component( 'section-header', $section_header ); ?>
		</div>
		<div class="b-example-complex__body">
			<div class="b-example-complex__items">
				<?php foreach ( $items as $item ) : ?>
				<div class="b-example-complex__item">
					<!-- Item goes here. -->
				</div>
				<?php endforeach; ?>
			</div>
		</div>

		<?php if ( $show_buttons ) : ?>
		<div class="b-example-complex__footer">
			<?php fuerza_component( 'button-collection', $button_collection + [ 'class' => 'b-example-complex__buttons' ] ); ?>
		</div>
		<?php endif; ?>
	</div>
</section>
