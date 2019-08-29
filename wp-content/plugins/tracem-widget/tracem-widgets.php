<?php
/*
Plugin Name: Tracem Widgets
Plugin URI: https://www.themestrace.com
Description: This plugin is for tracem widget. To run this plugin you have to install Codestar plugin first
Version: 1.0.0
Author: ThemesTrace
Author URI: https://themeforest.net/user/themestrace
Text Domain: tracem
*/

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

/**
 * Codestar Widget Init
 */
if( function_exists( 'cs_get_option' ) ) {
	include plugin_dir_path( __FILE__ ) . 'core/codestar-widget-config.php';
	include plugin_dir_path( __FILE__ ) . 'extras.php';
	include plugin_dir_path( __FILE__ ) . 'hooks.php';
	include plugin_dir_path( __FILE__ ) . 'widget/class-tracem-about-widget.php';
} // End CS GET OPTION check