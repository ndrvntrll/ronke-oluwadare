<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

$tracem_is_page_portfolio 		= false;
$tracem_portfolio_select 		= '1';
$tracem_portfolio_xtra_title 	= '';
$tracem_single_port_infos 		= '';
$tp_xtra_images 				= array();
$tracem_portfolio_video_url 	= '';

if( function_exists( 'cs_get_option' ) ) {
	$_tracem_portfolio_options 		= get_post_meta( get_the_ID(), '_tracem_portfolio_options', true );
	$tracem_is_page_portfolio 		= isset( $_tracem_portfolio_options['tracem_is_page_portfolio'] ) ? $_tracem_portfolio_options['tracem_is_page_portfolio'] : '';
	$tracem_portfolio_xtra_title 	= isset( $_tracem_portfolio_options['tracem_portfolio_xtra_title'] ) ? $_tracem_portfolio_options['tracem_portfolio_xtra_title'] : '';
	$tracem_single_port_infos 		= isset( $_tracem_portfolio_options['tracem_single_port_infos'] ) ? $_tracem_portfolio_options['tracem_single_port_infos'] : '';
	$tp_xtra_images 				= isset( $_tracem_portfolio_options['tp_xtra_images'] ) ? $_tracem_portfolio_options['tp_xtra_images'] : '';
	$tracem_portfolio_video_url 	= isset( $_tracem_portfolio_options['tracem_portfolio_video_url'] ) ? $_tracem_portfolio_options['tracem_portfolio_video_url'] : '';

	if( $tracem_is_page_portfolio == true ) {
		$tracem_portfolio_select 		= isset( $_tracem_portfolio_options['tracem_portfolio_select'] ) ? $_tracem_portfolio_options['tracem_portfolio_select'] : '';
	} else {
		$tracem_portfolio_select 		= cs_get_option( 'tracem_portfolio_select' );
	}
}

get_header();

	set_query_var( 'tp_xtra_title', $tracem_portfolio_xtra_title );
	set_query_var( 'tp_port_infos', $tracem_single_port_infos );
	set_query_var( 'tp_xtra_image', $tp_xtra_images );
	set_query_var( 'tracem_portfolio_video_url', $tracem_portfolio_video_url );

    get_template_part( 'template-parts/portfolio/portfolio', $tracem_portfolio_select );

get_footer();