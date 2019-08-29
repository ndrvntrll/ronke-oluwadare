<?php
/**
 * Tracem CS Framework Backup Options
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
	'name'     => 'backup_section',
	'title'    => esc_html__( 'Backup', 'tracem' ),
	'icon'     => 'fas fa-shield-alt',
	'fields'   => array(

		array(
			'type'    => 'notice',
			'class'   => 'warning',
			'content' => esc_html__( 'You can save your current options. Download a Backup and Import.', 'tracem' ),
		),

		array(
			'type'    => 'backup',
		),

	)
);