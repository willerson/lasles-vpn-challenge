<?php
/**
 * Title: Testimonials
 * Description: Display a list of testimonials.
 * Keywords: fuerzastudio
 * mode: auto
 *
 * @package Fuerza
 */

?>

<section <?php fuerza_block_attrs( $block ); ?>>
	<div class="b-testimonials container">
		<header class="c-top-section">
			<h2>
				<?php echo wp_kses_post( $title ); ?>
			</h2>
			<p>
				<?php echo wp_kses_post( $description ); ?>
			</p>
		</header>
		<ul class="b-testimonials__items">
			<?php if ( ! empty( $items ) ) : ?>
				<?php foreach ( $items as $testimonial ) : ?>
				<li>
					<article class="c-testimonial c-testimonial--active">
						<header class="c-testimonial__header">
							<div class="c-testimonial__profile">
								<figure class="c-testimonial__figure">
									<?php echo wp_get_attachment_image( $testimonial['image'], 'full' ); ?>
								</figure>
								<div>
									<p class="c-text c-text--md c-text--bold">
										<?php echo esc_html( $testimonial['name'] ); ?>
									</p>
									<span class="c-text--xs">
										<?php echo esc_html( $testimonial['city'] ); ?>, <?php echo esc_html( $testimonial['country'] ); ?>
									</span>
								</div>
							</div>
							<span class="c-testimonial__review c-text c-text--sm">
								<?php echo esc_html( $testimonial['review'] ); ?>
								<svg class="c-icon">
									<use xlink:href="#star" />
								</svg>
							</span>
						</header>
						<div class="c-testimonial__body c-text c-text--sm">
							<?php echo esc_html( $testimonial['testimonial'] ); ?>
						</div>
					</article>
				</li>
				<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</div>
</section>
