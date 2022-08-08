<?php
/**
 * Layout: views/layouts/app.php
 * Template Name: Style Guide
 *
 * The style guide template file.
 *
 * @package Fuerza
 */

?>

<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<div <?php post_class(); ?>>
		<header class="g-header">
			<img src="<?php echo esc_url( Fuerza::core()->assets()->getAssetUrl( 'images/logo-styleguide.svg' ) ); ?>" alt="" />
		</header>

		<div class="page__content">
			<?php the_content(); ?>

			<?php \Fuerza::render( 'views/partials/pagination' ); ?>
		</div>

		<?php \Fuerza::render( 'views/blocks/global-network' ); ?>
		<?php \Fuerza::render( 'views/blocks/resources' ); ?>
		<?php \Fuerza::render( 'views/blocks/hero' ); ?>
		<?php \Fuerza::render( 'views/components/testimonial' ); ?>
		<?php \Fuerza::render( 'guide/guide-sitemap-list' ); ?>
		<?php \Fuerza::render( 'views/components/box-general-data' ); ?>
		<?php \Fuerza::render( 'views/components/plans' ); ?>
		<?php \Fuerza::render( 'views/components/login' ); ?>
		<?php \Fuerza::render( 'views/components/nav' ); ?>

		<?php
			$guides = [
				'top-section',
				'headings',
				'buttons',
				'form',
				'typography',
			];
			?>
		<?php foreach ( $guides as $guide ) : ?>
			<?php \Fuerza::render( 'guide/guide-' . $guide, [ 'id' => $guide ] ); ?>
		<?php endforeach; ?>


		<?php \Fuerza::render( 'views/blocks/box-subscribe' ); ?>
	</div>
<?php endwhile; ?>
