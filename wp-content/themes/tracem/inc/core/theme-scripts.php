<?php
/**
 * Tracem Scripts File
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */


if( ! function_exists( 'tracem_enqueue_styles' ) ) {
	/*
	 * Tracem Enqueue Style
	 */
	function tracem_enqueue_styles() {
		global $tracem_version;

		// Base Stylesheet for WordPress
		wp_enqueue_style( 'tracem-style', get_stylesheet_uri() );

		$css_vendors = apply_filters( 'tracem_css_vendors', array(
			'normalize'			=> 'normalize.css',
			'flashy'			=> 'flashy.min.css',
			'animate'			=> 'animate.css',
			'tracem-base'		=> 'base.css',
			'tracem-uncover'	=> 'uncover.css',
			'fontawesome'		=> 'fontawesome.min.css',
			'themify'			=> 'themify-icons.css',
			'bootstrap'			=> 'bootstrap.min.css',
			'tracem-reset'		=> 'reset.css',
			'tracem-styles'		=> 'styles.css',
			'tracem'			=> 'tracem.css',
			'tracem-responsive'	=> 'responsive.css',
		) );

		foreach( $css_vendors as $handle => $source ) {
			wp_enqueue_style( $handle, get_theme_file_uri( 'css/' . $source ), false, $tracem_version, 'all' );
		}

		wp_deregister_style( 'elementor-animations' );
	}
}


if( ! function_exists( 'tracem_enqueue_scripts' ) ) {
	/*
	 * Tracem Enqueue Scripts
	 */
	function tracem_enqueue_scripts() {
		global $tracem_version;

		$js_vendors = apply_filters( 'tracem_js_vendors', array(
			'bootstrap'						=> 'bootstrap.min.js',
			'tracem-uncover'				=> 'uncover.js',
			'flashy'						=> 'jquery.flashy.min.js',
			'vide'							=> 'jquery.vide.min.js',
			'tracem-search'					=> 'tracem-search.js',
			'easings'						=> 'jquery.easings.min.js',
			'slinky'						=> 'slinky.min.js',
			'swiper'						=> 'swiper.min.js',
			'counterup'						=> 'counterup.js',
			'waypoints'						=> 'waypoints.min.js',
			'pie-chart'						=> 'pie-chart.min.js',
			'progressbar'					=> 'progressbar.min.js',
			'wow'							=> 'wow.min.js',
			'appear'						=> 'appear.js',
			'tracem-app'					=> 'app.js',
			'tracem-navigation'				=> 'navigation.js',
			'tracem-skip-link-focus-fix'	=> 'skip-link-focus-fix.js',
		) );

		/*
		 * Comment Enqueue
		 */
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		foreach( $js_vendors as $handle => $source ) {
			wp_enqueue_script( $handle, get_theme_file_uri( 'js/' . $source ), array('jquery'), $tracem_version, true );
		}

	}
}


if( ! function_exists( 'tracem_scripts' ) ) {
	/**
	 * Enqueue scripts and styles.
	 */
	function tracem_scripts() {
		// Enqueue Style
		tracem_enqueue_styles();
		// Enqueue Scripts
		tracem_enqueue_scripts();
	}
}

function tracem_defer_scripts( $tag, $handle, $src ) {
  $defer = array( 
    'bootstrap',
    'isotope',
    'multiscroll',
    'tracem-uncover',
    'tracem-demo3',
    'flashy',
    'vide',
    'tracem-search',
    'easings',
    'slinky',
    'swiper',
    'counterup',
    'waypoints',
    'pie-chart',
    'progressbar',
    'wow',
    'appear',
    'tracem-app',
    'tracem-navigation',
    'tracem-skip-link-focus-fix'
  );
  if ( in_array( $handle, $defer ) ) {
     return '<script defer src="' . $src . '"></script>' . "\n";
  }
    
    return $tag;
} 
add_filter( 'script_loader_tag', 'tracem_defer_scripts', 10, 3 );



if( ! function_exists( 'tracem_admin_enqueue_styles' ) ) {
	/*
	 * tracem Enqueue Style
	 */
	function tracem_admin_enqueue_styles() {
		global $tracem_version;

		wp_enqueue_style( 'tracem-admin-style', get_theme_file_uri( 'css/admin-style.css' ), false, $tracem_version, 'all' );

	}
}