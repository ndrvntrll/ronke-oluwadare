<?php
/**
 * Tracem Core Hooks
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

// After Setup Theme
add_action( 'after_setup_theme', 'tracem_setup' );
add_action( 'after_setup_theme', 'tracem_content_width', 0 );

// Widgets
add_action( 'widgets_init', 'tracem_widgets_init' );

add_action( 'wp_enqueue_scripts', 'tracem_scripts' );

add_action( 'admin_enqueue_scripts', 'tracem_admin_enqueue_styles' );