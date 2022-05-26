<?php
/**
 * Search form partial.
 *
 * @link https://codex.wordpress.org/Styling_Theme_Forms#The_Search_Form
 *
 * @package Fuerza
 */

?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get" role="search">
	<label for="s">
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'fuerza' ); ?></span>

		<input type="text" title="<?php esc_attr_e( 'Search for:', 'fuerza' ); ?>" name="s" value="" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'fuerza' ); ?>" class="search-form__field" />
	</label>

	<input type="submit" value="<?php esc_attr_e( 'Search', 'fuerza' ); ?>" class="search-form__submit-button screen-reader-text" />
</form>
