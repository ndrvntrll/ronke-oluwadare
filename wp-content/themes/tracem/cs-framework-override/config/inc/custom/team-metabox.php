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
    'id'        => '_tracem_team_options',
    'title'     => esc_html__( 'Team Extra Options', 'tracem' ),
    'post_type' => 'team',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(
        array(
            'name'      => 'tracem_team',
            'title'     => esc_html__( 'Team Options', 'tracem' ),
            'fields'    => array(

		        array(
		            'id'                  => 'tracem_team_member_designation',
		            'type'                => 'text',
		            'title'               => esc_html__( 'Designation', 'tracem' )
		        ),

                array(
                    'id'                  => 'tracem_team_member_socials',
                    'type'                => 'group',
                    'title'               => esc_html__( 'Social Profile', 'tracem' ),
                    'button_title'        => esc_html__( 'Add New Social', 'tracem' ),
                    'accordion_title'     => esc_html__( 'Add New Info', 'tracem' ),
                    'fields'              => array(
                        
                        array(
                            'id'          => 'icon',
                            'type'        => 'icon',
                            'title'       => esc_html__( 'Social Icon', 'tracem' )
                        ),

                        array(
                            'id'          => 'url',
                            'type'        => 'text',
                            'title'       => esc_html__( 'Social URL', 'tracem' )
                        )
                    )
                ),
            )
        )
    ),
);