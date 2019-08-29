(function ($) {

	"use strict";


	/*
	======================================
		Tracem Testimonial Slider
	======================================
	*/
	(function() {

	    var testiMSlider = new Swiper('.testimonial-container', {
	      navigation: {
	        nextEl: '.swiper-button-next',
	        prevEl: '.swiper-button-prev',
	      },
	    });

	})();


	/*
	======================================
		Tracem Client Slider
	======================================
	*/
	(function() {

	    var tClients = new Swiper('.clients-two .clients-container', {
	      slidesPerView: 5,
	      spaceBetween: 50,
	      breakpoints: {
	        1024: {
	          slidesPerView: 4,
	          spaceBetween: 40,
	        },
	        768: {
	          slidesPerView: 3,
	          spaceBetween: 30,
	        },
	        640: {
	          slidesPerView: 2,
	          spaceBetween: 20,
	        },
	        320: {
	          slidesPerView: 1,
	          spaceBetween: 10,
	        }
	      }
	    });

	})();



	/*
	======================================
		Window On Load Init
	======================================
	*/
	(function() {

		jQuery(window).on('load', function() {


			$('.loader-wraper').delay(300).fadeOut('slow');


			/*
			======================================
				Isotop Init
			======================================
			*/
			jQuery('#portfolio-container').isotope({
				itemSelector: '.grid-item',
				percentPosition: true,
                transformsEnabled: true,
                transitionDuration: "1000ms",
				masonry: {
					// use element for option
					columnWidth: '.grid-sizer'
				}
			});

			jQuery('#portfolio-sporadic').isotope({
			  // set itemSelector so .grid-sizer is not used in layout
				layoutMode: 'cellsByRow',
				itemSelector: '.grid-sporadic-item',
				percentPosition: true,
				resizable: false,
				cellsByRow: {
				    columnWidth: '.grid-sporadic-sizer',
				    rowHeight: '.grid-sporadic-sizer'
				}
			});

			jQuery('.single-banner-text.swiper-slide-active .banner-right h2').addClass('animation-loaded');
			jQuery('.single-banner-text.swiper-slide-active .banner-left h3').addClass('animation-loaded');
			jQuery('.single-banner-text.swiper-slide-active .banner-left h4').addClass('animation-loaded');
			jQuery('.single-banner-text.swiper-slide-active .banner-left .btn-generic a span').addClass('animation-loaded');
			jQuery('.single-banner-text.swiper-slide-active .banner-left .total-view').addClass('animation-loaded');
			jQuery('.single-banner-text.swiper-slide-active .banner-left .total-like').addClass('animation-loaded');
			jQuery('.single-banner-text.swiper-slide-active .banner-left .total-comment').addClass('animation-loaded');
			jQuery('.single-banner-text.swiper-slide-active .banner-left .portfolio-extra-info').addClass('animation-loaded');
			jQuery('.home-split .single-split-image.active .split-image h4').addClass('animation-loaded');
			jQuery('.home-split .single-split-text.active .split-text .btn-generic span').addClass('animation-loaded');
			jQuery('.home-split .single-split-text.active .split-text .title-cats h3').addClass('animation-loaded');
			jQuery('.home-split .single-split-text.active .split-text .title-cats h2').addClass('animation-loaded');
			jQuery('.home-split .single-split-text.active .split-text h4').addClass('animation-loaded');
			jQuery('.home-split .single-split-text.active .portfolio-social-area').addClass('animation-loaded');
			jQuery('.home-split .single-split-text.active .portfolio-extra-info').addClass('animation-loaded');
			jQuery('.home-split .single-split-text.active .portfolio-extra-info span').addClass('animation-loaded');


			jQuery('.single-fullwidth-slide.swiper-slide-active .fullwidth-left h4').addClass('animation-loaded');
			jQuery('.single-fullwidth-slide.swiper-slide-active .fullwidth-left .btn-simple').addClass('animation-loaded');
			jQuery('.single-fullwidth-slide.swiper-slide-active .fullwidth-right h2').addClass('animation-loaded');
			jQuery('.showcase-container .single-showcase:nth-child(1)').addClass('animation-loaded');
			jQuery('.tracem-portfolio-centered .single-portfolio-centered:nth-child(1) .single-port-center-wrapper').addClass('animation-loaded');
			jQuery('.single-centered-carousel-content:nth-child(1)').addClass('animation-loaded');
			jQuery('.home-floating-area.is-animation').addClass('animation-loaded');
			jQuery('.gradient-portfolio .img-wrapper').addClass('animation-loaded');
			jQuery('.about-intro-area .about-intro.is_animation').addClass('animation-loaded');
			jQuery('.tracem-breadcrumb.is_animation').addClass('animation-loaded');
			jQuery('.tracem-portfolio-area.is_animation .grid-sporadic-item:nth-child(2)').addClass('animation-loaded');
			jQuery('.tracem-portfolio-area.is_animation .grid-sporadic-item:nth-child(3)').addClass('animation-loaded');
			jQuery('.single-gallery-slide.swiper-slide-active').addClass('animation-loaded');
		});

	})();


	/*
	======================================
		Slinky Menu Init
	======================================
	*/
	(function() {

		const slinky = $('.tracem-mobile-menu .tracem-shrink').slinky();
		const Lslinky = $('.tracem-left-menu-area .left-menu-wrapper').slinky();

		$('section').on('click', function() {
			$('.tracem-mobile-menu-area .slinky-menu').css('height', '82px');
			$('.tracem-mobile-menu-area .mobile-main-ul').css('left', '0');
			$('.tracem-mobile-menu-area').addClass('remove-menu');
		});
		

	})();



	/*
	======================================
		Scroll Init
	======================================
	*/
	(function() {

		$(window).on('scroll', function() {
			/*
			======================================
				ScrollTop Visibility Init
			======================================
			*/
			var $scrollTop 	= jQuery(window).scrollTop();
			var $top 		= jQuery('#top');
			
			if( $scrollTop > 500 ) {
				$top.fadeIn(500);
			} else {
				$top.fadeOut(500);
			}


			var $headerH 	= jQuery('.header-area').height();
			var $windowH 	= jQuery(window).scrollTop();
			var $nav 		= jQuery('.header-area');
			var $mNav		= jQuery('.tracem-mobile-menu-area');

			if( $windowH > $headerH ) {
				$nav.addClass('fixed');
				$mNav.addClass('fixed');
			} else {
				$nav.removeClass('fixed');
				$mNav.removeClass('fixed');
			}

		});
	})();




	/*
	======================================
		ScrollTop Init
	======================================
	*/
	(function() {
		$('#top').on('click', function(){
			$('html, body').animate({'scrollTop': '0px'}, 3000, "easeInOutExpo");
			return false;
		});
	})();

	/*
	======================================
		Home Fullwidth Slider
	======================================
	*/
	(function() {
	    var tFullSliderEl = new Swiper('.home-fullwidth-slider', {
			loop: true,
			effect: 'fade',
			autoplay: {
				delay: 4000,
				disableOnInteraction: false
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
	    });

		tFullSliderEl.on( 'transitionStart', function() {

			var $fullLeftH4Ael	= jQuery('.single-fullwidth-slide.swiper-slide-active .fullwidth-left h4'),
			$fullLeftH4El		= jQuery('.single-fullwidth-slide .fullwidth-left h4');

			if( ! $fullLeftH4Ael.hasClass('animation-loaded') ) {
				jQuery('.single-fullwidth-slide.swiper-slide-active .fullwidth-left h4', function() {
					$fullLeftH4El.removeClass('animation-loaded');
					$fullLeftH4Ael.addClass('animation-loaded');
				});
			}

			var $fullLeftAncAel	= jQuery('.single-fullwidth-slide.swiper-slide-active .fullwidth-left .btn-simple'),
			$fullLeftAncEl		= jQuery('.single-fullwidth-slide .fullwidth-left .btn-simple');

			if( ! $fullLeftAncAel.hasClass('animation-loaded') ) {
				jQuery('.single-fullwidth-slide.swiper-slide-active .fullwidth-left .btn-simple', function() {
					$fullLeftAncEl.removeClass('animation-loaded');
					$fullLeftAncAel.addClass('animation-loaded');
				});
			}

			var $fullRightH2Ael	= jQuery('.single-fullwidth-slide.swiper-slide-active .fullwidth-right h2'),
			$fullRightH2El		= jQuery('.single-fullwidth-slide .fullwidth-right h2');

			if( ! $fullRightH2Ael.hasClass('animation-loaded') ) {
				jQuery('.single-fullwidth-slide.swiper-slide-active .fullwidth-right h2', function() {
					$fullRightH2El.removeClass('animation-loaded');
					$fullRightH2Ael.addClass('animation-loaded');
				});
			}


		});

	})();



	/*
	======================================
		On Scroll Animation
	======================================
	*/
    (function() {

	    try {

	        $('.tracem-portfolio-area.is_animation .grid-sporadic-item').appear(function() {
	        	$(this).addClass('animation-loaded');
	        });

	    } catch (err) {
	    }
    
    })();




	/*
	======================================
		Counter Up INIT
	======================================
	*/
	(function() {
        jQuery('.counter').counterUp({
            delay: 10,
            time: 1500
        });
	})();


	/*
	======================================
		Single Portfolio Slide Show
	======================================
	*/
	(function() {
		var tSinPortSlide = new Swiper('.single-portfolio-three .portfolio-img', {
	      spaceBetween: 30,
	      pagination: {
	        clickable: true,
	      },
		});

		var tSinPortSlide2 = new Swiper('.single-portfolio-five .portfolio-img', {
	      spaceBetween: 30,
	      pagination: {
	        clickable: true,
	      },
		});

    })();



	/*
	======================================
		Gallery Post Format Slide
	======================================
	*/
	(function() {
	    var tGaleryPostSlide = new Swiper('.gallery-post-container', {
	    	loop: true,
			autoplay: {
				delay: 4000,
				disableOnInteraction: false
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
	    });

		tGaleryPostSlide.on( 'transitionStart', function() {

			if( $('.single-gallery-slide').hasClass('swiper-slide-active') ) {
				$('.single-gallery-slide').removeClass('animation-loaded');
				$('.single-gallery-slide.swiper-slide-active').addClass('animation-loaded');
			}
		});
    })();



	/*
	======================================
		Pie Chart
	======================================
	*/
	(function() {

		if( $('.piechart-01').length ) {
		    try {
		        jQuery('.piechart-01').appear(function () {
					$.each($('.chart-wrapper-1'), function(index) {
					    let $element 	= document.querySelector('.chart-1 .chart-1-' + index);
					    let $size 		= $('.chart-wrapper-1 .chart-value').data('size');
					    let $width 		= $('.chart-wrapper-1 .chart-value').data('width');
					    let $barcolor 	= $('.chart-wrapper-1 .chart-value').data('barcolor');
					    let $tcolor 	= $('.chart-wrapper-1 .chart-value').data('tcolor');
					    new EasyPieChart($element, {
					        scaleColor: false,
					        size: $size,
					        barColor: $barcolor,
					        lineWidth: $width,
					        trackColor: $tcolor
					    });
					});
		        });
		    } catch (err) {
		    }
		}

		if( $('.piechart-02').length ) {
		    try {
		        jQuery('.piechart-02').appear(function () {
					$.each($('.chart-wrapper-2'), function(index) {
					    let $element 	= document.querySelector('.chart-2 .chart-2-' + index);
					    let $size 		= $('.chart-wrapper-2 .chart-value').data('size');
					    let $width 		= $('.chart-wrapper-2 .chart-value').data('width');
					    let $barcolor 	= $('.chart-wrapper-2 .chart-value').data('barcolor');
					    let $tcolor 	= $('.chart-wrapper-2 .chart-value').data('tcolor');
					    new EasyPieChart($element, {
					        scaleColor: false,
					        size: $size,
					        barColor: $barcolor,
					        lineWidth: $width,
					        trackColor: $tcolor
					    });
					});
		        });
		    } catch (err) {
		    }
		}

		if( $('.piechart-03').length ) {
		    try {
		        jQuery('.piechart-03').appear(function () {
					$.each($('.chart-wrapper-3'), function(index) {
					    let $element 	= document.querySelector('.chart-3 .chart-3-' + index);
					    let $size 		= $('.chart-wrapper-3 .chart-value').data('size');
					    let $width 		= $('.chart-wrapper-3 .chart-value').data('width');
					    let $barcolor 	= $('.chart-wrapper-3 .chart-value').data('barcolor');
					    let $tcolor 	= $('.chart-wrapper-3 .chart-value').data('tcolor');
					    new EasyPieChart($element, {
					        scaleColor: false,
					        size: $size,
					        barColor: $barcolor,
					        lineWidth: $width,
					        trackColor: $tcolor
					    });
					});
		        });
		    } catch (err) {
		    }
		}

    })();

	/*
	======================================
		Progress Bar INIT
	======================================
	*/
	(function() {
		// progressbar.js@1.0.0 version is used
		// Docs: http://progressbarjs.readthedocs.org/en/1.0.0/

		function tracem_progress_bar_line_init( $string, $val = 100, $color ) {
			if( $($string).length ) {
				var $string = new ProgressBar.Line($string, {
					strokeWidth: 5,
					easing: 'easeInOut',
					duration: 1400,
					color: $color,
					trailColor: 'transparent',
					trailWidth: 5,
					svgStyle: {width: $val + '%', height: '100%'},
					text: {
					style: {
						// Text color.
						// Default: same as stroke color (options.color)
						transform: null
					},
						autoStyleContainer: false
					},
					step: (state, $string) => {
						$string.setText(Math.round($string.value() * $val) + ' %');
					}
				});
				$string.animate(1.0);  // Number from 0.0 to 1.0
			}
		}


		if( $('.progressbar-01').length ) {
		    try {
			    let $i = 1;
		        jQuery('.progressbar-01').appear(function () {
					$.each($('.progressbar-01'), function(index) {
						let $number 	= $(this).find('.tracem-progress-bar-1-' + $i).data('number');

					    tracem_progress_bar_line_init( '.tracem-progress-bar-1-' + $i, $number, '#121212' );
					    $i++;
					});
		        });
		    } catch (err) {
		    }
		}


		if( $('.progressbar-02').length ) {
		    try {
			    let $i = 1;
		        jQuery('.progressbar-02').appear(function () {
					$.each($('.progressbar-02'), function(index) {
						let $number 	= $(this).find('.tracem-progress-bar-2-' + $i).data('number');

					    tracem_progress_bar_line_init( '.tracem-progress-bar-2-' + $i, $number, '#121212' );
					    $i++;
					});
		        });
		    } catch (err) {
		    }
		}

    })();


	/*
	======================================
		Form submit svg
	======================================
	*/
	(function() {
		$('.comments-area .form-submit').append('<svg width="13px" height="10px" viewBox="0 0 13 10"><path d="M1,5 L11,5"></path><polyline points="8 1 12 5 8 9"></polyline></svg>');
	})();


	/*
	======================================
		Height Emulator
	======================================
	*/
	(function() {
		if( $('.height-emulator').length ) {
			$('.height-emulator').css({
		        height: $('.footer-simple-area').outerHeight(true)
		    });
		}
	})();


	/*
	======================================
		Lightbox
	======================================
	*/
	(function() {
		$('.mixed').flashy();
	})();


	/*
	======================================
		WOW JS
	======================================
	*/
	(function() {
		new WOW().init();
	})();

})(jQuery);