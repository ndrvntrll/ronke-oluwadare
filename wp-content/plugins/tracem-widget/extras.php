<?php
/**
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

if( ! function_exists( 'tracem_custom_widget_register' ) ) {
	/*
	 * Tracem Custom Widget Register
	 */
	function tracem_custom_widget_register() {
		register_widget( 'Tracem_Widget_About' );
	}
}