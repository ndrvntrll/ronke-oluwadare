<?php
namespace TracemShortcode\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Persoh Tracem_Slider
 *
 * Elementor widget for Persoh Shortcode
 *
 * @since 1.0.0
 */

class Tracem_Slider extends \Elementor\Widget_Base {

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
		return 'tracem-slider';
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
		return __( 'Slider', 'tracem' );
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
		return 'eicon-slider-full-screen';
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
		return [ 'tracem-slider' ];
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
				'label'			=> __( 'Tracem Slider', 'tracem' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'slider_select',
			[
				'label'			=> __( 'Slider Select', 'tracem' ),
				'type'			=> \Elementor\Controls_Manager::SELECT,
				'options'		=> [
					'1'			=> __( 'Home Slider', 'tracem' ),
					'2'			=> __( 'Home Split', 'tracem' ),
					'3'			=> __( 'Full Width Slide', 'tracem' ),
					'4'			=> __( 'Home Carousel', 'tracem' ),
					'5'			=> __( 'Home Image Carousel', 'tracem' ),
					'6'			=> __( 'Home Flip Layout', 'tracem' ),
					'7'			=> __( 'Animated Slide', 'tracem' ),
					'8'			=> __( 'Home Link', 'tracem' )
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
				'placeholder'	=> __( 'How many posts want to display', 'tracem' ),
				'condition'				=> [
					'slider_select'	=> [
						'1',
						'2',
						'3',
						'4',
						'5',
						'7',
						'8'
					],
				]
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
				],
				'condition'				=> [
					'slider_select'	=> [
						'1',
						'2',
						'3',
						'4',
						'5',
						'7',
						'8'
					],
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
				],
				'condition'				=> [
					'slider_select'	=> [
						'1',
						'2',
						'3',
						'4',
						'5',
						'7',
						'8'
					],
				]
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
					'slider_select'	=> [
						'1',
						'2',
						'3',
						'4',
						'5',
						'7',
						'8'
					],
				]
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'social_icon', [
				'label' 		=> __( 'Social Icon', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::ICON,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'social_url', [
				'label' 		=> __( 'Social URL', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'social_list',
			[
				'label' 		=> __( 'Social Profile', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'condition'				=> [
					'slider_select'	=> [
						'1',
						'2',
						'3',
						'4',
						'5',
						'7',
						'8'
					],
				]
			]
		);

		$this->add_control(
			'button_text', [
				'label' 		=> __( 'Button Text', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition'				=> [
					'slider_select'	=> [
						'1',
						'2',
						'3',
						'4',
						'5',
						'7',
						'8'
					],
				]
			]
		);

		/* ===================================
		 * 	  Repeater for page flip layout
		 * ===================================
		 */
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'post_count',
			[
				'label'			=> __( 'Post Count', 'tracem' ),
				'type'			=> \Elementor\Controls_Manager::NUMBER,
				'default'		=> __( '-1', 'tracem' ),
				'description'	=> __( '-1 is for all posts', 'tracem' ),
				'placeholder'	=> __( 'How many posts want to display', 'tracem' )
			]
		);

		$repeater->add_control(
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

		$repeater->add_control(
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

		$tag_lists 		= get_terms( 'portfolio_tag' );
		$tag_in_slider 	= [];
		foreach( $tag_lists as $tag_list ) {
			$tag_in_slider[ 'none' ] = ucwords( str_replace( '_', ' ', 'Select Options' ) );
			$tag_in_slider[ $tag_list->slug ] = ucwords( str_replace( '_', ' ', $tag_list->name ) );
		}
		$repeater->add_control(
			'tag_in_slider',
			[
				'label'			=> __( 'Slider Filter Tag', 'tracem' ),
				'type'			=> \Elementor\Controls_Manager::SELECT,
				'options'		=> $tag_in_slider
			]
		);

		$this->add_control(
			'flip_slide',
			[
				'label' 		=> __( 'Flip Slide', 'tracem' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'condition'				=> [
					'slider_select'	=> [
						'6',
					],
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
		$args 			= array(
			'post_type'			=> 'portfolio',
			'posts_per_page'	=> $settings['post_count'],
			'order'				=> $settings['order'],
			'orderby'			=> $settings['orderby'],
			'tax_query' 		=> array(
								array(
									'taxonomy' => 'portfolio_tag',
									'field'    => 'slug',
									'terms'    => $settings['tag_in_slider'],
								),
			),
			'post_status'		=> 'publish'
		);

		$portfolio = new \WP_Query( $args );

		if( $portfolio->have_posts() ) {

			$tracem_plugin_dir = plugin_dir_path( __FILE__ ) . 'inc';

			include( $tracem_plugin_dir . '/slider-' . $settings['slider_select'] . '.php' );

		} else {
			$tracem_plugin_dir = plugin_dir_path( __FILE__ ) . 'inc';

			include( $tracem_plugin_dir . '/slider-6.php' );
		}

		if( $settings['slider_select'] == '1' ) { ?>
	    <script>
	        ;(function($){
	            "use strict";
	            $(document).ready(function () {
					/*
					======================================
						Slider & Slider Animation Init
					======================================
					*/
					(function() {

						var tracemSwiper = new Swiper ('.tracem-banner-one', {
							loop: true,
							speed: 600,
							autoplay: {
								delay: 5000,
								disableOnInteraction: false
							},
							pagination: {
								el: '.swiper-pagination',
								clickable: true,
								renderBullet: function (index, className) {
								  return '<span class="' + className + '">0' + (index + 1) + '</span>';
								},
							},
						});


						tracemSwiper.on( 'transitionStart', function() {

							var $activeRightEl	= jQuery('.single-banner-text.swiper-slide-active .banner-right h2'),
							$rightEl			= jQuery('.single-banner-text .banner-right h2');

							if( ! $activeRightEl.hasClass('animation-loaded') ) {
								jQuery('.single-banner-text.swiper-slide-active .banner-right h2', function() {
									$rightEl.removeClass('animation-loaded');
									$activeRightEl.addClass('animation-loaded');
								});
							}


							var $activeLeftH3El	= jQuery('.single-banner-text.swiper-slide-active .banner-left h3'),
							$lefth3El			= jQuery('.single-banner-text .banner-left h3');
							
							if( ! $activeLeftH3El.hasClass('animation-loaded') ) {
								jQuery('.single-banner-text.swiper-slide-active .banner-left h3', function() {
									$lefth3El.removeClass('animation-loaded');
									$activeLeftH3El.addClass('animation-loaded');
								});
							}


							var $activeLeftH4El	= jQuery('.single-banner-text.swiper-slide-active .banner-left h4'),
							$leftH4El			= jQuery('.single-banner-text .banner-left h4');

							if( ! $activeLeftH4El.hasClass('animation-loaded') ) {
								jQuery('.single-banner-text.swiper-slide-active .banner-left h4', function() {
									$leftH4El.removeClass('animation-loaded');
									$activeLeftH4El.addClass('animation-loaded');
								});
							}


							var $activeBtnEl	= jQuery('.single-banner-text.swiper-slide-active .banner-left .btn-generic a span'),
							$btnEl				= jQuery('.single-banner-text .banner-left .btn-generic a span');
							
							if( ! $activeBtnEl.hasClass('animation-loaded') ) {
								jQuery('.single-banner-text.swiper-slide-active .banner-left .btn-generic a span', function() {
									$btnEl.removeClass('animation-loaded');
									$activeBtnEl.addClass('animation-loaded');
								});
							}


							var $activeTotalViewEl	= jQuery('.single-banner-text.swiper-slide-active .banner-left .total-view'),
							$totalViewEl			= jQuery('.single-banner-text .banner-left .total-view');
							
							if( ! $activeTotalViewEl.hasClass('animation-loaded') ) {
								jQuery('.single-banner-text.swiper-slide-active .banner-left .total-view', function() {
									$totalViewEl.removeClass('animation-loaded');
									$activeTotalViewEl.addClass('animation-loaded');
								});
							}

							var $activeTotalLikeEl	= jQuery('.single-banner-text.swiper-slide-active .banner-left .total-like'),
							$totalLikeEl			= jQuery('.single-banner-text .banner-left .total-like');

							if( ! $activeTotalLikeEl.hasClass('animation-loaded') ) {
								jQuery('.single-banner-text.swiper-slide-active .banner-left .total-like', function() {
									$totalLikeEl.removeClass('animation-loaded');
									$activeTotalLikeEl.addClass('animation-loaded');
								});
							}


							var $activeTotalCmntEl	= jQuery('.single-banner-text.swiper-slide-active .banner-left .total-comment'),
							$totalCmntEl			= jQuery('.single-banner-text .banner-left .total-comment');

							if( ! $activeTotalCmntEl.hasClass('animation-loaded') ) {
								jQuery('.single-banner-text.swiper-slide-active .banner-left .total-comment', function() {
									$totalCmntEl.removeClass('animation-loaded');
									$activeTotalCmntEl.addClass('animation-loaded');
								});
							}

							var $activeEIBefEl	= jQuery('.single-banner-text.swiper-slide-active .banner-left .portfolio-extra-info'),
							$totalEIBefEl		= jQuery('.single-banner-text .banner-left .portfolio-extra-info');

							if( ! $activeEIBefEl.hasClass('animation-loaded') ) {
								jQuery('.single-banner-text.swiper-slide-active .banner-left .portfolio-extra-info', function() {
									$totalEIBefEl.removeClass('animation-loaded');
									$activeEIBefEl.addClass('animation-loaded');
								});
							}

						});

					})();

	            });
	        })(jQuery)
	    </script>
		<?php }

		if( $settings['slider_select'] == '2' ) { ?>
	    <script>
	        ;(function($){
	            "use strict";
	            $(document).ready(function () {


					/*
					======================================
						Multiscroll Init
					======================================
					*/
					(function() {

						if( jQuery('.home-split').length ) {
							jQuery('.home-split').multiscroll({
								loopBottom: true,
								loopTop: true,
								easing: 'easeInOutCirc',
								sectionsColor: [ '#fed79d', '#ff8484', '#009f9d', '#8ed6ff' ],

								afterLoad:function() {

									var $splitImgActiveEl = jQuery('.home-split .single-split-image.active .split-image h4'),
										$splitImgEl = jQuery('.home-split .single-split-image .split-image h4');
									if( ! $splitImgActiveEl.hasClass('animation-loaded') ) {
										$splitImgEl.removeClass('animation-loaded');
										$splitImgActiveEl.addClass('animation-loaded');
									}

									var $splitBtnActiveEl = jQuery('.home-split .single-split-text.active .split-text .btn-generic span'),
										$splitBtnEl = jQuery('.home-split .single-split-text .split-text .btn-generic span');
									if( ! $splitBtnActiveEl.hasClass('animation-loaded') ) {
										$splitBtnEl.removeClass('animation-loaded');
										$splitBtnActiveEl.addClass('animation-loaded');
									}

									var $splitTxtH3ActiveEl = jQuery('.home-split .single-split-text.active .split-text .title-cats h3'),
										$splitTxtH3El = jQuery('.home-split .single-split-text .split-text .title-cats h3');
									if( ! $splitTxtH3ActiveEl.hasClass('animation-loaded') ) {
										$splitTxtH3El.removeClass('animation-loaded');
										$splitTxtH3ActiveEl.addClass('animation-loaded');
									}

									var $splitTxtH2ActiveEl = jQuery('.home-split .single-split-text.active .split-text .title-cats h2'),
										$splitTxtH2El = jQuery('.home-split .single-split-text .split-text .title-cats h2');
									if( ! $splitTxtH2ActiveEl.hasClass('animation-loaded') ) {
										$splitTxtH2El.removeClass('animation-loaded');
										$splitTxtH2ActiveEl.addClass('animation-loaded');
									}

									var $splitTxtH4ActiveEl = jQuery('.home-split .single-split-text.active .split-text h4'),
										$splitTxtH4El = jQuery('.home-split .single-split-text .split-text h4');
									if( ! $splitTxtH4ActiveEl.hasClass('animation-loaded') ) {
										$splitTxtH4El.removeClass('animation-loaded');
										$splitTxtH4ActiveEl.addClass('animation-loaded');
									}

									var $splitSocialActiveEl = jQuery('.home-split .single-split-text.active .portfolio-social-area'),
										$splitSocialEl = jQuery('.home-split .single-split-text .portfolio-social-area');
									if( ! $splitSocialActiveEl.hasClass('animation-loaded') ) {
										$splitSocialEl.removeClass('animation-loaded');
										$splitSocialActiveEl.addClass('animation-loaded');
									}

									var $splitPfeActiveEl = jQuery('.home-split .single-split-text.active .portfolio-extra-info'),
										$splitPfeEl = jQuery('.home-split .single-split-text .portfolio-extra-info');
									if( ! $splitPfeActiveEl.hasClass('animation-loaded') ) {
										$splitPfeEl.removeClass('animation-loaded');
										$splitPfeActiveEl.addClass('animation-loaded');
									}

									var $splitPfeSpanActiveEl = jQuery('.home-split .single-split-text.active .portfolio-extra-info span'),
										$splitPfeSpanEl = jQuery('.home-split .single-split-text .portfolio-extra-info span');
									if( ! $splitPfeSpanActiveEl.hasClass('animation-loaded') ) {
										$splitPfeSpanEl.removeClass('animation-loaded');
										$splitPfeSpanActiveEl.addClass('animation-loaded');
									}
									
								}
							});
						}

					})();

	            });
	        })(jQuery)
	    </script>
		<?php }



		if( $settings['slider_select'] == '3' ) { ?>
	    <script>
	        ;(function($){
	            "use strict";
	            $(document).ready(function () {
					if( document.querySelector('.full-width-slideshow') !== null )
					{
					    // The Slide (Product) class.
					    class Slide {
					        constructor(el, settings) {
					            this.DOM = {el: el};
					            
					            this.settings = {
					                detailsEl: null,
					                onHideDetails: () => {return false;}
					            }
					            Object.assign(this.settings, settings);

					            // The slide´s container.
					            this.DOM.wrap = this.DOM.el.querySelector('.full_width_slide__wrap');
					            // The image element.
					            this.DOM.img = this.DOM.wrap.querySelector('.full_width_slide__img');
					            // The title container.
					            this.DOM.titleWrap = this.DOM.wrap.querySelector('.full_width_slide__title-wrap');

					            // Some config values.
					            this.config = {
					                animation: {
					                    duration: 1.2,
					                    ease: Expo.easeInOut
					                }
					            };
					        }
					        // Sets the current class.
					        setCurrent(isCurrent = true) {
					            this.DOM.el.classList[isCurrent ? 'add' : 'remove']('slide--current');
					        }
					        // Hide the slide.
					        hide(direction) {
					            return this.toggle('hide', direction);
					        }
					        // Show the slide.
					        show(direction) {
					            this.DOM.el.style.zIndex = 10;
					            return this.toggle('show', direction);
					        }
					        // Show/Hide the slide.
					        toggle(action, direction) {
					            return new Promise((resolve, reject) => {
					                // When showing a slide, the slide´s container will move 100% from the right or left depending on the direction.
					                // At the same time, both title wrap and the image will move the other way around thus creating the unreveal effect.
					                // Also, when showing or hiding a slide, we scale it from or to a value of 1.1.
					                if ( action === 'show' ) {
					                    TweenMax.to(this.DOM.wrap, this.config.animation.duration, {
					                        ease: this.config.animation.ease,
					                        startAt: {x: direction === 'right' ? '100%' : '-100%'},
					                        x: '0%'
					                    });
					                    TweenMax.to(this.DOM.titleWrap, this.config.animation.duration, {
					                        ease: this.config.animation.ease,
					                        startAt: {x: direction === 'right' ? '-100%' : '100%'},
					                        x: '0%'
					                    });
					                }

					                TweenMax.to(this.DOM.img, this.config.animation.duration, {
					                    ease: this.config.animation.ease,
					                    startAt: action === 'hide' ? {} : {x: direction === 'right' ? '-100%' : '100%', scale: 1.1},
					                    x: '0%',
					                    scale: action === 'hide' ? 1.1 : 1,
					                    onStart: () => {
					                        this.DOM.img.style.transformOrigin = action === 'hide' ? 
					                                                                direction === 'right' ? '100% 50%' : '0% 50%':
					                                                                direction === 'right' ? '0% 50%' : '100% 50%';
					                        this.DOM.el.style.opacity = 1;
					                    },
					                    onComplete: () => {
					                        this.DOM.el.style.zIndex = 1;
					                        this.DOM.el.style.opacity = action === 'hide' ? 0 : 1;
					                        resolve();
					                    }
					                });
					            });
					        }
					    }

					    // The navigation class. Controls the .boxnav animations (e.g. pagination animation).
					    class Navigation {
					        constructor(el, settings) {
					            this.DOM = {el: el};

					            this.settings = {
					                next: () => {return false;},
					                prev: () => {return false;}
					            }
					            Object.assign(this.settings, settings);

					            // Navigation controls (prev and next)
					            this.DOM.prevCtrl = this.DOM.el.querySelector('.boxnav__item--prev');
					            this.DOM.nextCtrl = this.DOM.el.querySelector('.boxnav__item--next');
					            // The current and total pages elements.
					            this.DOM.pagination = {
					                current: this.DOM.el.querySelector('.boxnav__label--current'),
					                total: this.DOM.el.querySelector('.boxnav__label--total')
					            };
					            this.initEvents();
					        }
					        // Updates the current page element value.
					        // Animate the element up, update the value and finally animate it in from bottom up.
					        setCurrent(val, direction) {
					            //this.DOM.pagination.current.innerHTML = val;
					            TweenMax.to(this.DOM.pagination.current, 0.4, {
					                ease: 'Back.easeIn',
					                y: direction === 'right' ? '-100%' : '100%',
					                opacity: 0,
					                onComplete: () => {
					                    this.DOM.pagination.current.innerHTML = val;
					                    TweenMax.to(this.DOM.pagination.current, 0.8, {
					                        ease: 'Expo.easeOut',
					                        startAt: {y: direction === 'right' ? '50%' : '-50%', opacity: 0},
					                        y: '0%',
					                        opacity: 1
					                    });    
					                }
					            });
					        }
					        // Sets the total pages value.
					        setTotal(val) {
					            this.DOM.pagination.total.innerHTML = val;
					        }
					        // Initialize the events on the next/prev controls.
					        initEvents() {
					            this.DOM.prevCtrl.addEventListener('click', () => this.settings.prev());
					            this.DOM.nextCtrl.addEventListener('click', () => this.settings.next());
					        }
					    }

					    // The Slideshow class.
					    class Slideshow {
					        constructor(el) {
					            this.DOM = {el: el};
					            // Initialize the navigation instance. When clicking the next or prev ctrl buttons, trigger the navigate function.
					            this.navigation = new Navigation(document.querySelector('.boxnav'), {
					                next: () => this.navigate('right'),
					                prev: () => this.navigate('left')
					            });
					            // The slides.
					            this.slides = [];
					            // Initialize/Create the slides instances.
					            Array.from(this.DOM.el.querySelectorAll('.full-width-slide')).forEach((slideEl,pos) => this.slides.push(new Slide(slideEl, {
					                // When clicking the close details ctrl button call the closeDetailsBoxes function.
					                onHideDetails: () => {
					                    if ( this.isAnimating ) return;
					                    this.isAnimating = true;
					                    this.closeDetailsBoxes().then(() => this.isAnimating = false);
					                }
					            })));
					            // The total number of slides.
					            this.slidesTotal = this.slides.length;
					            // Set the total number of slides in the navigation box.
					            this.navigation.setTotal(this.slidesTotal);
					            // At least 2 slides to continue...
					            if ( this.slidesTotal < 2 ) {
					                return false;
					            }
					            // Current slide position.
					            this.current = 0;
					            // Initialize the slideshow.
					            this.init();
					        }
					        // Set the current slide and initialize some events.
					        init() {
					            this.slides[this.current].setCurrent();
					        }

					        closeDetailsBoxes() {
					            return new Promise((resolve, reject) => {
					                resolve()
					            });
					        }
					        // Navigate the slideshow.
					        navigate(direction) {
					            // If animating return.
					            if ( this.isAnimating ) return;
					            this.isAnimating = true;

					            // The next/prev slide´s position.
					            const nextSlidePos = direction === 'right' ? 
					                    this.current < this.slidesTotal-1 ? this.current+1 : 0 :
					                    this.current > 0 ? this.current-1 : this.slidesTotal-1;

					            // Close the details boxes (if open) and then hide the current slide and show the next/previous one.
					            this.closeDetailsBoxes().then(() => {
					                // Update the current page element.
					                this.navigation.setCurrent(nextSlidePos+1, direction);
					                
					                Promise.all([this.slides[this.current].hide(direction), this.slides[nextSlidePos].show(direction)])
					                       .then(() => {
					                            // Update current.
					                            this.slides[this.current].setCurrent(false);
					                            this.current = nextSlidePos;
					                            this.slides[this.current].setCurrent();
					                            this.isAnimating = false;
					                       });
					            });
					        }
					    }

					    // Initialize the slideshow
					    const slideshow = new Slideshow(document.querySelector('.full-width-slideshow'));
					    // Preload all the images..
					    imagesLoaded(document.querySelectorAll('.full_width_slide__img'), {background: true}, () => document.body.classList.remove('loading'));
					}
	            });
	        })(jQuery)
	    </script>
		<?php }

		if( $settings['slider_select'] == '4' ) { ?>
	    <script>
	        ;(function($){
	            "use strict";
	            $(document).ready(function () {
					/*
					======================================
						Home Centered Carousel
					======================================
					*/
					(function() {
						var tCenCarousel = new Swiper('.tracem-centered-carousel', {
							slidesPerView: 'auto',
					      	spaceBetween: 30,
							autoplay: {
								delay: 4000,
								disableOnInteraction: false
							},
						    breakpoints: {
						        1024: {
						          slidesPerView: 1,
						        },
						    },
							scrollbar: {
								el: '.swiper-scrollbar',
								hide: false,
							},
						});

						tCenCarousel.on( 'transitionStart', function() {

							if( $('.single-centered-carousel-content').hasClass('swiper-slide-active') ) {
								$('.single-centered-carousel-content').removeClass('animation-loaded');
								$('.single-centered-carousel-content.swiper-slide-active').addClass('animation-loaded');
							}
						});
				    })();
	            });
	        })(jQuery)
	    </script>
		<?php }


		if( $settings['slider_select'] == '7' ) { ?>
	    <script>
	        ;(function($){
	            "use strict";
	            $(document).ready(function () {
					(function() {

					    // Get all images and texts, get the `canvas` element, and save slider length
					    var sliderCanvas = document.querySelector('.pieces-slider__canvas');
					    var imagesEl = [].slice.call(document.querySelectorAll('.pieces-slider__image'));
					    var textEl = [].slice.call(document.querySelectorAll('.pieces-slider__text'));
					    var slidesLength = imagesEl.length;

					    // Define indexes related variables and functions
					    var currentIndex = 0, currentImageIndex, currentTextIndex, currentNumberIndex;
					    // Update current indexes for image, text and number
					    function updateIndexes() {
					        currentImageIndex = currentIndex * 3;
					        currentTextIndex = currentImageIndex + 1;
					        currentNumberIndex = currentImageIndex + 2;
					    }
					    updateIndexes();
					    var textIndexes = [];
					    var numberIndexes = [];

					    // Some other useful variables
					    var windowWidth = window.innerWidth;
					    var piecesSlider;

					    // Options for images
					    var imageOptions = {
					        angle: 45,
					        extraSpacing: {extraX: 100, extraY: 200},
					        piecesWidth: function() { return Pieces.random(50, 200); },
					        ty: function() { return Pieces.random(-400, 400); }
					    };

					    // Options for texts
					    var textOptions = {
					        color: 'white',
					        backgroundColor: '#121212',
					        fontSize: function() { return windowWidth > 720 ? 50 : 30; },
					        padding: '15 20 10 20',
					        angle: -45,
					        piecesSpacing: 2,
					        extraSpacing: {extraX: 0, extraY: 300},
					        piecesWidth: function() { return Pieces.random(50, 200); },
					        ty: function() { return Pieces.random(-200, 200); },
					        translate: function() {
					            if (windowWidth > 1120) return {translateX: 230, translateY: 230};
					            if (windowWidth > 720) return {translateX: 0, translateY: 200};
					            if (windowWidth > 670) return {translateX: 100, translateY: 220};
					            return {translateX: 0, translateY: 100};
					        }
					    };

					    // Options for numbers
					    var numberOptions = {
					        color: 'white',
					        backgroundColor: '#121212',
					        fontSize: function() { return windowWidth > 720 ? 60 : 20; },
					        padding: function() { return windowWidth > 720 ? '18 35 10 38' : '18 25 10 28'; },
					        angle: 0,
					        piecesSpacing: 2,
					        extraSpacing: {extraX: 10, extraY: 10},
					        piecesWidth: 35,
					        ty: function() { return Pieces.random(-200, 200); },
					        translate: function() {
					            if (windowWidth > 1120) return {translateX: -390, translateY: -230};
					            if (windowWidth > 720) return {translateX: -240, translateY: -180};
					            if (windowWidth > 670) return {translateX: -250, translateY: -220};
					            return {translateX: -140, translateY: -100};
					        }
					    };

					    // Build the array of items to draw using Pieces
					    var items = [];
					    var imagesReady = 0;
					    for (var i = 0; i < slidesLength; i++) {
					        // Wait for all images to load before initializing the slider and event listeners
					        var slideImage = new Image();
					        slideImage.onload = function() {
					            if (++imagesReady == slidesLength) {
					                initSlider();
					                initEvents();
					            }
					        };
					        // Push all elements for each slide with the corresponding options
					        items.push({type: 'image', value: imagesEl[i], options: imageOptions});
					        items.push({type: 'text', value: textEl[i].innerText, options: textOptions});
					        items.push({type: 'text', value: i + 1, options: numberOptions});
					        // Save indexes
					        textIndexes.push(i * 3 + 1);
					        numberIndexes.push(i * 3 + 2);
					        // Set image src
					        slideImage.src = imagesEl[i].src;
					    }

					    // Initialize a Pieces instance with all items we want to draw
					    function initSlider() {
					        // Stop any current animation if the slider was initialized before
					        if (piecesSlider) {
					            piecesSlider.stop();
					        }

					        var fontFamily = jQuery('.pieces-slider').data('font-family');
					        // Save the new Pieces instance
					        piecesSlider = new Pieces({
					            canvas: sliderCanvas,
					            items: items,
					            x: 'centerAll',
					            y: 'centerAll',
					            piecesSpacing: 1,
					            fontFamily: [fontFamily],
					            animation: {
					                duration: function() { return Pieces.random(1000, 2000); },
					                easing: 'easeOutQuint'
					            },
					            // debug: true
					        });

					        // Animate all numbers to rotate clockwise indefinitely
					        piecesSlider.animateItems({
					            items: numberIndexes,
					            duration: 20000,
					            angle: 360,
					            loop: true
					        });

					        // Show current items: image, text and number
					        showItems();
					    }

					    // Init Event Listeners
					    function initEvents() {
					        // Select prev or next slide using buttons
					        document.querySelector('.pieces-slider__button--prev').addEventListener('click', prevItem);
					        document.querySelector('.pieces-slider__button--next').addEventListener('click', nextItem);

					        // Select prev or next slide using arrow keys
					        document.addEventListener('keydown', function (e) {
					            if (e.keyCode == 37) { // left
					                prevItem();
					            } else if (e.keyCode == 39) { // right
					                nextItem();
					            }
					        });

					        // Handle `resize` event
					        window.addEventListener('resize', resizeStart);
					    }

					    // Show current items: image, text and number
					    function showItems() {
					        // Show image pieces
					        piecesSlider.showPieces({items: currentImageIndex, ignore: ['tx'], singly: true, update: (anim) => {
					            // Stop the pieces animation at 60%, and run a new indefinitely animation of `ty` for each piece
					            if (anim.progress > 60) {
					                var piece = anim.animatables[0].target;
					                var ty = piece.ty;
					                anime.remove(piece);
					                anime({
					                    targets: piece,
					                    ty: piece.h_ty < 300
					                        ? [{value: ty + 10, duration: 1000}, {value: ty - 10, duration: 2000}, {value: ty, duration: 1000}]
					                        : [{value: ty - 10, duration: 1000}, {value: ty + 10, duration: 2000}, {value: ty, duration: 1000}],
					                    duration: 2000,
					                    easing: 'linear',
					                    loop: true
					                });
					            }
					        }});
					        // Show pieces for text and number, using alternate `ty` values
					        piecesSlider.showPieces({items: currentTextIndex});
					        piecesSlider.showPieces({items: currentNumberIndex, ty: function(p, i) { return p.s_ty - [-3, 3][i % 2]; }});
					    }

					    // Hide current items: image, text and number
					    function hideItems() {
					        piecesSlider.hidePieces({items: [currentImageIndex, currentTextIndex, currentNumberIndex]});
					    }

					    // Select the prev item: hide current items, update indexes, and show the new current item
					    function prevItem() {
					        hideItems();
					        currentIndex = currentIndex > 0 ? currentIndex - 1 : slidesLength - 1;
					        updateIndexes();
					        showItems();
					    }

					    // Select the next item: hide current items, update indexes, and show the new current item
					    function nextItem() {
					        hideItems();
					        currentIndex = currentIndex < slidesLength - 1 ? currentIndex + 1 : 0;
					        updateIndexes();
					        showItems();
					    }

					    // Handle `resize` event
					    
					    var initial = true, hideTimer, resizeTimer;

					    // User starts resizing, so wait 300 ms before reinitialize the slider
					    function resizeStart() {
					        if (initial) {
					            initial = false;
					            if (hideTimer) clearTimeout(hideTimer);
					            sliderCanvas.classList.add('pieces-slider__canvas--hidden');
					        }
					        if (resizeTimer) clearTimeout(resizeTimer);
					        resizeTimer = setTimeout(resizeEnd, 300);
					    }

					    // User ends resizing, then reinitialize the slider
					    function resizeEnd() {
					        initial = true;
					        windowWidth = window.innerWidth;
					        initSlider();
					        hideTimer = setTimeout(() => {
					            sliderCanvas.classList.remove('pieces-slider__canvas--hidden');
					        }, 500);
					    }
					})();

	            });
	        })(jQuery)
	    </script>
		<?php }

		if( $settings['slider_select'] == '6' ) { ?>
	    <script>
	        ;(function($){
	            "use strict";
	            $(document).ready(function () {
					if( document.querySelector('.page-flip-slideshow') !== null )
					{
					    // Lighter to darker.
					    const colors = ['#f6f6f6','#f0f0f0','#e3e3e3','#d7d7d7','#d0d0d0'];

					    // The page turning animations.
					    class PageTurn {
					        constructor(el, pagesTotal) {
					            this.DOM = {el: el};
					            this.config = {
					                // Duration for each page turn animation.
					                duration: 1.6,
					                // Delay between the pages. Need to be tuned correctly together with the duration, so that there are no gaps between the pages, otherwise the content switch would be visible.
					                pagesDelay: 0.15,
					                // Ease for each page turn animation. Needs to be easeInOut
					                ease: Quint.easeInOut
					            };
					            // Both sides.
					            this.DOM.pagesWrap = {
					                left: this.DOM.el.querySelector('.page_flip_revealer__item--left'),
					                right: this.DOM.el.querySelector('.page_flip_revealer__item--right')
					            };
					            // Create the turning pages.
					            let pagesHTML = '';
					            for (let i = 0; i <= pagesTotal; ++i) {
					                // Setting the color of the turning page based on the colors array
					                // todo: Need to find a better way to do this..
					                const color = colors[i] || colors[0];
					                pagesHTML += `<div class="page_flip_revealer__item-inner" style="background-color:${color};"></div>`;
					            }
					            this.DOM.pagesWrap.left.innerHTML = this.DOM.pagesWrap.right.innerHTML = pagesHTML;
					            // All the turning pages.
					            this.DOM.pages = {
					                left: Array.from(this.DOM.pagesWrap.left.querySelectorAll('.page_flip_revealer__item-inner')),
					                right: Array.from(this.DOM.pagesWrap.right.querySelectorAll('.page_flip_revealer__item-inner'))
					            };
					        }
					        // The pages will be initially translated to the right or left (100% or -100% on the x-axis) and then animated to the opposite side.
					        addTween(side, direction, nmbPages) {
					            const pages = this.DOM.pages[side];
					            for (let i = 0, len = nmbPages-1; i <= len; ++i) {
					                const page = pages[i];
					                this.tl.to(page, this.config.duration, {
					                    ease: this.config.ease,
					                    startAt: {x: direction === 'next' ? '100%' : '-100%'},
					                    x: direction === 'next' ? '-100%' : '100%'
					                }, i * this.config.pagesDelay);
					            }
					        }
					        createTweens(direction, nmbPages) {
					            this.addTween('left', direction, nmbPages);
					            this.addTween('right', direction, nmbPages);
					        }
					        turn(direction, nmbPages, middleAnimationCallback) {
					            return new Promise((resolve, reject) => {
					                this.tl = new TimelineMax({onComplete: resolve, paused: true});
					                // Add a callback for the middle of the animation.
					                if ( middleAnimationCallback ) {
					                    this.tl.addCallback(middleAnimationCallback, (this.config.duration + (nmbPages-1)*this.config.pagesDelay)/2);
					                }
					                this.createTweens(direction, nmbPages);
					                this.tl.resume();
					            });
					        }
					    }

					    // Window sizes.
					    let winsize;
					    const calcWinsize = () => winsize = {width: window.innerWidth, height: window.innerHeight};
					    calcWinsize();
					    window.addEventListener('resize', calcWinsize);
					    
					    // Class for a content item.
					    class Item {
					        constructor(el) {
					            this.DOM = {el: el};
					            // The inner contains both the image and reveal elements.
					            this.DOM.inner = this.DOM.el.querySelector('.page-flip-slide__figure-inner');
					            // The image.
					            this.DOM.image = this.DOM.inner.querySelector('.page-flip-slide__figure-img');
					            // The reveal element (element that is on top of the image and moves away to reveal the image).
					            this.DOM.reveal = this.DOM.inner.querySelector('.page-flip-slide__figure-reveal');
					            // Title and description.
					            this.DOM.title = this.DOM.el.querySelector('.page-flip-slide__figure-title');
					            this.DOM.description = this.DOM.el.querySelector('.page-flip-slide__figure-description');

					            const calcRect = () => this.rect = this.DOM.el.getBoundingClientRect();
					            window.addEventListener('resize', calcRect);
					            calcRect();
					        }
					        // Gets the side where the item is on the slideshow/viewport (left or right).
					        getSide() {
					            // Item´s center point.
					            const center = {x: this.rect.left+this.rect.width/2, y: this.rect.top+this.rect.height/2};
					            return center.x >= winsize.width/2 ? 'right' : 'left';
					        }
					    }

					    // A slide is the two "pages" that are currently visible.
					    class Slide {
					        constructor(el) {
					            this.DOM = {el: el};
					            // Content item instances.
					            this.items = [];
					            // The figures
					            Array.from(this.DOM.el.querySelectorAll('.page-flip-slide__figure')).forEach((item) => this.items.push(new Item(item)));
					        }
					        // Show its content items.
					        showItems(direction) {
					            return new Promise((resolve, reject) => {
					                const duration = 1;
					                const ease = Expo.easeOut;
					                this.tl = new TimelineMax({onComplete: resolve}).add('begin');
					                for (const item of this.items) {
					                    // Animate the main element (translation of the whole item).
					                    this.tl.to(item.DOM.el, duration, { 
					                        ease: ease,
					                        startAt: {x: direction === 'next' ? 60 : -60, opacity: 1},
					                        x: '0%',
					                    }, 'begin')
					                    // Animate the rotationZ for the elements that are inside the turning side.
					                    if ( direction === 'next' && item.getSide() === 'left' || direction === 'prev' && item.getSide() === 'right' ) {
					                        // Animate the perspective element
					                        TweenMax.set(item.DOM.inner, {'transform-origin': direction === 'next' ? '100% 50%' : '0% 50%'});
					                        this.tl.to(item.DOM.inner, duration, { 
					                            ease: ease,
					                            startAt: {
					                                rotationY: direction === 'next' ? 30 : -30, 
					                                //rotationZ: direction === 'next' ?  5 : -5
					                            },
					                            rotationY: 0.1,
					                            //rotationZ: 0
					                        }, 'begin');
					                    }
					                    // Animate the reveal element away from the image.
					                    this.tl.to(item.DOM.reveal, duration, { 
					                        ease: ease,
					                        startAt: {x: '0%'},
					                        x: direction === 'next' ? '-100%' : '100%'
					                    }, 'begin')
					                    // Animate the scale of the image.
					                    .to(item.DOM.image, duration, {
					                        ease: ease,
					                        startAt: {
					                            scale: 1.5, 
					                            //rotationZ: direction === 'next' ?  -5 : 5
					                        },
					                        scale: 1
					                        //rotationZ: 0
					                    }, 'begin')
					                    // Animate the title in.
					                    .to(item.DOM.title, duration*0.8, {
					                        ease: Quart.easeOut,
					                        startAt: {x: direction === 'next' ? 15 : -15, opacity: 0},
					                        x: '0%',
					                        opacity: 1
					                    }, 'begin+=0.25')
					                    // Animate the description in.
					                    .to(item.DOM.description, duration*0.8, {
					                        ease: Quart.easeOut,
					                        startAt: {x: direction === 'next' ? 20 : -20, opacity: 0},
					                        x: '0%',
					                        opacity: 1
					                    }, 'begin+=0.3');
					                }
					            });
					        }
					        // Reset items after the page turns.
					        resetItems() {
					            for (const item of this.items) {
					                TweenMax.set(item.DOM.el, {opacity: 0});
					                TweenMax.set([item.DOM.title,item.DOM.description], {opacity: 0});
					            }
					        }
					    }

					    class Slideshow {
					        constructor(el) {
					            this.DOM = {el: el};
					            // Current slide´s index.
					            this.current = 0;
					            // Slide instances.
					            this.slides = [];
					            Array.from(this.DOM.el.querySelectorAll('.page-flip-slide')).forEach((slide) => this.slides.push(new Slide(slide)));
					            this.slidesTotal = this.slides.length;
					            // Set the first slide as current.
					            this.slides[this.current].DOM.el.classList.add('page-flip-slide--current');
					            // The page turning animations.
					            this.pageturn = new PageTurn(this.DOM.el.querySelector('.page_flip_revealer'), this.slidesTotal);
					            // The arrows to navigate the slideshow.
					            this.pagination = {
					                prevCtrl: this.DOM.el.querySelector('.page-flip-arrow-nav__item--prev'),
					                nextCtrl: this.DOM.el.querySelector('.page-flip-arrow-nav__item--next')
					            };

					            this.initEvents();
					        }
					        initEvents() {
					            // Clicking on the next and previous arrows will turn the page to right or left.
					            const arrowClickPrevFn = () => this.pagethrough('prev');
					            const arrowClickNextFn = () => this.pagethrough('next');
					            this.pagination.prevCtrl.addEventListener('click', arrowClickPrevFn);
					            this.pagination.nextCtrl.addEventListener('click', arrowClickNextFn);
					            

					        }
					        // This function is executed at the middle point of the turning pages animation.
					        switchPage(newPagePos, direction = 'next') {
					            const currentSlide = this.slides[this.current];
					            const upcomingSlide = this.slides[newPagePos];
					            // Set the upcoming slide as current.
					            currentSlide.DOM.el.classList.remove('page-flip-slide--current');
					            currentSlide.resetItems();
					            upcomingSlide.DOM.el.style.zIndex = 100;
					            upcomingSlide.showItems(direction).then(() => {
					                upcomingSlide.DOM.el.classList.add('page-flip-slide--current');
					                upcomingSlide.DOM.el.style.zIndex = '';
					                this.isAnimating = false;
					            });

					            this.current = newPagePos;
					            // Update pagination ctrls visibility.
					            this.pagination.nextCtrl.style.visibility = this.current === this.slidesTotal-1 ? 'hidden' : 'visible';
					            this.pagination.prevCtrl.style.visibility = this.current === 0 ? 'hidden' : 'visible';
					        }
					        // Go to the next or previous page.
					        pagethrough(direction) {
					            if ( this.isAnimating || direction === 'next' && this.current === this.slidesTotal-1 || direction === 'prev' && this.current === 0 ) {
					                return false;
					            }
					            this.isAnimating = true;
					            const newPagePos = direction === 'next' ? this.current + 1 : this.current - 1;
					            this.pageturn.turn(direction, 1, () => this.switchPage(newPagePos, direction));
					        }

					        // Clicking a link inside the TOC will turn as many pages needed and jump to the specified page.
					        navigate(newPagePos) {
					            if ( this.isAnimating || newPagePos === this.current ) {
					                return false;
					            }
					            this.isAnimating = true;
					            // Close after clicking.
					            this.toggleToc();
					            const direction = newPagePos > this.current ? 'next' : 'prev';
					            // Turn [this.current-newPagePos] pages.
					            this.pageturn.turn(direction, Math.abs(this.current-newPagePos), () => this.switchPage(newPagePos, direction));
					        }
					    }

					    // Initialize the slideshow.
					    const slideshow = new Slideshow(document.querySelector('.page-flip-slideshow'));
					    
					    // Preload all the images in the page.
					    imagesLoaded(document.querySelectorAll('.page-flip-slide__figure-img'), {background: true}, () => document.body.classList.remove('loading'));
					}
	            });
	        })(jQuery)
	    </script>
		<?php }

		if( $settings['slider_select'] == '5' ) { ?>
	    <script>
	        ;(function($){
	            "use strict";
	            $(document).ready(function () {
						/*
						======================================
							Home Centered Image Carousel
						======================================
						*/
						(function() {
							var tCenImgCarousel = new Swiper('.tracem-centered-img-carousel', {
								slidesPerView: 3,
								spaceBetween: 0,
								autoplay: {
									delay: 4000,
									disableOnInteraction: false
								},
							    breakpoints: {
							        1024: {
							          slidesPerView: 2,
							        },
							        575: {
							          slidesPerView: 1,
							        }
							    },
								pagination: {
									el: '.swiper-pagination',
									clickable: true,
									renderBullet: function (index, className) {
									  return '<span class="' + className + '">0' + (index + 1) + '</span>';
									},
								},
							});

					    })();
	            });
	        })(jQuery)
	    </script>

		<?php }




		if( $settings['slider_select'] == '8' ) { ?>
	    <script>
	        ;(function($){
	            "use strict";
	            $(document).ready(function () {


					/*
					======================================
						Home Link Init
					======================================
					*/

					(function() {
						function previewImages() {
							let fImage = $('.home-link h2 .screenshot').first().attr('href');
							$('.home-link-area').css('background-image', 'url(' + fImage + ')');
							
						  	$("a.screenshot").hover(function(e) {
						  		$('.home-link-area').css('background-image', 'url(' + this.href + ')');
						    },
						    function() {
						      $("#previewImage").remove();
						    });
						};

						previewImages();

					})();

	            });
	        })(jQuery)
	    </script>
		<?php }
	}
}