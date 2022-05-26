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

		<!-- <div class="page__content">
			<?php the_content(); ?>

			<?php \Fuerza::render( 'views/partials/pagination' ); ?>
		</div> -->

		<?php
			$guides = [
				'colors',
				'headings',
				'buttons',
				'form',
				'typography',
			];
			?>
		<?php foreach ( $guides as $guide ) : ?>
			<?php \Fuerza::render( 'guide/guide-' . $guide, [ 'id' => $guide ] ); ?>
		<?php endforeach; ?>
	</div>
<?php endwhile; ?>
