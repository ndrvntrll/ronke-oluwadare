<?php
namespace TracemShortcode\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Tracem Portfolio Shortcode
 *
 * Elementor widget for Tracem Shortcode
 *
 * @since 1.0.0
 */

class Tracem_Portfolio extends \Elementor\Widget_Base {

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
		return 'tracem-portfolio';
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
		return __( 'Portfolio', 'tracem' );
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
		return 'eicon-gallery-justified';
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
		return [ 'tracem-portfolio' ];
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
			'section_content',
			[
				'label'			=> __( 'Tracem Portfolio', 'tracem' ),
			]
		);

		$this->add_control(
			't_portfolio_type',
			[
				'label'			=> __( 'Portfolio Type', 'tracem' ),
				'type'			=> Controls_Manager::SELECT,
				'description'	=> __( 'Sometimes live preview may create some issues but on the front end, it should okay. After making any changes, please see on the front end.', 'tracem' ),
				'options'		=> [
					'portfolio-grid'		=> __( 'Portfolio - Grid', 'tracem' ),
					'portfolio-masonry'		=> __( 'Portfolio - Masonry', 'tracem' ),
					'portfolio-pinterest'	=> __( 'Portfolio - Pinterest', 'tracem' ),
					'portfolio-metro'		=> __( 'Portfolio - Metro', 'tracem' ),
					'portfolio-sporadic'	=> __( 'Portfolio - Sporadic', 'tracem' ),
					'portfolio-parallax'	=> __( 'Portfolio - Parallax', 'tracem' )
				]
			]
		);

		// Options only for portfolio grid
		$this->add_control(
			'portfolio_column',
			[
				'label'			=> __( 'Portfolio Column', 'tracem' ),
				'type'			=> Controls_Manager::SELECT,
				'options'		=> [
					'6'		=> __( '2', 'tracem' ),
					'4'		=> __( '3', 'tracem' ),
					'3'		=> __( '4', 'tracem' ),
				],
				'default'				=> '4',
				'condition'				=> [
					't_portfolio_type'	=> [
						'portfolio-grid'
					],
				]
			]
		);

		$this->add_control(
			'portfolio_hover_types',
			[
				'label'			=> __( 'Hover Type', 'tracem' ),
				'type'			=> Controls_Manager::SELECT,
				'options'		=> [
					'default'		=> __( 'Default Hover', 'tracem' ),
					'opacity'		=> __( 'Opacity Hover', 'tracem' ),
					'link-reveal'	=> __( 'Link Reveal', 'tracem' ),
					'boxed'			=> __( 'Boxed', 'tracem' ),
					'boxed-large'	=> __( 'Boxed Large', 'tracem' ),
					'boxed-reveal'	=> __( 'Boxed Reveal', 'tracem' )
				],
				'condition'				=> [
					't_portfolio_type'	=> [
						'portfolio-grid',
						'portfolio-masonry',
						'portfolio-pinterest',
						'portfolio-metro',
						'portfolio-sporadic'
					],
				],
				'default'				=> 'opacity'
			]
		);

		$this->add_control(
			'post_count',
			[
				'label'			=> __( 'Post Count', 'tracem' ),
				'type'			=> Controls_Manager::NUMBER,
				'default'		=> __( '-1', 'tracem' ),
				'description'	=> __( '-1 is for all posts', 'tracem' ),
				'placeholder'	=> __( 'How many posts want to display', 'tracem' )
			]
		);

		$this->add_control(
			'order',
			[
				'label'			=> __( 'Order', 'tracem' ),
				'type'			=> Controls_Manager::SELECT,
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
				'type'			=> Controls_Manager::SELECT,
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
			'show_tag_filter',
			[
				'label' 			=> __( 'Show Tag Filter?', 'tracem' ),
				'type' 				=> \Elementor\Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'is_lightbox',
			[
				'label' 			=> __( 'Show Lightbox?', 'tracem' ),
				'type' 				=> \Elementor\Controls_Manager::SWITCHER,
				'condition'				=> [
					'portfolio_hover_types'	=> [
						'default',
					],
				],
			]
		);

		$tag_lists 		= get_terms( 'portfolio_tag' );
		$tag_in_slider 	= [];
		foreach( $tag_lists as $tag_list ) {
			$tag_in_slider[ 'none' ] = ucwords( str_replace( '_', ' ', 'Select Options' ) );
			$tag_in_slider[ $tag_list->slug ] = ucwords( str_replace( '_', ' ', $tag_list->name ) );
		}
		$this->add_control(
			'tag_in_slider',
			[
				'label'			=> __( 'Slider Filter Tag', 'tracem' ),
				'type'			=> \Elementor\Controls_Manager::SELECT,
				'options'		=> $tag_in_slider,
				'condition'				=> [
					'show_tag_filter'	=> [
						'yes'
					],
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'portfolio_style',
			[
				'label'		=> __( 'Portfolio Style', 'tracem' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'padding',
			[
				'label' 		=> __( 'Padding', 'tracem' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tracem-portfolio-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
		$settings 	= $this->get_settings();


		$tax_query = '';

		if( $settings['show_tag_filter'] == 'yes' ) {
			$tax_query 		= array(
				array(
					'taxonomy' 	=> 'portfolio_tag',
					'field'    	=> 'slug',
					'terms'    	=> $settings['tag_in_slider'],
				)
			);
		}
		$args 		= array(
			'post_type'			=> 'portfolio',
			'posts_per_page'	=> $settings['post_count'],
			'post_status'		=> 'publish',
			'order'				=> $settings['order'],
			'orderby'			=> $settings['orderby'],
			'tax_query' 		=> $tax_query
		);


		$portfolio 	= new \WP_Query( $args );

		if( $portfolio->have_posts() ) {

			$tracem_plugin_dir = plugin_dir_path( __FILE__ ) . 'inc/';

			if ( $settings['t_portfolio_type'] ) {
				include( $tracem_plugin_dir . $settings['t_portfolio_type'] . '.php' );
			}

	    }
	}
}