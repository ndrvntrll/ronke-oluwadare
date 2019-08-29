<?php
/**
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themestrace.com
 * @version 1.0.0
 * @since 1.0.0
 */

$options[]   = array(
    'id'        => '_tracem_portfolio_options',
    'title'     => esc_html__( 'Portfolio Extra Options', 'tracem' ),
    'post_type' => 'portfolio',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(
        array(
            'name'      => 'tracem_portfolio',
            'title'     => esc_html__( 'Portfolio Options', 'tracem' ),
            'fields'    => array(

		        array(
		            'id'                  => 'tracem_portfolio_xtra_title',
		            'type'                => 'text',
		            'title'               => esc_html__( 'Extra Title', 'tracem' )
		        ),

                array(
                    'id'                  => 'tracem_portfolio_custom_title',
                    'type'                => 'text',
                    'title'               => esc_html__( 'Custom Link', 'tracem' )
                ),

                array(
                    'id'                  => 'tracem_portfolio_link_window',
                    'type'                => 'select',
                    'title'               => esc_html__( 'Open In?', 'tracem' ),
                    'options'               => array(
                        '_blank'            => esc_html__( 'Blank Window', 'tracem' ),
                        '_self'             => esc_html__( 'Self Window', 'tracem' )
                    ),
                    'desc'                => esc_html__( 'Self will redirect the page and Blank will open a new tab', 'tracem' ),
                    'default'             => '_self'
                ),

                array(
                    'id'                    => 'tp_xtra_images',
                    'type'                  => 'gallery',
                    'title'                 => esc_html__( 'Portfolio Additional Images', 'tracem' ),
                    'add_title'             => esc_html__( 'Add Portfolio', 'tracem' ),
                    'edit_title'            => esc_html__( 'Edit Portfolio', 'tracem' ),
                    'clear_title'           => esc_html__( 'Remove Portfolio', 'tracem' )
                ),

                array(
                    'id'                    => 'tracem_single_port_infos',
                    'type'                  => 'group',
                    'title'                 => esc_html__( 'Portfolio Details', 'tracem' ),
                    'button_title'          => esc_html__( 'Add New Details', 'tracem' ),
                    'accordion_title'       => esc_html__( 'Add New Info', 'tracem' ),
                    'fields'                => array(
                        
                        array(
                            'id'            => 'heading',
                            'type'          => 'text',
                            'title'         => esc_html__( 'Portfolio Info Heading', 'tracem' )
                        ),

                        array(
                            'id'            => 'info',
                            'type'          => 'text',
                            'title'         => esc_html__( 'Portfolio Info Details', 'tracem' )
                        )
                    )
                ),

                array(
                    'id'            => 'tracem_is_page_portfolio',
                    'type'          => 'switcher',
                    'title'         => esc_html__( 'Single Portfolio Style On/Off', 'tracem' ),
                    'default'       => false
                ),

                array(
                    'id'            => 'tracem_portfolio_select',
                    'type'          => 'image_select',
                    'title'         => esc_html__( 'Portfolio Select', 'tracem' ),
                    'options'       => array(
                        '1'         => get_theme_file_uri( 'inc/images/portfolio/portfolio-v1.png' ),
                        '2'         => get_theme_file_uri( 'inc/images/portfolio/portfolio-v2.png' )
                    ),
                    'default'       => '1',
                    'dependency'    => array( 'tracem_is_page_portfolio', '==', 'true' )
                ),

                array(
                    'id'            => 'tracem_portfolio_masonary_dimension',
                    'type'          => 'select',
                    'options'       => array(
                        'default-width-height'      => esc_html__( 'Default', 'tracem' ),
                        'large-width'               => esc_html__( 'Large Width', 'tracem' ),
                        'large-height'              => esc_html__( 'Large Height', 'tracem' ),
                        'large-width-height'        => esc_html__( 'Large Width Height', 'tracem' )
                    ),
                    'title'         => esc_html__( 'Dimension for Masonary', 'tracem' ),
                    'desc'          => esc_html__( 'Choose image size when it appears in Masonary Portfolio', 'tracem' )
                ),

                array(
                    'id'                  => 'tracem_portfolio_video_url',
                    'type'                => 'text',
                    'title'               => esc_html__( 'Video URL', 'tracem' ),
                    'desc'                => esc_html__( 'Upload a video from media and paste the url here', 'tracem' )
                ),
            )
        )
    ),
);