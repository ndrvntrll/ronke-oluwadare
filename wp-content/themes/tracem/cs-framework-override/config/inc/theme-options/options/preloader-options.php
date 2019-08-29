<?php
/**
 * Inc/Post
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themestrace.com
 * @version 1.0.0
 * @since 1.0.0
 */

$options[]   = array(
    'name'      => 'tracem_preloader_options',
    'title'     => esc_html__( 'Preloader', 'tracem' ),
    'icon'      => 'fas fa-spinner',
    'fields'    => array(

        array(
            'id'            => 'tracem_is_preloader',
            'type'          => 'switcher',
            'title'         => esc_html__( 'Preloader', 'tracem' ),
            'default'       => true
        ),

    ),
);