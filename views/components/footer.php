<?php
/**
 * Displays the footer.
 *
 * @package Fuerza
 */

?>
<footer class="c-footer">
	<div class="container">

		<div class="c-footer__privacy">
			<?php $composer->privacyMenu(); ?>
		</div>

		<div class="c-footer__feet">
			<p class="c-footer__copyright"><?php echo esc_html( $copyright ); ?></p>

			<p class="c-logo c-logo-fuerzastudio">
				<a href="http://fuerzastudio.com" target="_blank">
					<svg class="c-icon c-icon--logo-fuerzastudio">
						<use xlink:href="#logo-fuerzastudio" />
					</svg>
				</a>
			</p>
		</div>
	</div>
</footer>
