<?php
/**
 * Title: Hero
 * Description: Add a image with a text overlay - great for headers.
 * Keywords: fuerzastudio
 * Mode: auto
 * Icon: <svg width="1em" height="1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M18.7 3H5.3C4 3 3 4 3 5.3v13.4C3 20 4 21 5.3 21h13.4c1.3 0 2.3-1 2.3-2.3V5.3C21 4 20 3 18.7 3zm.8 15.7c0 .4-.4.8-.8.8H5.3c-.4 0-.8-.4-.8-.8V5.3c0-.4.4-.8.8-.8h6.2v8.9l2.5-3.1 2.5 3.1V4.5h2.2c.4 0 .8.4.8.8v13.4z"></path></svg>
 *
 * @package Fuerza
 */

?>

 <section class="b-hero" <?php fuerza_block_attrs( $block ); ?>>
	<div class="container b-hero__grid">
		<div class="b-hero__content">
			<h2>
				<?php echo wp_kses_post( $title ); ?>
			</h2>
			<p>
				<?php echo wp_kses_post( $description ); ?>
			</p>

			<a href="#" class="c-btn c-btn--primary c-btn--lg">Get Started</a>
		</div>
		<figure class="b-hero__figure">
			<img src="<?php echo wp_kses_post( $image ); ?>" alt="">
		</figure>
	</div>
 </section>
