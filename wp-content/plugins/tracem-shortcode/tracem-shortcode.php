<?php
/**
 * Plugin Name: Tracem Shortcode
 * Description: Tracem Shortcode Plugin will add some beautiful shortcode into Elementor Page Builder
 * Plugin URI:  https://themeforest.net/user/themestrace
 * Version:     1.0.1
 * Author:      ThemesTrace
 * Author URI:  https://themestrace.com/
 * Text Domain: tracem-shortcode
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'ELEMENTOR_HELLO_WORLD__FILE__', __FILE__ );

/**
 * Load Tracem Shortcode
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function tracem_shortcode_load() {
	// Load localization file
	load_plugin_textdomain( 'tracem-shortcode' );

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'tracem_shortcode_fail_load' );
		return;
	}

	// Check required version
	$elementor_version_required = '2.0.8';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'tracem_shortcode_fail_load_out_of_date' );
		return;
	}

	// Require the main plugin file
	require( __DIR__ . '/plugin.php' );
}
add_action( 'plugins_loaded', 'tracem_shortcode_load' );


function tracem_shortcode_fail_load_out_of_date() {
	if ( ! current_user_can( 'update_plugins' ) ) {
		return;
	}

	$file_path = 'elementor/elementor.php';

	$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
	$message = '<p>' . __( 'Tracem Shortcode is not working because you are using an old version of Elementor.', 'tracem-shortcode' ) . '</p>';
	$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'tracem-shortcode' ) ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}