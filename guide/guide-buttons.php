<?php
/**
 * Displays the buttons.
 *
 * @package Fuerza
 */

?>

<section id="<?php echo esc_html( 'guide-' . $id ); ?>" class="g-section">
	<div class="g-container container">
		<h2 class="g-section__title">
			<span>Buttons</span>
		</h2>

		<div class="g-section__body">
			<a href="#" class="c-btn c-btn--primary c-btn--lg">Primary</a>
			<a href="#" class="c-btn c-btn--primary c-btn--lg c-btn--disabled">Primary</a>
			<a href="#" class="c-btn c-btn--primary-o c-btn--md">Primary</a>
			<a href="#" class="c-btn c-btn--primary-o c-btn--md c-btn--disabled" disabled>Primary</a>
			<a href="#" class="c-btn c-btn--primary-o c-btn--rounded">
				<svg class="c-icon">
					<use xlink:href="#arrow-left" />
				</svg>
			</a>
			<a href="#" class="c-btn c-btn--primary c-btn--rounded">
				<svg class="c-icon">
					<use xlink:href="#arrow-right" />
				</svg>
			</a>
		</div>
	</div>
</section>
