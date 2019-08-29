<?php
/**
 * @package tracem
 * @author ThemesTrace
 * @link https://themestrace.com
 * @version 1.0.0
 * @since 1.0.0
 */

if( function_exists( 'cs_get_option' ) ) {
	add_action( 'widgets_init', 'tracem_custom_widget_register' );
}