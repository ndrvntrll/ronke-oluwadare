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
    'name'      => 'tracem_typography_options',
    'title'     => esc_html__( 'Typorgraphy', 'tracem' ),
    'icon'      => 'fa fa-font',
    'fields'    => array(

        array(
            'id'        => 'tracem_body_default_font_family',
            'type'      => 'typography',
            'title'     => esc_html__( 'Body Font Family - Default', 'tracem' ),
            'default'   => array(
                'family'    => 'FuturaPTBook',
            ),
            'variant'   => false
        ),

        array(
            'id'        => 'tracem_body_extra_font_family',
            'type'      => 'typography',
            'title'     => esc_html__( 'Body Font Family - Extra', 'tracem' ),
            'default'   => array(
                'family'    => 'FuturaPTMedium',
            ),
            'variant'   => false
        ),

        array(
            'id'        => 'tracem_body_font_size',
            'type'      => 'number',
            'title'     => esc_html__( 'Body Font Size', 'tracem' ),
            'default'   => '18',
            'after'     => wp_kses_post( '<i class="cs-text-muted"> (px)</i>', 'tracem' )
        ),

        array(
            'id'        => 'tracem_brand_color',
            'type'      => 'color_picker',
            'title'     => esc_html__( 'Brand Color', 'tracem' ),
            'default'   => sanitize_hex_color( '#3a0088' )
        ),

        array(
            'id'        => 'tracem_btn_opacity_color',
            'type'      => 'color_picker',
            'title'     => esc_html__( 'Button Opacity Background', 'tracem' ),
            'default'   => 'rgba( 58, 0, 136, 0.3 )'
        ),

    ),
);