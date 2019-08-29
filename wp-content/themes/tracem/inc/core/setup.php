<?php
/**
 * Tracem Setup File
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

$theme 			= wp_get_theme();
$tracem_version = $theme['Version'];


$body_default_font 	= '';
$body_extra_font 	= '';

if( function_exists( 'cs_get_option' ) ) {
	$body_default_font	= cs_get_option( 'tracem_body_default_font_family' );
	$body_extra_font	= cs_get_option( 'tracem_body_extra_font_family' );

	$body_default_font_family 	= $body_default_font['family'];
	$body_extra_font_family 	= $body_extra_font['family'];
}
if( ! function_exists( 'tracem_enqueue_defined_fonts_url' ) ) {
	/*
	 * Enqueue defined fonts by user
	 */
	function tracem_enqueue_defined_fonts_url() {

		$body_default_font	= cs_get_option( 'tracem_body_default_font_family' );
		$body_extra_font	= cs_get_option( 'tracem_body_extra_font_family' );

		$body_default_font_family 	= $body_default_font['family'];
		$body_extra_font_family 	= $body_extra_font['family'];

		$fonts_url = '';

		/*
		 * Translators: If there are characters in your language that are not
		 * supported by Chosen font(s), translate this to 'off'. Do not translate
		 * into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'tracem' ) ) {

			$font_families = array();

			/*
			 * Checking Body Font - Default
			 * Body Font Grab From $body_default_font_family with the help of $body_default_font
			 * User Custom Defined Font
			 */
	    	if( isset( $body_default_font_family ) ) :
	    		$font_families[] = $body_default_font_family . ':400,500,600,700,900';
	    	endif;

			/*
			 * Checking Body Font - Extra
			 * Body Font Grab From $body_extra_font_family with the help of $body_extra_font
			 * User Custom Defined Font
			 */
	    	if( isset( $body_extra_font_family ) && ( $body_extra_font_family != $body_default_font_family ) ) :
	    		$font_families[] = $body_extra_font_family . ':400,500,600,700,900';
	    	endif;

			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' )
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

		}

		return esc_url_raw( $fonts_url );
	}
}


if( ! function_exists( 'tracem_defined_fonts_url' ) ) {
	/*
	 * Google Fonts
	 */
	function tracem_defined_fonts_url() {
		wp_enqueue_style( 'tracem-defined-fonts', tracem_enqueue_defined_fonts_url() );
	}
}


if( function_exists( 'cs_get_option' ) ) {
	if( $body_default_font_family != 'FuturaPTBook' || $body_extra_font_family != 'FuturaPTMedium' ) {
		add_action( 'wp_enqueue_scripts', 'tracem_defined_fonts_url' );
	}
}