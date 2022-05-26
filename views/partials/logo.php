<?php
/**
 * Displays the site logo. Falls back to the site name.
 *
 * @package Fuerza
 */

?>
<h1 class="c-logo c-logo-main">
	<a href="<?php echo esc_url( site_url( '/' ) ); ?>">
		<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/site-logo.svg' ) ); ?>" alt="" />
	</a>
</h1>
