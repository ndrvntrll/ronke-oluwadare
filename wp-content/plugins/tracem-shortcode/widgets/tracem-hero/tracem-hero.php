<?php
namespace TracemShortcode\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Tracem_Hero extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tracem-hero';
	}

	public function get_title() {
		return __( 'Hero', 'tracem' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'tracem' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label'			=> __( 'Tracem Hero', 'tracem' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// $this->add_control(
		// 	'slider_select',
		// 	[
		// 		'label'			=> __( 'Slider Select', 'tracem' ),
		// 		'type'			=> \Elementor\Controls_Manager::SELECT,
		// 		'options'		=> [
		// 			'1'			=> __( 'Home Slider', 'tracem' ),
		// 			'2'			=> __( 'Home Split', 'tracem' )
		// 		],
		// 		'default'		=> '1'
		// 	]
		// );

		$this->add_control(
			'description', [
				'label' 		=> __( 'Description', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'signature_image', [
				'label' 		=> __( 'Signature Image', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
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


	protected function render() {
		$settings 		= $this->get_settings_for_display();
	?>
    <!-- ============================================================================ -->
    <!-- =============================== Home Minimal =============================== -->
    <!-- ============================================================================ -->

    <section class="home-minimal-area">
        <div class="container-fluid">
            <div class="row tracem-shrink no-gutters">
                <div class="col">
                    <div class="home-minimal">
                    	<div class="tracem-ovh">
	                    	<?php
	                    	if( ! empty( $settings['description'] ) ) {
	                    		echo '<h3>' . esc_html( $settings['description'] ) . '</h3>';
	                    	} ?>
                    	</div><!-- .tracem-ovh -->
						
						<div class="tracem-ovh">
							<div class="signature-wrapper">
								<?php
		                    	if( $settings['signature_image']['url'] ) {
		                    		$signature_img = ( $settings['signature_image']['url'] ) ? $settings['signature_image']['url'] : '';
		                    		echo '<img class="signature-image" src="' . esc_url( $signature_img ) . '" alt="' . esc_attr__( 'Signature', 'tracem' ) . '" />';
		                    	}
		                    	?>
							</div><!-- .signature-wrapper -->
						</div><!-- .tracem-ovh -->
                    </div><!-- .home-minimal -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </section><!-- .home-minimal-area -->

    <script>
        ;(function($){
            "use strict";
            $(document).ready(function () {
            	jQuery('.home-minimal-area .home-minimal h3').addClass('animation-loaded');
				jQuery('.home-minimal-area .signature-wrapper').addClass('animation-loaded');
            });
        })(jQuery)
    </script>
	<?php
	}
}