<?php
/**
 * Title: Plans
 * Description: Add a image with a text overlay - great for headers.
 * Keywords: fuerzastudio
 * Mode: auto
 * Icon: <svg width="1em" height="1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M18.7 3H5.3C4 3 3 4 3 5.3v13.4C3 20 4 21 5.3 21h13.4c1.3 0 2.3-1 2.3-2.3V5.3C21 4 20 3 18.7 3zm.8 15.7c0 .4-.4.8-.8.8H5.3c-.4 0-.8-.4-.8-.8V5.3c0-.4.4-.8.8-.8h6.2v8.9l2.5-3.1 2.5 3.1V4.5h2.2c.4 0 .8.4.8.8v13.4z"></path></svg>
 *
 * @package Fuerza
 */

?>

 <section class="b-plans" <?php fuerza_block_attrs( $block ); ?>>
	<?php \Fuerza::render( 'views/components/top-section', [
		'title' => "Choose Your Plan",
		'text' => "Let's choose the package that is best for you and explore it happily and cheerfully.",
	] ); ?>

	<ul class="c-plans">
		<li class="c-plans__plan">
			<div>
				<figure class="c-plans__figure">
					<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/free-plan.png' ) ); ?>" alt="">
				</figure>
				<h5>Free Plan</h5>
				<ul class="c-plans__list">
					<li class="c-plans__list-item">
						<svg class="c-icon">
							<use xlink:href="#check" />
						</svg>
						Unlimited Bandwitch
					</li>
					<li class="c-plans__list-item">
						<svg class="c-icon">
							<use xlink:href="#check" />
						</svg>
						Encrypted Connection
					</li>
					<li class="c-plans__list-item">
						<svg class="c-icon">
							<use xlink:href="#check" />
						</svg>
						Yes Traffic Logs
					</li>
					<li class="c-plans__list-item">
						<svg class="c-icon">
							<use xlink:href="#check" />
						</svg>
						Works on All Devices
					</li>
				</ul>
			</div>
			<div>
				<h3>Free</h3>
				<a href="#" class="c-btn c-btn--primary-o c-btn--md">Select</a>
			</div>
		</li>
		<li class="c-plans__plan">
			<div>
				<figure class="c-plans__figure">
					<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/standard-plan.png' ) ); ?>" alt="">
				</figure>
				<h5>Standard Plan</h5>
				<ul class="c-plans__list">
					<li class="c-plans__list-item">
						<svg class="c-icon">
							<use xlink:href="#check" />
						</svg>
						Unlimited Bandwitch
					</li>
					<li class="c-plans__list-item">
						<svg class="c-icon">
							<use xlink:href="#check" />
						</svg>
						Encrypted Connection
					</li>
					<li class="c-plans__list-item">
						<svg class="c-icon">
							<use xlink:href="#check" />
						</svg>
						Yes Traffic Logs
					</li>
					<li class="c-plans__list-item">
						<svg class="c-icon">
							<use xlink:href="#check" />
						</svg>
						Works on All Devices
					</li>
					<li class="c-plans__list-item">
						<svg class="c-icon">
							<use xlink:href="#check" />
						</svg>
						Connect Anyware
					</li>
				</ul>
			</div>
			<div>
				<h3>$9 / mo</h3>
				<a href="#" class="c-btn c-btn--primary-o c-btn--md">Select</a>
			</div>
		</li>
		<li class="c-plans__plan c-plans__plan--active	">
			<div>
				<figure class="c-plans__figure">
					<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/premium-plan.png' ) ); ?>" alt="">
				</figure>
				<h5>Premium Plan</h5>
				<ul class="c-plans__list">
					<li class="c-plans__list-item">
						<svg class="c-icon">
							<use xlink:href="#check" />
						</svg>
						Unlimited Bandwitch
					</li>
					<li class="c-plans__list-item">
						<svg class="c-icon">
							<use xlink:href="#check" />
						</svg>
						Encrypted Connection
					</li>
					<li class="c-plans__list-item">
						<svg class="c-icon">
							<use xlink:href="#check" />
						</svg>
						Yes Traffic Logs
					</li>
					<li class="c-plans__list-item">
						<svg class="c-icon">
							<use xlink:href="#check" />
						</svg>
						Works on All Devices
					</li>
					<li class="c-plans__list-item">
						<svg class="c-icon">
							<use xlink:href="#check" />
						</svg>
						Connect Anyware
					</li>
					<li class="c-plans__list-item">
						<svg class="c-icon">
							<use xlink:href="#check" />
						</svg>
						Get New Features
					</li>
				</ul>
			</div>
			<div>
				<h3>$12 / mo</h3>
				<a href="#" class="c-btn c-btn--primary c-btn--md">Select</a>
			</div>
		</li>
	</ul>
 </section>
