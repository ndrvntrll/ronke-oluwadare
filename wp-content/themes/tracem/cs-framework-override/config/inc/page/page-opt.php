<?php
/**
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */


$options[]   = array(
    'id'        => '_tracem_page_header_options',
    'title'     => esc_html__( 'Page Extra Options', 'tracem' ),
    'post_type' => array( 'page', 'portfolio' ),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

        array(
            'name'      => 'tracem_header_style',
            'title'     => esc_html__( 'Header Style', 'tracem' ),
            'icon'      => 'fas fa-heading',
            'fields'    => array(

                array(
                    'id'            => 'tracem_is_page_menu',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Page Menu On/Off', 'tracem' ),
                    'default'       => false
                ),

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
                    'default'       => 'v1',
                    'dependency'    => array( 'tracem_is_page_menu', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_is_header_logo',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Page Header Logo On/Off', 'tracem' ),
                    'default'       => false,
                    'dependency'    => array( 'tracem_is_page_menu', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_header_logo',
                    'type'          => 'image',
                    'title'         => esc_html__( 'Header Logo', 'tracem' ),
                    'dependency'    => array( 'tracem_is_page_menu|tracem_is_header_logo', '==|==', 'true|true' )
                ),

                array(
                    'id'            => 'tracem_retina_header_logo',
                    'type'          => 'image',
                    'title'         => esc_html__( 'Header Logo(Retina)', 'tracem' ),
                    'dependency'    => array( 'tracem_is_page_menu|tracem_is_header_logo', '==|==', 'true|true' )
                ),

                array(
                    'id'            => 'tracem_is_transparent_menu',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Transparent Menu On/Off', 'tracem' ),
                    'default'       => false,
                    'dependency'    => array( 'tracem_is_page_menu', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_is_white_menu',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'White Menu On/Off', 'tracem' ),
                    'default'       => false,
                    'dependency'    => array( 'tracem_is_page_menu', '==', 'true' )
                ),

            ),
        ),

        array(
            'name'      => 'tracem_page_header',
            'title'     => esc_html__( 'Page Header', 'tracem' ),
            'icon'      => 'fas fa-ellipsis-h',
            'fields'    => array(

                array(
                    'id'            => 'tracem_page_header_activate',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Page Header Activate?', 'tracem' ),
                    'default'       => 'true'
                ),


                /*
                 * Breadcrumb Options
                 */
                array(
                    'type'          => 'subheading',
                    'content'       => esc_html__( 'Breadcrumb', 'tracem' ),
                    'dependency'    => array( 'tracem_page_header_activate', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_is_page_header',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Breadcrumb On/Off', 'tracem' ),
                    'dependency'    => array( 'tracem_page_header_activate', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_is_page_header_container',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Page Header Container', 'tracem' ),
                    'default'       => true,
                    'dependency'    => array( 'tracem_is_page_header|tracem_page_header_activate', '==|==', 'true|true' )
                ),

                array(
                    'id'            => 'tracem_page_header_image',
                    'type'          => 'image',
                    'title'         => esc_html__( 'Breadcrumb Image', 'tracem' ),
                    'dependency'    => array( 'tracem_is_page_header|tracem_page_header_activate', '==|==', 'true|true' )
                ),

                array(
                    'id'            => 'tracem_page_header_video',
                    'type'          => 'text',
                    'title'         => esc_html__( 'Breadcrumb Video', 'tracem' ),
                    'dependency'    => array( 'tracem_is_page_header|tracem_page_header_activate', '==|==', 'true|true' )
                ),

                array(
                    'id'            => 'tracem_page_header_overlay',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Breadcrumb Overlay Color', 'tracem' ),
                    'dependency'    => array( 'tracem_is_page_header|tracem_page_header_activate', '==|==', 'true|true' ),
                    'default'       => 'rgba(254,250,241, .1)',
                    'rgba'          => true
                ),

            )
        ),

        array(

            'name'      => 'tracem_page_footer',
            'title'     => esc_html__( 'Page Footer', 'tracem' ),
            'icon'      => 'fab fa-nintendo-switch',
            'fields'    => array(

                array(
                    'id'            => 'tracem_is_page_footer_activate',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Page Footer Activate?', 'tracem' ),
                    'default'       => false
                ),

                /*
                 * Footer top Options
                 */
                array(
                    'type'          => 'subheading',
                    'content'       => esc_html__( 'Footer Top', 'tracem' ),
                    'dependency'    => array( 'tracem_is_page_footer_activate', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_is_footer_top',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Top Footer On/Off', 'tracem' ),
                    'dependency'    => array( 'tracem_is_page_footer_activate', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_is_footer_top_container',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Footer Container', 'tracem' ),
                    'default'       => false,
                    'dependency'    => array( 'tracem_is_footer_top|tracem_is_page_footer_activate', '==|==', 'true|true' )
                ),

                array(
                    'id'            => 'tracem_footer_top_bgc',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Footer Top Background', 'tracem' ),
                    'dependency'    => array( 'tracem_is_footer_top|tracem_is_page_footer_activate', '==|==', 'true|true' ),
                    'default'       => sanitize_hex_color( '#121212' )
                ),

                array(
                    'id'            => 'tracem_footer_top_cl',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Footer Top Color', 'tracem' ),
                    'dependency'    => array( 'tracem_is_footer_top|tracem_is_page_footer_activate', '==|==', 'true|true' ),
                    'default'       => sanitize_hex_color( '#aaa' )
                ),

                array(
                    'id'            => 'tracem_footer_top_cl_hover',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Footer Top Color(Hover)', 'tracem' ),
                    'dependency'    => array( 'tracem_is_footer_top|tracem_is_page_footer_activate', '==|==', 'true|true' ),
                    'default'       => sanitize_hex_color( '#eee' )
                ),

                array(
                    'id'            => 'tracem_is_parallax_footer',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Parallax Footer On/Off', 'tracem' ),
                    'dependency'    => array( 'tracem_is_page_footer_activate|tracem_is_footer_top', '==|==', 'true|true' )
                ),

                /*
                 * Footer bottom Options
                 */
                array(
                    'type'          => 'subheading',
                    'content'       => esc_html__( 'Footer Bottom', 'tracem' ),
                    'dependency'    => array( 'tracem_is_page_footer_activate', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_is_footer_bottom',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Footer Bottom On/Off', 'tracem' ),
                    'dependency'    => array( 'tracem_is_page_footer_activate', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_is_footer_bottom_container',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Footer Container', 'tracem' ),
                    'default'       => true,
                    'dependency'    => array( 'tracem_is_page_footer_activate|tracem_is_footer_bottom', '==|==', 'true|true' )
                ),

                array(
                    'id'            => 'tracem_footer_bottom_bgc',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Footer Bottom Background', 'tracem' ),
                    'default'       => sanitize_hex_color( '#121212' ),
                    'dependency'    => array( 'tracem_is_page_footer_activate|tracem_is_footer_bottom', '==|==', 'true|true' )
                ),

                array(
                    'id'            => 'tracem_footer_bottom_cl',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Footer Bottom Color', 'tracem' ),
                    'default'       => sanitize_hex_color( '#aaa' ),
                    'dependency'    => array( 'tracem_is_page_footer_activate|tracem_is_footer_bottom', '==|==', 'true|true' )
                ),

                array(
                    'id'            => 'tracem_footer_bottom_cl_hover',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Footer Bottom Color(Hover)', 'tracem' ),
                    'default'       => sanitize_hex_color( '#eee' ),
                    'dependency'    => array( 'tracem_is_page_footer_activate|tracem_is_footer_bottom', '==|==', 'true|true' )
                ),

                array(
                    'id'            => 'tracem_footer_bottom_border_cl',
                    'type'          => 'color_picker',
                    'title'         => esc_html__( 'Footer Border Color', 'tracem' ),
                    'default'       => sanitize_hex_color( '#232323' ),
                    'dependency'    => array( 'tracem_is_page_footer_activate|tracem_is_footer_bottom', '==|==', 'true|true' )
                ),

            )
        )

    ),
);