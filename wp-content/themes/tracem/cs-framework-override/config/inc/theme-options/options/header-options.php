<?php
/**
 * Tracem CS Framework Header Options
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
    'name'      => 'tracem_header_options',
    'title'     => esc_html__( 'Header Options', 'tracem' ),
    'icon'      => 'fas fa-hospital-symbol',
    'sections'  => array(

        array(
            'name'      => 'tracem_header_style',
            'title'     => esc_html__( 'Header Style', 'tracem' ),
            'icon'      => 'fas fa-heading',
            'fields'    => array(

                array(
                    'id'            => 'tracem_header_select',
                    'type'          => 'image_select',
                    'title'         => esc_html__( 'Header Select', 'tracem' ),
                    'options'       => array(
                        'v1'        => get_theme_file_uri( 'inc/images/header/header-v1.png' ),
                        'v2'        => get_theme_file_uri( 'inc/images/header/header-v2.png' ),
                        'v3'        => get_theme_file_uri( 'inc/images/header/header-v3.png' ),
                        'v4'        => get_theme_file_uri( 'inc/images/header/header-v4.png' ),
                        'v5'        => get_theme_file_uri( 'inc/images/header/header-v5.png' ),
                        'initial'   => get_theme_file_uri( 'inc/images/header/header-v1.png' )
                    ),
                    'default'       => 'initial',
                ),

                array(
                    'id'            => 'tracem_is_transparent_menu',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Transparent Menu On/Off', 'tracem' ),
                    'default'       => false
                ),

                array(
                    'id'            => 'tracem_header_logo',
                    'type'          => 'image',
                    'title'         => esc_html__( 'Header Logo', 'tracem' )
                ),

                array(
                    'id'            => 'tracem_retina_header_logo',
                    'type'          => 'image',
                    'title'         => esc_html__( 'Header Logo(Retina)', 'tracem' )
                ),

                array(
                    'id'                => 'tracem_header_socials',
                    'type'              => 'group',
                    'title'             => esc_html__( 'Social Profile', 'tracem' ),
                    'button_title'      => esc_html__( 'Add New', 'tracem' ),
                    'accordion_title'   => esc_html__( 'Add New Field', 'tracem' ),
                    'fields'            => array(

                        array(
                            'id'            => 'icon',
                            'type'          => 'icon',
                            'title'         => esc_html__( 'Social Icon', 'tracem' )
                        ),

                        array(
                            'id'            => 'url',
                            'type'          => 'text',
                            'title'         => esc_html__( 'Social URL', 'tracem' )
                        ),

                    ),
                ),

                array(
                    'id'            => 'tracem_is_header_search',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Header Search On/Off', 'tracem' ),
                    'default'       => true
                ),

            ),
        ),

        array(
            'name'      => 'tracem_page_header',
            'title'     => esc_html__( 'Page Header', 'tracem' ),
            'icon'      => 'fas fa-ellipsis-h',
            'fields'    => array(

                array(
                    'id'            => 'tracem_is_page_header',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Page Header On/Off', 'tracem' ),
                    'default'       => true
                ),

                array(
                    'id'            => 'tracem_is_page_header_container',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Page Header Container', 'tracem' ),
                    'default'       => true
                ),

                array(
                    'id'            => 'tracem_page_header_image',
                    'type'          => 'image',
                    'title'         => esc_html__( 'Page Header Image', 'tracem' ),
                    'dependency'    => array( 'tracem_is_page_header', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_page_header_overlay',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Page Header Overlay', 'tracem' ),
                    'dependency'    => array( 'tracem_is_page_header', '==', 'true' ),
                    'default'       => '',
                    'rgba'          => true
                ),

            ),
        ),

    )
);