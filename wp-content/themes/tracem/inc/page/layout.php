<?php
/**
 * Tracem Page Layout
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */


if( ! function_exists( 'tracem_html_wrapper_before' ) ) {
	/*
	 * Tracem HTML Wrapper Before
	 */
	function tracem_html_wrapper_before() {
		$tracem_is_preloader = false;
		if( function_exists( 'cs_get_option' ) ) {
			$tracem_is_preloader = cs_get_option( 'tracem_is_preloader' );
		}
	?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	if( $tracem_is_preloader == true ) : ?>
		<div class="loader-wraper">
			<div class="loader-container">
				<div class="loader">
					<span></span>
					<span></span>
					<span></span>
				</div><!-- .loader -->
			</div><!-- .loader-container -->
		</div><!-- .loader-wraper -->
	<?php endif; ?>
	<?php
	}
}