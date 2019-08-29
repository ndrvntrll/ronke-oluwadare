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


$tracem_blog_single_style      = 'left';

if( function_exists( 'cs_get_option' ) ) {
    $tracem_blog_single_style  = cs_get_option( 'tracem_blog_single_style', 'left' );
}


get_header();

if( ! empty( $tracem_blog_single_style ) ) {

    get_template_part( 'template-parts/blog-single/single-blog', $tracem_blog_single_style );

}

get_footer();