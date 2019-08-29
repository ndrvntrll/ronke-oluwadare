<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'tracem-sidebar' ) ) {
	return;
}
?>

<div class="col-lg-4 sticky">
	<aside class="tracem-blog-widget">
		<?php dynamic_sidebar( 'tracem-sidebar' ); ?>
	</aside><!-- .tracem-blog-widget -->
</div><!-- .col-lg-4 .sticky-->