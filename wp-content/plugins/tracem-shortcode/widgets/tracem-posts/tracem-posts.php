<?php
namespace TracemShortcode\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Tracem_Posts
 *
 * Elementor widget for Shortcode
 *
 * @since 1.0.0
 */

class Tracem_Posts extends \Elementor\Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'tracem-posts';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Posts', 'tracem' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-grid';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'tracem' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'tracem-posts' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label'			=> __( 'Posts', 'tracem' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'posts_style',
			[
				'label'			=> __( 'Posts Style', 'tracem' ),
				'type'			=> \Elementor\Controls_Manager::SELECT,
				'options'		=> [
					'1'			=> __( 'Post 01', 'tracem' ),
					'2'			=> __( 'Post 02', 'tracem' )
				],
				'default'		=> '1'
			]
		);

		$this->add_control(
			'post_count',
			[
				'label'			=> __( 'Post Count', 'tracem' ),
				'type'			=> \Elementor\Controls_Manager::NUMBER,
				'default'		=> __( '-1', 'tracem' ),
				'description'	=> __( '-1 is for all posts', 'tracem' ),
				'placeholder'	=> __( 'How many posts want to display', 'tracem' )
			]
		);

		$this->add_control(
			'order',
			[
				'label'			=> __( 'Order', 'tracem' ),
				'type'			=> \Elementor\Controls_Manager::SELECT,
				'options'		=> [
					'ASC'		=> __( 'ASC', 'tracem' ),
					'DESC'		=> __( 'DESC', 'tracem' )
				]
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'			=> __( 'Order By', 'tracem' ),
				'type'			=> \Elementor\Controls_Manager::SELECT,
				'options'		=> [
					'none'			=> __( 'None', 'tracem' ),
					'author'		=> __( 'Author', 'tracem' ),
					'title'			=> __( 'Title', 'tracem' ),
					'name'			=> __( 'Name', 'tracem' ),
					'type'			=> __( 'Type', 'tracem' ),
					'date'			=> __( 'Date', 'tracem' ),
					'modified'		=> __( 'Modified', 'tracem' ),
					'comment_count'	=> __( 'Comment Count', 'tracem' )
				]
			]
		);

		$this->add_control(
			'subtitle', [
				'label' 		=> __( 'Sub Title', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'title', [
				'label' 		=> __( 'Title', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'tracem_style',
			[
				'label'			=> __( 'Style', 'tracem' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings 		= $this->get_settings_for_display();

		$args 			= array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $settings['post_count'],
			'order'				=> $settings['order'],
			'orderby'			=> $settings['orderby'],
			'post_status'		=> 'publish'
		);

		$posts = new \WP_Query( $args );

		if( $posts->have_posts() ) {

			$tracem_plugin_dir = plugin_dir_path( __FILE__ ) . 'inc';

			include( $tracem_plugin_dir . '/posts-' . $settings['posts_style'] . '.php' );

		}
	}
}
