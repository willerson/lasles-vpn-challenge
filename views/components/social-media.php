<?php
/**
 * Displays the social media list.
 *
 * @package Fuerza
 */

if ( empty( $social_media ) ) {
	return;
}

?>

<ul class="<?php echo esc_attr( $class ); ?>">
	<?php foreach ( $social_media as $item ) : ?>
		<li class="c-social-media__item">
			<a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank" class="c-social-media__link">
				<svg class="c-icon c-icon--<?php echo esc_attr( 'social-' . $item['network'] ); ?>">
					<use xlink:href="<?php echo esc_attr( '#social-' . $item['network'] ); ?>" />
				</svg>
				<span hidden><?php echo esc_html( fuerza_kebab_to_human_capitalized( $item['network'] ) ); ?></span>
			</a>
		</li>
	<?php endforeach; ?>
</ul>
