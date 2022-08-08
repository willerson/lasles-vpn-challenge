<?php
/**
 * Title: General Data
 * Description: Display for data
 * Keywords: fuerzastudio
 * mode: auto
 *
 * @package Fuerza
 */

?>

<section <?php fuerza_block_attrs( $block ); ?>>
	<ul class="c-box-general">
		<li class="c-box-general__data">
			<svg class="c-icon">
				<use xlink:href="#user" />
			</svg>
			<div>
				<h3>
					<?php echo wp_kses_post( $users ); ?>+
				</h3>
				<h4>Users</h4>
			</div>
		</li>
		<span class="c-box-general__vertical-bar"></span>
		<li class="c-box-general__data">
			<svg class="c-icon">
				<use xlink:href="#location" />
			</svg>
			<div>
				<h3>
					<?php echo wp_kses_post( $locations ); ?>+
				</h3>
				<h4>Locations</h4>
			</div>
		</li>
		<span class="c-box-general__vertical-bar"></span>
		<li class="c-box-general__data">
			<svg class="c-icon">
				<use xlink:href="#server" />
			</svg>
			<div>
				<h3>
					<?php echo wp_kses_post( $servers ); ?>+
				</h3>
				<h4>Servers</h4>
			</div>
		</li>
	</ul>
</section>
