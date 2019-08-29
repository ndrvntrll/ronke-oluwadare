<?php
namespace TracemShortcode\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Tracem_About
 *
 * Elementor widget for Shortcode
 *
 * @since 1.0.0
 */

class Tracem_About extends \Elementor\Widget_Base {

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
		return 'tracem-about';
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
		return __( 'About', 'tracem' );
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
		return 'eicon-thumbnails-half';
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
		return [ 'tracem-about' ];
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
				'label'			=> __( 'Tracem About', 'tracem' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'about_style',
			[
				'label'			=> __( 'About Style', 'tracem' ),
				'type'			=> \Elementor\Controls_Manager::SELECT,
				'options'		=> [
					'1'			=> __( 'About 01', 'tracem' ),
					'2'			=> __( 'About 02', 'tracem' ),
					'3'			=> __( 'About 03', 'tracem' )
				],
				'default'		=> '1'
			]
		);

		$this->add_control(
			'about_text', [
				'label' 		=> __( 'About Text', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition'		=> [
					'about_style'	=> '2'
				]
			]
		);

		$this->add_control(
			'about_text_bg', [
				'label' 		=> __( 'About Text Background', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'label_block' 	=> true,
				'selectors'		=> [
					'{{WRAPPER}} .about-text h2:before'	=> 'background-image: url({{URL}})'
				],
				'condition'		=> [
					'about_style'	=> '2'
				]
			]
		);

		$this->add_control(
			'experience_number', [
				'label' 		=> __( 'Experience Number', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::NUMBER,
				'label_block' 	=> true,
				'condition'		=> [
					'about_style'	=> '1'
				]
			]
		);

		$this->add_control(
			'experience_text', [
				'label' 		=> __( 'Experience Text', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition'		=> [
					'about_style'	=> '1'
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

		$this->add_control(
			'description', [
				'label' 		=> __( 'Description', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'btn_text', [
				'label' 		=> __( 'Button Text', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'btn_url', [
				'label' 		=> __( 'Button URL', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'about_image', [
				'label' 		=> __( 'About Image', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'label_block' 	=> true,
				'condition'		=> [
					'about_style'	=> '1'
				]
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
		
		$tracem_plugin_dir = plugin_dir_path( __FILE__ ) . 'inc';
		include( $tracem_plugin_dir . '/about-' . $settings['about_style'] . '.php' );
	}
}