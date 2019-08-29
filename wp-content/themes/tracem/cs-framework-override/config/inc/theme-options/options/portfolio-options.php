<?php
/**
 * Tracem CS Framework Portfolio Options
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
    'name'      => 'tracem_footer_options',
    'title'     => esc_html__( 'Portfolio Options', 'tracem' ),
    'icon'      => 'far fa-building',
    'sections'  => array(

        array(
            'name'      => 'tracem_portfolio_selector',
            'title'     => esc_html__( 'Single Portfolio', 'tracem' ),
            'icon'      => 'fas fa-briefcase',
            'fields'    => array(

                array(
                    'id'            => 'tracem_portfolio_select',
                    'type'          => 'image_select',
                    'title'         => esc_html__( 'Portfolio Select', 'tracem' ),
                    'options'       => array(
                        '1'         => get_theme_file_uri( 'inc/images/portfolio/portfolio-v1.png' ),
                        '2'         => get_theme_file_uri( 'inc/images/portfolio/portfolio-v2.png' )
                    ),
                    'default'       => '1',
                ),

            ),
        ),

    )
);