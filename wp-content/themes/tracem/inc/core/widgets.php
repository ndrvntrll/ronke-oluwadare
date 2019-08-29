<?php
/**
 * Tracem Widget File
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tracem_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tracem' ),
		'id'            => 'tracem-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'tracem' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer one', 'tracem' ),
		'id'            => 'tracem-footer-one',
		'description'   => esc_html__( 'Add widgets here.', 'tracem' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="footer-navigation">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer two', 'tracem' ),
		'id'            => 'tracem-footer-two',
		'description'   => esc_html__( 'Add widgets here.', 'tracem' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="footer-navigation">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Subscription', 'tracem' ),
		'id'            => 'tracem-footer-subscription',
		'description'   => esc_html__( 'Add widgets here.', 'tracem' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="subscribe-area footer-navigation">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}