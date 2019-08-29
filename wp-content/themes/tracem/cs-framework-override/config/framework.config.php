<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => esc_html__( 'Tracem', 'tracem' ),
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'menu_slug'		=> 'tracem',
  'menu_position'	=> 3,
  'framework_title' => wp_kses_post( 'Tracem Options <small>by ThemesTrace</small>', 'tracem' ),
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================

$options        = array();

define( 'TRACEM_CS_OPTIONS', 'cs-framework-override/config/inc/theme-options/options' );

require get_parent_theme_file_path( TRACEM_CS_OPTIONS . '/header-options.php' );
require get_parent_theme_file_path( TRACEM_CS_OPTIONS . '/preloader-options.php' );
require get_parent_theme_file_path( TRACEM_CS_OPTIONS . '/typography-options.php' );
require get_parent_theme_file_path( TRACEM_CS_OPTIONS . '/blog-options.php' );
require get_parent_theme_file_path( TRACEM_CS_OPTIONS . '/portfolio-options.php' );
require get_parent_theme_file_path( TRACEM_CS_OPTIONS . '/404-options.php' );
require get_parent_theme_file_path( TRACEM_CS_OPTIONS . '/footer-options.php' );
require get_parent_theme_file_path( TRACEM_CS_OPTIONS . '/backup-options.php' );

CSFramework::instance( $settings, $options );
