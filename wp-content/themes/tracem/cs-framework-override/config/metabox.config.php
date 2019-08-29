<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();

define( 'PAGE_VENDOR' , 'cs-framework-override/config/inc/page' );
define( 'CUSTOM_VENDOR' , 'cs-framework-override/config/inc/custom' );

// Page Metabox
require get_theme_file_path( PAGE_VENDOR . '/page-opt.php' );

// Custom Metabox
require get_theme_file_path( CUSTOM_VENDOR . '/portfolio-metabox.php' );
require get_theme_file_path( CUSTOM_VENDOR . '/team-metabox.php' );


CSFramework_Metabox::instance( $options );
