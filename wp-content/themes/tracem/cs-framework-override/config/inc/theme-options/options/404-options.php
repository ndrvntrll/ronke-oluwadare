<?php
/**
 * Tracem CS Framework 404 Options
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
    'name'      => 'tracem_404_options',
    'title'     => esc_html__( '404 Options', 'tracem' ),
    'icon'      => 'fab fa-foursquare',
    'sections'  => array(

        array(
            'name'      => 'tracem_404',
            'title'     => esc_html__( '404', 'tracem' ),
            'icon'      => 'fab fa-nintendo-switch',
            'fields'    => array(

                array(
                    'id'            => 'tracem_404_bg',
                    'type'          => 'image',
                    'title'         => esc_html__( '404 Background', 'tracem' )
                ),

            ),
        ),

    )
);