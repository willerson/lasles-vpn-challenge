<?php
/**
 * Display the nav
 *
 */

?>

<section id="<?php echo esc_html( 'guide-' . $id ); ?>" class="g-section">
	<div class="g-container container">
		<h2 class="g-section__title">
			<span>Plans</span>
		</h2>

		<ul class="c-plans">
			<li class="c-plans__plan">
				<div>
					<figure class="c-plans__figure">
						<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/plan-box.png' ) ); ?>" alt="">
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
						<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/plan-box.png' ) ); ?>" alt="">
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
						<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/plan-box.png' ) ); ?>" alt="">
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
	</div>
</section>
