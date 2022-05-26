<?php
/**
 * Sidebar partial.
 *
 * @link https://codex.wordpress.org/Customizing_Your_Sidebar
 *
 * @package Fuerza
 */

?>
<div class="sidebar">
	<ul class="widgets">
		<?php dynamic_sidebar( \Fuerza::core()->sidebar()->getCurrentSidebarId() ); ?>
	</ul>
</div>
