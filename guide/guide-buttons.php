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
			<ul class="c-btn-collection">
				<li class="c-btn-collection__item">
					<a href="#" class="c-btn c-btn--primary">Primary</a>
				</li>
				<li class="c-btn-collection__item">
					<a href="#" class="c-btn c-btn--primary-o">Primary</a>
				</li>
				<li class="c-btn-collection__item">
					<a href="#" class="c-btn c-btn--primary-o c-btn--disabled" disabled>Primary</a>
				</li>
			</ul>
		</div>
	</div>
</section>
