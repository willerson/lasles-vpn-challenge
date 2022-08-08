<?php
/**
 * Title: Testimonials
 * Description: Display a list of testimonials.
 * Keywords: fuerzastudio
 * mode: auto
 *
 * @package Fuerza
 */

$swiper_params = [
	'slidesPerView'  => 'auto',
	'slidesPerGroup' => 1,
	'spaceBetween'   => 40,
	'centeredSlides' => false,

	'autoplay'       => [
		'delay'                => 2000,
		'disableOnInteraction' => false,
	],

	'navigation'     => [
		'prevEl' => '.swiper-button-prev',
		'nextEl' => '.swiper-button-next',
	],

	'pagination' => [
		'el'        => '.swiper-pagination',
		'clickable' => true,
	],
	'loop'           => true,
	'speed'          => 1000,

	// 'breakpoints'    => [
	// 	'450' => [
	// 		'slidesPerView'  => 'auto',
	// 		'slidesPerGroup' => 1,
	// 	],
	// 	'768' => [
	// 		'slidesPerView'  => 'auto',
	// 		'slidesPerGroup' => 1,
	// 	],
	// ],
];

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

		<div class="swiper" data-params='<?php echo wp_json_encode( $swiper_params ); ?>'>
			<ul class="b-testimonials__items swiper-wrapper">
				<?php if ( ! empty( $items ) ) : ?>
					<?php foreach ( $items as $testimonial ) : ?>
					<li class="swiper-slide">
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
		<nav class="b-testimonials__nav-slider">
			<div class="swiper-pagination"></div>
			<ul class="b-testimonials__buttons">
				<div class="b-testimonials__button swiper-button-prev">
					<a class="c-btn c-btn--primary-o c-btn--rounded">
						<svg class="c-icon">
							<use xlink:href="#arrow-left"></use>
						</svg>
					</a>
				</div>
				<div class="b-testimonials__button swiper-button-next">
					<a class="c-btn c-btn--primary-o c-btn--rounded">
						<svg class="c-icon">
							<use xlink:href="#arrow-right"></use>
						</svg>
					</a>
				</div>
			</ul>
		</nav>
	</div>
</section>
