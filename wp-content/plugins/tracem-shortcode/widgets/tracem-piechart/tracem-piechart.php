<?php
namespace TracemShortcode\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Tracem_Piechart
 *
 * Elementor widget for Shortcode
 *
 * @since 1.0.0
 */

class Tracem_Piechart extends \Elementor\Widget_Base {

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
		return 'tracem-piechart';
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
		return __( 'Piechart', 'tracem' );
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
		return 'eicon-counter-circle';
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
		return [ 'tracem-piechart' ];
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
				'label'			=> __( 'Piechart', 'tracem' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'piechart_style',
			[
				'label'			=> __( 'Piechart Style', 'tracem' ),
				'type'			=> \Elementor\Controls_Manager::SELECT,
				'options'		=> [
					'1'			=> __( 'Piechart 01', 'tracem' ),
					'2'			=> __( 'Piechart 02', 'tracem' ),
					'3'			=> __( 'Piechart 03', 'tracem' )
				],
				'default'		=> '1'
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'number', [
				'label' 		=> __( 'Number', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'text', [
				'label' 		=> __( 'Text', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'piecharts',
			[
				'label' 		=> __( 'Pie Charts', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls()
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

		$this->add_control(
			'size', [
				'label' 		=> __( 'Size', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'width', [
				'label' 		=> __( 'Width', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::NUMBER
			]
		);

		$this->add_control(
			'tcolor', [
				'label' 		=> __( 'Track Color', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'barcolor', [
				'label' 		=> __( 'Bar Color', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR
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
		
		$tracem_plugin_dir = plugin_dir_path( __FILE__ ) . 'inc/';

		if ( $settings['piechart_style'] ) {
			include( $tracem_plugin_dir . 'piechart-' . $settings['piechart_style'] . '.php' );
		}
	}
}