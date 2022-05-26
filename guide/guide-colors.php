<?php
/**
 * Displays the color palette.
 *
 * @package Fuerza
 */

?>

<section id="<?php echo esc_html( 'guide-' . $id ); ?>" class="g-section">
	<div class="g-container container">
		<h2 class="g-section__title">
			<span>Colors</span>
		</h2>

		<div class="g-section__body">
			<div class="g-colors">
				<?php foreach ( \Fuerza::core()->config()->get( 'variables.color' ) as $color => $value ) : ?>
					<div class="g-color">
						<div class="g-color__preview <?php echo esc_attr( "has-$color-background-color" ); ?>"></div>
						<div class="g-color__body">
							<p class="g-color__name">
								<?php echo esc_attr( $color ); ?>
							</p>
							<p class="g-color__code">
								<?php echo esc_attr( $value ); ?>
							</p>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</section>
