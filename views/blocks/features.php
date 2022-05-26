<?php
/**
 * Title: Features
 * Description: Display a list of features that you offer.
 * Keywords: fuerzastudio
 * mode: auto
 *
 * @package Fuerza
 */

?>

<section <?php fuerza_block_attrs( $block ); ?>>
	<div class="container">
		<header class="b-features__head">
			<h2 class="b-features__title c-title c-title--h2">
				<?php echo wp_kses_post( $title ); ?>
			</h2>
		</header>

		<div class="b-features__body">
			<ul class="b-features__items">
				<?php if ( ! empty( $items ) ) : ?>
					<?php foreach ( $items as $feature ) : ?>
					<li class="b-features__item c-feature">
						<figure class="c-feature__picture c-picture">
							<?php echo wp_get_attachment_image( $feature['image'], 'full' ); ?>
						</figure>
						<h3 class="c-feature__title">
							<?php echo esc_html( $feature['title'] ); ?>
						</h3>
						<div class="c-feature__text c-text">
							<p>
								<?php echo esc_html( $feature['description'] ); ?>
							</p>
						</div>
					</li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</section>
