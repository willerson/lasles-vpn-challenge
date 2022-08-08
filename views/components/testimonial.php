<?php
/**
 * Display the testimonial
 *
 */

$swiper_params = [
	'slidesPerView'  => 'auto',
	'slidesPerGroup' => 1,
	'spaceBetween'   => 35,
	'centeredSlides' => true,

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

	'breakpoints'    => [
		'450' => [
			'slidesPerView'  => 'auto',
			'slidesPerGroup' => 1,
		],
		'768' => [
			'slidesPerView'  => 'auto',
			'slidesPerGroup' => 1,
		],
	],
];

?>

<section id="<?php echo esc_html( 'guide-' . $id ); ?>" class="g-section">
	<div class="g-container container">
		<h2 class="g-section__title">
			<span>Testmonials</span>
		</h2>

		<div class="b-testimonials swiper" data-params='<?php echo wp_json_encode( $swiper_params ); ?>'>
			<ul class="b-testimonials__items swiper-wrapper">
				<li class="swiper-slide">
					<article class="c-testimonial c-testimonial--active">
						<header class="c-testimonial__header">
							<div class="c-testimonial__profile">
								<figure class="c-testimonial__figure">
									<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/exemple-avatar.png' ) ); ?>" alt="">
								</figure>
								<div>
									<p class="c-text c-text--md c-text--bold">Viezh Robert</p>
									<span class="c-text--xs">Warsaw, Poland</span>
								</div>
							</div>
							<span class="c-testimonial__review c-text c-text--sm">
								4.5
								<svg class="c-icon">
									<use xlink:href="#star" />
								</svg>
							</span>
						</header>
						<div class="c-testimonial__body c-text c-text--sm">
							“Wow... I am very happy to use this VPN, it turned out to be more than my expectations and so far there have been no problems. LaslesVPN always the best”.
						</div>
					</article>
				</li>
				<li class="swiper-slide">
					<article class="c-testimonial c-testimonial--active">
						<header class="c-testimonial__header">
							<div class="c-testimonial__profile">
								<figure class="c-testimonial__figure">
									<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/exemple-avatar.png' ) ); ?>" alt="">
								</figure>
								<div>
									<p class="c-text c-text--md c-text--bold">Viezh Robert</p>
									<span class="c-text--xs">Warsaw, Poland</span>
								</div>
							</div>
							<span class="c-testimonial__review c-text c-text--sm">
								4.5
								<svg class="c-icon">
									<use xlink:href="#star" />
								</svg>
							</span>
						</header>
						<div class="c-testimonial__body c-text c-text--sm">
							“Wow... I am very happy to use this VPN, it turned out to be more than my expectations and so far there have been no problems. LaslesVPN always the best”.
						</div>
					</article>
				</li>
				<li class="swiper-slide">
					<article class="c-testimonial c-testimonial--active">
						<header class="c-testimonial__header">
							<div class="c-testimonial__profile">
								<figure class="c-testimonial__figure">
									<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/exemple-avatar.png' ) ); ?>" alt="">
								</figure>
								<div>
									<p class="c-text c-text--md c-text--bold">Viezh Robert</p>
									<span class="c-text--xs">Warsaw, Poland</span>
								</div>
							</div>
							<span class="c-testimonial__review c-text c-text--sm">
								4.5
								<svg class="c-icon">
									<use xlink:href="#star" />
								</svg>
							</span>
						</header>
						<div class="c-testimonial__body c-text c-text--sm">
							“Wow... I am very happy to use this VPN, it turned out to be more than my expectations and so far there have been no problems. LaslesVPN always the best”.
						</div>
					</article>
				</li>
				<li class="swiper-slide">
					<article class="c-testimonial c-testimonial--active">
						<header class="c-testimonial__header">
							<div class="c-testimonial__profile">
								<figure class="c-testimonial__figure">
									<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/exemple-avatar.png' ) ); ?>" alt="">
								</figure>
								<div>
									<p class="c-text c-text--md c-text--bold">Viezh Robert</p>
									<span class="c-text--xs">Warsaw, Poland</span>
								</div>
							</div>
							<span class="c-testimonial__review c-text c-text--sm">
								4.5
								<svg class="c-icon">
									<use xlink:href="#star" />
								</svg>
							</span>
						</header>
						<div class="c-testimonial__body c-text c-text--sm">
							“Wow... I am very happy to use this VPN, it turned out to be more than my expectations and so far there have been no problems. LaslesVPN always the best”.
						</div>
					</article>
				</li>
				<li class="swiper-slide">
					<article class="c-testimonial c-testimonial--active">
						<header class="c-testimonial__header">
							<div class="c-testimonial__profile">
								<figure class="c-testimonial__figure">
									<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/exemple-avatar.png' ) ); ?>" alt="">
								</figure>
								<div>
									<p class="c-text c-text--md c-text--bold">Viezh Robert</p>
									<span class="c-text--xs">Warsaw, Poland</span>
								</div>
							</div>
							<span class="c-testimonial__review c-text c-text--sm">
								4.5
								<svg class="c-icon">
									<use xlink:href="#star" />
								</svg>
							</span>
						</header>
						<div class="c-testimonial__body c-text c-text--sm">
							“Wow... I am very happy to use this VPN, it turned out to be more than my expectations and so far there have been no problems. LaslesVPN always the best”.
						</div>
					</article>
				</li>
				<li class="swiper-slide">
					<article class="c-testimonial c-testimonial--active">
						<header class="c-testimonial__header">
							<div class="c-testimonial__profile">
								<figure class="c-testimonial__figure">
									<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/exemple-avatar.png' ) ); ?>" alt="">
								</figure>
								<div>
									<p class="c-text c-text--md c-text--bold">Viezh Robert</p>
									<span class="c-text--xs">Warsaw, Poland</span>
								</div>
							</div>
							<span class="c-testimonial__review c-text c-text--sm">
								4.5
								<svg class="c-icon">
									<use xlink:href="#star" />
								</svg>
							</span>
						</header>
						<div class="c-testimonial__body c-text c-text--sm">
							“Wow... I am very happy to use this VPN, it turned out to be more than my expectations and so far there have been no problems. LaslesVPN always the best”.
						</div>
					</article>
				</li>
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
