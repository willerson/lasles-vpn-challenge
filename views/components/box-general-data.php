<?php
/**
 * Display the general data
 *
 */

?>

<section id="<?php echo esc_html( 'guide-' . $id ); ?>" class="g-section">
	<div class="g-container container">
		<h2 class="g-section__title">
			<span>Data</span>
		</h2>

		<ul class="c-box-general">
			<li class="c-box-general__data">
				<svg class="c-icon">
					<use xlink:href="#user" />
				</svg>
				<div>
					<h3>90+</h3>
					<h4>Users</h4>
				</div>
			</li>
			<span class="c-box-general__vertical-bar"></span>
			<li class="c-box-general__data">
				<svg class="c-icon">
					<use xlink:href="#location" />
				</svg>
				<div>
					<h3>30+</h3>
					<h4>Locations</h4>
				</div>
			</li>
			<span class="c-box-general__vertical-bar"></span>
			<li class="c-box-general__data">
				<svg class="c-icon">
					<use xlink:href="#server" />
				</svg>
				<div>
					<h3>50+</h3>
					<h4>Servers</h4>
				</div>
			</li>
		</ul>
	</div>
</section>
