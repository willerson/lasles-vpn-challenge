<?php
/**
 * Displays the header.
 *
 * @package Fuerza
 */

?>
<header class="c-header">
	<div class="container">
		<div class="c-header__body">
			<div class="c-header__logo">
				<?php fuerza_partial( 'logo' ); ?>
			</div>

			<div class="c-header__menu">
				<?php $composer->mainMenu(); ?>
			</div>

			<?php fuerza_component( 'button-collection', $header_buttons + [ 'class' => 'c-header__actions' ] ); ?>

			<button class="c-btn-nav">
				<span></span>
			</button>
		</div>
	</div>
</header>
