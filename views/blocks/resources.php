<?php
/**
 * Title: Resouces
 * Description: Features offered.
 * Keywords: fuerzastudio
 * Mode: auto
 * Icon: <svg width="1em" height="1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M18.7 3H5.3C4 3 3 4 3 5.3v13.4C3 20 4 21 5.3 21h13.4c1.3 0 2.3-1 2.3-2.3V5.3C21 4 20 3 18.7 3zm.8 15.7c0 .4-.4.8-.8.8H5.3c-.4 0-.8-.4-.8-.8V5.3c0-.4.4-.8.8-.8h6.2v8.9l2.5-3.1 2.5 3.1V4.5h2.2c.4 0 .8.4.8.8v13.4z"></path></svg>
 *
 * @package Fuerza
 */

?>

 <section class="b-resources" <?php fuerza_block_attrs( $block ); ?>>
	<div class="container b-resources__grid">
		<figure class="b-resources__figure">
			<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/illustration-2.svg' ) ); ?>" alt="">
		</figure>
		<div class="b-resources__content">

			<?php \Fuerza::render( 'views/components/top-section', [
				'title' => 'We Provide Many Features You Can Use',
				'text' => "You can explore the features that we provide with fun and have their own functions each feature.",
			] ); ?>

			<ul class="b-resources__list">
				<li class="b-resources__item">
					<svg class="c-icon">
						<use xlink:href="#checked" />
					</svg>
					Powerfull online protection.
				</li>
				<li class="b-resources__item">
					<svg class="c-icon">
						<use xlink:href="#checked" />
					</svg>
					Internet without borders.
				</li>
				<li class="b-resources__item">
					<svg class="c-icon">
						<use xlink:href="#checked" />
					</svg>
					Supercharged VPN
				</li>
				<li class="b-resources__item">
					<svg class="c-icon">
						<use xlink:href="#checked" />
					</svg>
					No specific time limits.
				</li>
			</ul>
		</div>
	</div>
 </section>
