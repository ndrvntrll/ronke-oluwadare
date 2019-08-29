<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

$tracem_is_page_menu			= '';
$tracem_header_select			= 'initial';
$tracem_is_transparent_menu 	= '';
$tracem_is_white_menu 			= '';
$tracem_header_socials 			= '';
$tracem_is_header_search 		= '';

if( function_exists( 'cs_get_option' ) ) {
	$_tracem_page_header_options 	= get_post_meta( get_the_ID(), '_tracem_page_header_options', true );
	$tracem_is_page_menu 			= isset( $_tracem_page_header_options['tracem_is_page_menu'] ) ? $_tracem_page_header_options['tracem_is_page_menu'] : '';

	if( is_page() && $tracem_is_page_menu == true ) {

		// This data comes from specific page option
		$tracem_header_select 			= isset( $_tracem_page_header_options['tracem_header_select'] ) ? $_tracem_page_header_options['tracem_header_select'] : '';
		$tracem_is_transparent_menu 	= isset( $_tracem_page_header_options['tracem_is_transparent_menu'] ) ? $_tracem_page_header_options['tracem_is_transparent_menu'] : '';
		$tracem_is_white_menu 			= isset( $_tracem_page_header_options['tracem_is_white_menu'] ) ? $_tracem_page_header_options['tracem_is_white_menu'] : '';

	} else {

		// If page options turn off then theme options
		$tracem_header_select 			= cs_get_option( 'tracem_header_select' );
		$tracem_is_transparent_menu 	= cs_get_option( 'tracem_is_transparent_menu' );

	}

	// Only from theme options
	$tracem_header_socials 			= cs_get_option( 'tracem_header_socials' );
	$tracem_is_header_search 		= cs_get_option( 'tracem_is_header_search' );
}


/*
 * @function tracem_html_wrapper_before() - inc/page/layout.php
 * @hooked tracem_html_wrapper_start - 10 - inc/page/hooks.php
 */
do_action( 'tracem_html_wrapper_start' );
	
	set_query_var( 'tracem_header_select', $tracem_header_select );
	set_query_var( 'tracem_is_transparent_menu', $tracem_is_transparent_menu );
	set_query_var( 'tracem_is_white_menu', $tracem_is_white_menu );
	set_query_var( 'tracem_header_socials', $tracem_header_socials );
	set_query_var( 'tracem_is_header_search', $tracem_is_header_search );

	if( ! is_404() ) {
		get_template_part( 'template-parts/header/header', $tracem_header_select );
	}

get_template_part( 'template-parts/header/header', 'mobile' );

get_template_part( 'template-parts/header/page', 'header' );