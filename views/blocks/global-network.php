<?php
/**
 * Title: Global Netword
 * Description: Block subscribe.
 * Keywords: fuerzastudio
 * mode: auto
 *
 * @package Fuerza
 */

?>

<section class="b-global-network container">
	<?php \Fuerza::render( 'views/components/top-section', [
		'title' => 'Subscribe Now for Get Special Features!',
		'text' => "Let's subscribe with us and find the fun.",
	] ); ?>

	<div class="b-global-network__content">
		<figure class="b-global-network__figure">
			<img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/world.png' ) ); ?>" alt="">
		</figure>
		<ul class="b-global-network__brands">
			<li class="b-global-network__brand"><img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/netflix.png' ) ); ?>" alt=""></li>
			<li class="b-global-network__brand"><img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/reddit.png' ) ); ?>" alt=""></li>
			<li class="b-global-network__brand"><img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/amazon.png' ) ); ?>" alt=""></li>
			<li class="b-global-network__brand"><img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/discord.png' ) ); ?>" alt=""></li>
			<li class="b-global-network__brand"><img src="<?php echo esc_url( \Fuerza::core()->assets()->getAssetUrl( 'images/spotify.png' ) ); ?>" alt=""></li>
		</ul>
	</div>
</section>
