<?php
/**
 * Tracem CS Framework Footer Options
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
    'title'     => esc_html__( 'Footer Options', 'tracem' ),
    'icon'      => 'fab fa-foursquare',
    'sections'  => array(

        array(
            'name'      => 'tracem_footer_top',
            'title'     => esc_html__( 'Footer', 'tracem' ),
            'icon'      => 'fab fa-nintendo-switch',
            'fields'    => array(

                array(
                    'id'            => 'tracem_is_footer_top',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Footer Top On/Off', 'tracem' ),
                    'default'       => false
                ),

                array(
                    'id'            => 'tracem_is_footer_top_container',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Footer Container', 'tracem' ),
                    'default'       => false
                ),

                array(
                    'id'            => 'tracem_footer_top_bgc',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Footer Top Background', 'tracem' ),
                    'dependency'    => array( 'tracem_is_footer_top', '==', 'true' ),
                    'default'       => sanitize_hex_color( '#121212' )
                ),

                array(
                    'id'            => 'tracem_footer_top_cl',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Footer Top Color', 'tracem' ),
                    'dependency'    => array( 'tracem_is_footer_top', '==', 'true' ),
                    'default'       => sanitize_hex_color( '#aaa' )
                ),

                array(
                    'id'            => 'tracem_footer_top_cl_hover',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Footer Top Color(Hover)', 'tracem' ),
                    'dependency'    => array( 'tracem_is_footer_top', '==', 'true' ),
                    'default'       => sanitize_hex_color( '#eee' )
                ),

                array(
                    'id'            => 'tracem_is_parallax_footer',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Parallax Footer On/Off', 'tracem' ),
                    'default'       => true,
                    'dependency'    => array( 'tracem_is_footer_top', '==', 'true' )
                ),

            ),
        ),

        array(
            'name'      => 'tracem_footer_bottom',
            'title'     => esc_html__( 'Footer Bottom', 'tracem' ),
            'icon'      => 'far fa-copyright',
            'fields'    => array(

                array(
                    'id'            => 'tracem_is_footer_bottom',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Footer Bottom On/Off', 'tracem' ),
                    'default'       => false
                ),

                array(
                    'id'            => 'tracem_footer_bottom_bgc',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Footer Bottom Background', 'tracem' ),
                    'default'       => sanitize_hex_color( '#121212' ),
                    'dependency'    => array( 'tracem_is_footer_bottom', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_footer_bottom_cl',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Footer Bottom Color', 'tracem' ),
                    'default'       => sanitize_hex_color( '#aaa' ),
                    'dependency'    => array( 'tracem_is_footer_bottom', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_footer_bottom_cl_hover',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Footer Bottom Color(Hover)', 'tracem' ),
                    'default'       => sanitize_hex_color( '#eee' ),
                    'dependency'    => array( 'tracem_is_footer_bottom', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_footer_bottom_border_cl',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Footer Border Color', 'tracem' ),
                    'default'       => sanitize_hex_color( '#232323' ),
                    'dependency'    => array( 'tracem_is_footer_bottom', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_is_footer_bottom_container',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Footer Container', 'tracem' ),
                    'default'       => true,
                    'dependency'    => array( 'tracem_is_footer_bottom', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_footer_copyright',
                    'type'          => 'textarea',
                    'title'         => esc_html__( 'Footer Copyright', 'tracem' ),
                    'dependency'    => array( 'tracem_is_footer_bottom', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_footer_slogan',
                    'type'          => 'textarea',
                    'title'         => esc_html__( 'Footer Slogan', 'tracem' ),
                    'dependency'    => array( 'tracem_is_footer_bottom', '==', 'true' )
                ),

                array(
                    'id'                => 'tracem_footer_socials',
                    'type'              => 'group',
                    'title'             => esc_html__( 'Social Profile', 'tracem' ),
                    'button_title'      => esc_html__( 'Add New', 'tracem' ),
                    'dependency'        => array( 'tracem_is_footer_bottom', '==', 'true' ),
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

            ),
        ),

    )
);