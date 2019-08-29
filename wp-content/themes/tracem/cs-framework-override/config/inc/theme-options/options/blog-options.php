<?php
/**
 * Tracem CS Framework Blog Options
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

$options[]   = array(
    'name'     => 'tracem_blog_chooser',
    'title'    => esc_html__( 'Blog', 'tracem' ),
    'icon'     => 'fa fa-th-large',
    'fields'   => array(

        array(
            'type'          => 'heading',
            'content'       => esc_html__( 'Blog Style', 'tracem' )
        ),

        array(
            'id'            => 'tracem_blog_style',
            'type'          => 'image_select',
            'title'         => esc_html__( 'Blog Style', 'tracem' ),
            'options'       => array(
                'left'        => get_theme_file_uri( '/inc/images/blog/left-blog.png' ),
                'right'       => get_theme_file_uri( '/inc/images/blog/right-blog.png' ),
                'full'        => get_theme_file_uri( '/inc/images/blog/full-blog.png' )
            ),
            'default'       => 'left'
        ),

        array(
            'id'            => 'tracem_blog_single_style',
            'type'          => 'image_select',
            'title'         => esc_html__( 'Blog Single Style', 'tracem' ),
            'options'       => array(
                'left'        => get_theme_file_uri( '/inc/images/blog/left-blog.png' ),
                'right'       => get_theme_file_uri( '/inc/images/blog/right-blog.png' ),
                'full'        => get_theme_file_uri( '/inc/images/blog/full-blog.png' )
            ),
            'default'       => 'left'
        ),

    )
);