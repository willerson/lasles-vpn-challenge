<?php
/**
 * Display the testimonial
 *
 */

?>

<section id="<?php echo esc_html( 'guide-' . $id ); ?>" class="g-section">
	<div class="g-container container">
		<h2 class="g-section__title">
			<span>Navbar</span>
		</h2>

		<article class="c-testimonial">
			<header>
				<div class="c-testimonial__profile">
					<figure class="c-testimonial__figure">
						<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/exemple-avatar.png' ) ); ?>" alt="">
					</figure>
					<div>
						<p  class="c-testimonial__name">Viezh Robert</p>
						<span class="c-text--xs">Warsaw, Poland</span>
					</div>
				</div>
				<span>
					4.5
					<svg class="c-icon">
						<use xlink:href="#start" />
					</svg>
				</span>
			</header>
			<section>
				“Wow... I am very happy to use this VPN, it turned out to be more than my expectations and so far there have been no problems. LaslesVPN always the best”.
			</section>
		</article>
	</div>
</section>
