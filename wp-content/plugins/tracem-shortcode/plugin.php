<?php
namespace TracemShortcode;

use TracemShortcode\Widgets\Tracem_Slider;
use TracemShortcode\Widgets\Tracem_Hero;
use TracemShortcode\Widgets\Tracem_Portfolio;
use TracemShortcode\Widgets\Tracem_About;
use TracemShortcode\Widgets\Tracem_Team;
use TracemShortcode\Widgets\Tracem_Funfacts;
use TracemShortcode\Widgets\Tracem_Services;
use TracemShortcode\Widgets\Tracem_CTA;
use TracemShortcode\Widgets\Tracem_Coming_Soon;
use TracemShortcode\Widgets\Tracem_Maintenance;
use TracemShortcode\Widgets\Tracem_Contact;
use TracemShortcode\Widgets\Tracem_Testimonial;
use TracemShortcode\Widgets\Tracem_Blockquote;
use TracemShortcode\Widgets\Tracem_Subscribe;
use TracemShortcode\Widgets\Tracem_Clients;
use TracemShortcode\Widgets\Tracem_Pricing;
use TracemShortcode\Widgets\Tracem_Button;
use TracemShortcode\Widgets\Tracem_Posts;
use TracemShortcode\Widgets\Tracem_Piechart;
use TracemShortcode\Widgets\Tracem_Progressbar;
use TracemShortcode\Widgets\Tracem_Blog;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


// Add a custom category for panel widgets
add_action( 'elementor/init', function() {
   \Elementor\Plugin::$instance->elements_manager->add_category( 
   	'tracem',                 // the name of the category
   	[
   		'title' => esc_html__( 'TRACEM', 'tracem' ),
   		'icon' => 'fa fa-header', //default icon
   	],
   	1 // position
   );
} );

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
		add_action( 'elementor/frontend/after_register_styles', [ $this, 'widget_styles' ] );
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'widget_styles' ] );
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );

		add_action( 'elementor/frontend/after_register_scripts', function() {
			wp_register_script( 'tracem-shortcode', plugins_url( '/assets/js/tracem-shortcode.js' ), [ 'jquery' ], false, true );
		} );
	}


	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_enqueue_script( 'isotope', plugins_url( 'assets/js/isotope.min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_enqueue_script( 'multiscroll', plugins_url( 'assets/js/jquery.multiscroll.min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_enqueue_script( 'imagesloaded', plugins_url( 'assets/js/imagesloaded.pkgd.min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_enqueue_script( 'tweenmax', plugins_url( 'assets/js/TweenMax.min.js', __FILE__ ), [ 'jquery' ], false, true );

		wp_enqueue_script( 'anime', plugins_url( 'assets/js/anime.min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_enqueue_script( 'pieces', plugins_url( 'assets/js/pieces.min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_enqueue_script( 'custom', plugins_url( 'assets/js/custom.js', __FILE__ ), [ 'jquery' ], false, true );
	}


	/**
	 * Register Widget Styles
	 *
	 * Register custom styles required to run Chaoz Core.
	 *
	 * @since 1.7.0
	 * @since 1.7.1 The method moved to this class.
	 *
	 * @access public
	 */
	public function widget_styles() {
		wp_enqueue_style( 'pieces-slider', plugins_url( 'assets/css/pieces-slider.css', __FILE__ ), false, '1.0.0', 'all' );
		wp_enqueue_style( 'full-width-slide', plugins_url( 'assets/css/full-width-slide.css', __FILE__ ), false, '1.0.0', 'all' );
		wp_enqueue_style( 'page-flip', plugins_url( 'assets/css/page-flip.css', __FILE__ ), false, '1.0.0', 'all' );
		wp_enqueue_style( 'ele-themify', plugins_url( 'assets/themify-icon/css/themify-icons.css', __FILE__ ), false, '1.0.0', 'all' );
	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		require __DIR__ . '/widgets/tracem-slider/tracem-slider.php';
		require __DIR__ . '/widgets/tracem-hero/tracem-hero.php';
		require __DIR__ . '/widgets/tracem-portfolio/tracem-portfolio.php';
		require __DIR__ . '/widgets/tracem-about/tracem-about.php';
		require __DIR__ . '/widgets/tracem-team/tracem-team.php';
		require __DIR__ . '/widgets/tracem-funfacts/tracem-funfacts.php';
		require __DIR__ . '/widgets/tracem-services/tracem-services.php';
		require __DIR__ . '/widgets/tracem-cta/tracem-cta.php';
		require __DIR__ . '/widgets/tracem-coming-soon/tracem-coming-soon.php';
		require __DIR__ . '/widgets/tracem-maintenance/tracem-maintenance.php';
		require __DIR__ . '/widgets/tracem-contact/tracem-contact.php';
		require __DIR__ . '/widgets/tracem-testimonial/tracem-testimonial.php';
		require __DIR__ . '/widgets/tracem-blockquote/tracem-blockquote.php';
		require __DIR__ . '/widgets/tracem-subscribe/tracem-subscribe.php';
		require __DIR__ . '/widgets/tracem-clients/tracem-clients.php';
		require __DIR__ . '/widgets/tracem-pricing/tracem-pricing.php';
		require __DIR__ . '/widgets/tracem-button/tracem-button.php';
		require __DIR__ . '/widgets/tracem-posts/tracem-posts.php';
		require __DIR__ . '/widgets/tracem-piechart/tracem-piechart.php';
		require __DIR__ . '/widgets/tracem-progressbar/tracem-progressbar.php';
		require __DIR__ . '/widgets/tracem-blog/tracem-blog.php';


		// Helper
		require __DIR__ . '/helper/helper.php';
		require __DIR__ . '/inc/icons.php';
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Hero() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Portfolio() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_About() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Funfacts() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Services() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_CTA() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Coming_Soon() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Maintenance() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Contact() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Testimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Blockquote() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Subscribe() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Clients() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Pricing() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Posts() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Piechart() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Progressbar() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tracem_Blog() );
	}
}

new Plugin();