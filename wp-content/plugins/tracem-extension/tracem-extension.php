<?php
/**
 * Plugin Name: Tracem Extension
 * Plugin URI: https://themeforest.net/user/themestrace
 * Description: This plugin is for portfolio. Tracem Extension Plugin will only works with tracem theme.
 * Author: ThemesTrace
 * Author URI: https://themeforest.net/user/themestrace
 * Version: 1.0.0
 * Text Domain: tracem
 */


/**
 * Portfolio Post Type
 */

if( ! class_exists( 'Tracem_Portfolio' ) ) :
class Tracem_Portfolio {
	public static $post_type 		= 'portfolio';
	public static $menu_position 	= 8;
    public static $category 		= 'portfolio_category';
    public static $tag 				= 'portfolio_tag';

	public static function register() {

		$labels = array(
			'name'					=> esc_html__( 'Portfolio', 					'tracem' ),
			'singular_name'			=> esc_html__( 'Portfolio', 					'tracem' ),
			'menu_name'				=> esc_html__( 'Portfolio', 					'tracem' ),
			'name_admin_bar'		=> esc_html__( 'Portfolio', 					'tracem' ),
			'add_new'				=> esc_html__( 'Add New', 						'tracem' ),
			'add_new_item'			=> esc_html__( 'Add New', 						'tracem' ),
			'new_item'				=> esc_html__( 'New Portfolio', 				'tracem' ),
			'edit_item'				=> esc_html__( 'Edit Portfolio', 				'tracem' ),
			'view_item'				=> esc_html__( 'View Portfolio', 				'tracem' ),
			'all_items'				=> esc_html__( 'Portfolio', 					'tracem' ),
			'search_items'			=> esc_html__( 'Search Portfolio', 				'tracem' ),
			'parent_item_colon'		=> '',
			'featured_image'		=> esc_html__( 'Portfolio Image', 				'tracem' ),
			'set_featured_image'	=> esc_html__( 'Set Portfolio Image', 			'tracem' ),
			'remove_featured_image'	=> esc_html__( 'Remove Portfolio Image', 		'tracem' ),
			'use_featured_image'	=> esc_html__( 'Use Portfolio Image', 			'tracem' ),
			'not_found'				=> esc_html__( 'No Portfolio found', 			'tracem' ),
			'not_found_in_trash'	=> esc_html__( 'No Portfolio found in Trash', 	'tracem' )
		);

		$args = array(
			'labels'				=> $labels,
			'description'			=> esc_html__( 'Add New Portfolio from here', 'tracem' ),
			'public'				=> true,
			'public_queryable'		=> true,
			'show_ui'				=> true,
			'show_in_menu'			=> true,
			'query_var'				=> true,
			'rewrite'				=> array( 'slug' => self::$post_type ),
			'capability_type'		=> 'post',
			'has_archive'			=> true,
			'hierarchical'			=> false,
			'menu_position'			=> self::$menu_position,
			'menu_icon'				=> 'dashicons-portfolio',
			'supports'				=> array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt' )
		);

		$args = apply_filters( 'presscore_post_type_' . self::$post_type . '_args' , $args );

		register_post_type( self::$post_type, $args );
		flush_rewrite_rules();

        /*
         * Category
         */
        $category_labels = array(
	        'name'             => esc_html__( 'Portfolio Categories',        'tracem' ),
	        'singular_name'    => esc_html__( 'Portfolio Category',          'tracem' ),
	        'all_items'        => esc_html__( 'Portfolio Categories',        'tracem' ),
	        'parent_item'      => esc_html__( 'Parent Portfolio Category',   'tracem' ),
	        'parent_item_colon'=> esc_html__( 'Parent Portfolio Category:',  'tracem' ),
	        'edit_item'        => esc_html__( 'Edit Portfolio Category',     'tracem' ), 
	        'update_item'      => esc_html__( 'Update Portfolio Category',   'tracem' ),
	        'add_new_item'     => esc_html__( 'Add New Portfolio Category',  'tracem' ),
	        'new_item_name'    => esc_html__( 'New Portfolio Category Name', 'tracem' ),
	        'menu_name'        => esc_html__( 'Portfolio Categories',        'tracem' )
        );

        $category_args = array(
            'hierarchical'          => true,
            'public'                => true,
            'labels'                => $category_labels,
            'show_ui'               => true,
            'rewrite'               => array( 'slug' => 'portfolio_category' ),
            'show_admin_column'		=> true,
        );

        $category_args = apply_filters( 'presscore_taxonomy_' . self::$category . '_args', $category_args );
        register_taxonomy( self::$category, array( self::$post_type ), $category_args );

        /*
         * Tags
         */
        $tags_labels = array(
	        'name'             => esc_html__( 'Portfolio Tags',        	'tracem' ),
	        'singular_name'    => esc_html__( 'Portfolio Tag',          'tracem' ),
	        'all_items'        => esc_html__( 'Portfolio Tags',        	'tracem' ),
	        'parent_item'      => esc_html__( 'Parent Portfolio Tag',   'tracem' ),
	        'parent_item_colon'=> esc_html__( 'Parent Portfolio Tag:',  'tracem' ),
	        'edit_item'        => esc_html__( 'Edit Portfolio Tag',     'tracem' ), 
	        'update_item'      => esc_html__( 'Update Portfolio Tag',   'tracem' ),
	        'add_new_item'     => esc_html__( 'Add New Portfolio Tag',  'tracem' ),
	        'new_item_name'    => esc_html__( 'New Portfolio Tag Name', 'tracem' ),
	        'menu_name'        => esc_html__( 'Portfolio Tags',        	'tracem' )
        );

        $tag_args = array(
            'hierarchical'          => true,
            'public'                => true,
            'labels'                => $tags_labels,
            'show_ui'               => true,
            'rewrite'               => array( 'slug' => 'portfolio_tag' ),
            'show_admin_column'		=> true,
        );

        $tag_args = apply_filters( 'presscore_taxonomy_' . self::$tag . '_args', $tag_args );
        register_taxonomy( self::$tag, array( self::$post_type ), $tag_args );

	}
}
endif;


