<?php
namespace TracemShortcode\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Tracem_Contact
 *
 * Elementor widget for Shortcode
 *
 * @since 1.0.0
 */

class Tracem_Contact extends \Elementor\Widget_Base {

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
		return 'tracem-contact';
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
		return __( 'Contact', 'tracem' );
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
		return 'eicon-form-horizontal';
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
		return [ 'tracem-contact' ];
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
				'label'			=> __( 'Tracem Contact', 'tracem' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'contact_style',
			[
				'label'			=> __( 'Contact Style', 'tracem' ),
				'type'			=> \Elementor\Controls_Manager::SELECT,
				'options'		=> [
					'1'			=> __( 'Contact 01', 'tracem' ),
					'2'			=> __( 'Contact 02', 'tracem' ),
					'3'			=> __( 'Contact 03', 'tracem' )
				],
				'default'		=> '1'
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'info_title', [
				'label' 		=> __( 'Title', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'info', [
				'label' 		=> __( 'Info', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'informations',
			[
				'label' 		=> __( 'Informations', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls()
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon', [
				'label' 		=> __( 'Icon', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::ICON,
				'label_block' 	=> true
			]
		);

		$repeater->add_control(
			'url', [
				'label' 		=> __( 'URL', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true
			]
		);

		$this->add_control(
			'social_profiles',
			[
				'label' 		=> __( 'Social Profiles', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls()
			]
		);

		$this->add_control(
			'hr',
			[
				'type' 			=> \Elementor\Controls_Manager::DIVIDER,
				'style' 		=> 'thick',
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
			'contact-form-shortcode',
			[
				'label' 		=> __( 'Select Contact Form', 'tracem' ),
                'description' 	=> __( 'Contact form 7 - plugin must be installed and there must be some contact forms made with the contact form 7','tracem' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT2,
				'multiple' 		=> false,
				'options' 		=> tracem_get_contact_form_7_posts(),
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
		
		$tracem_plugin_dir = plugin_dir_path( __FILE__ ) . 'inc/';

		if ( $settings['contact_style'] ) {
			include( $tracem_plugin_dir . 'contact-' . $settings['contact_style'] . '.php' );
		}
	}
}