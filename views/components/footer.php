<?php
/**
 * Displays the footer.
 *
 * @package Fuerza
 */

?>
<footer class="c-footer">
	<section class="container">
		<div class="">
			<?php fuerza_partial( 'logo' ); ?>
			<p class="c-footer__text">
			<strong>LaslesVPN</strong> is a private virtual network that has unique features and has high security.
			</p>
			<?php \Fuerza::render( 'views/components/social-networks' ); ?>
			<p class="c-footer__copyright">©2020Lasles<strong>VPN</strong></p>
		</div>
		<div class="c-footer__list-items">
			<div class="c-footer__first-items">
				<?php \Fuerza::render( 'views/components/sitemap-list', [ 'title' => 'Product', ] ); ?>
				<?php \Fuerza::render( 'views/components/sitemap-list', [ 'title' => 'Engage', ] ); ?>
			</div>
			<?php \Fuerza::render( 'views/components/sitemap-list', [ 'title' => 'Earn Money', ] ); ?>
		</div>
	</section>
</footer>