/**
 * Team Post Type
 */

if( ! class_exists( 'Tracem_Team' ) ) :
class Tracem_Team {
	public static $post_type 		= 'team';
	public static $menu_position 	= 9;

	public static function register() {

		$labels = array(
			'name'					=> esc_html__( 'Team', 							'tracem' ),
			'singular_name'			=> esc_html__( 'Team', 							'tracem' ),
			'menu_name'				=> esc_html__( 'Team', 							'tracem' ),
			'name_admin_bar'		=> esc_html__( 'Team', 							'tracem' ),
			'add_new'				=> esc_html__( 'Add New', 						'tracem' ),
			'add_new_item'			=> esc_html__( 'Add New', 						'tracem' ),
			'new_item'				=> esc_html__( 'New Team', 						'tracem' ),
			'edit_item'				=> esc_html__( 'Edit Team', 					'tracem' ),
			'view_item'				=> esc_html__( 'View Team', 					'tracem' ),
			'all_items'				=> esc_html__( 'Teams', 						'tracem' ),
			'search_items'			=> esc_html__( 'Search Team Member', 			'tracem' ),
			'parent_item_colon'		=> '',
			'featured_image'		=> esc_html__( 'Team Member Image', 			'tracem' ),
			'set_featured_image'	=> esc_html__( 'Set Team Member Image', 		'tracem' ),
			'remove_featured_image'	=> esc_html__( 'Remove Team Member Image', 		'tracem' ),
			'use_featured_image'	=> esc_html__( 'Use Team Member Image', 		'tracem' ),
			'not_found'				=> esc_html__( 'No Team Member found', 			'tracem' ),
			'not_found_in_trash'	=> esc_html__( 'No Team Member found in Trash', 'tracem' )
		);

		$args = array(
			'labels'				=> $labels,
			'description'			=> esc_html__( 'Add New Team Member from here', 'tracem' ),
			'public'				=> true,
			'public_queryable'		=> true,
			'show_ui'				=> true,
			'show_in_menu'			=> true,
			'query_var'				=> true,
			'rewrite'				=> array( 'slug' => self::$post_type ),
			'capability_type'		=> 'post',
			'has_archive'			=> true,
			'hierarchical'			=> false,
			'menu_position'			=> self::$menu_position,
			'menu_icon'				=> 'dashicons-groups',
			'supports'				=> array( 'title', 'thumbnail' )
		);

		$args = apply_filters( 'presscore_post_type_' . self::$post_type . '_args' , $args );

		register_post_type( self::$post_type, $args );
		flush_rewrite_rules();
	}
}
endif;

/**
 * Register Post Type
 */
if ( ! function_exists( 'is_plugin_active' ) )
     require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

if( ! function_exists( 'Tracem_Extension_Init' ) ) :

	function Tracem_Extension_Init() {

		if( is_plugin_active( 'tracem-extension/tracem-extension.php' ) ) {
			Tracem_Portfolio::register();
			Tracem_Team::register();
		}
	}

endif;

add_action( 'init', 'Tracem_Extension_Init', 10 );