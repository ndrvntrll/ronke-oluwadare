<?php
/**
 * Tracem Styles
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

$tracem_page_header_activate 	= '';
$tracem_is_page_header 			= '';
$tracem_page_header_overlay     = 'rgba(255, 250, 241, .01)';
$tracem_page_header_image       = '';

$tracem_footer_top_bgc       	= '#121212';
$tracem_footer_top_cl       	= '#aaa';
$tracem_footer_top_cl_hover     = '#eee';

$tracem_footer_bottom_bgc       = '#121212';
$tracem_footer_bottom_cl       	= '#aaa';
$tracem_footer_bottom_cl_hover  = '#eee';

$tracem_footer_bottom_border_cl = '#232323';

$tracem_body_default_font_family = '';

if( ! function_exists( 'tracem_style' ) ) {
	function tracem_style() {
		if( function_exists( 'cs_get_option' ) ) {
		    $_tracem_page_header_options    = get_post_meta( get_the_ID(), '_tracem_page_header_options', true );

		    // Header Option
		    $tracem_page_header_activate    = isset( $_tracem_page_header_options['tracem_page_header_activate'] ) ? $_tracem_page_header_options['tracem_page_header_activate'] : '';
        	$tracem_is_page_header      	= isset( $_tracem_page_header_options['tracem_is_page_header'] ) ? $_tracem_page_header_options['tracem_is_page_header'] : '';


		    if( ( is_page() || 'portfolio' == get_post_type() ) && $tracem_page_header_activate == true && $tracem_is_page_header == true ) {
		        $tracem_page_header_overlay    = isset( $_tracem_page_header_options['tracem_page_header_overlay'] ) ? $_tracem_page_header_options['tracem_page_header_overlay'] : 'rgba(255, 250, 241, .01)';
		        $tracem_page_header_image      = isset( $_tracem_page_header_options['tracem_page_header_image'] ) ? $_tracem_page_header_options['tracem_page_header_image'] : get_template_directory_uri() . '/inc/images/header/just-waves.png';
	    		$tracem_page_header_image		= wp_get_attachment_image_url( $tracem_page_header_image, 'full' );
		    } else {
	    		$tracem_page_header_overlay     = cs_get_option( 'tracem_page_header_overlay', 'rgba(255, 250, 241, .01)' );
	    		$tracem_page_header_image       = cs_get_option( 'tracem_page_header_image' );
	    		$tracem_page_header_image		= wp_get_attachment_image_url( $tracem_page_header_image, 'full' );
		    }

		    if( $tracem_page_header_image == false ) {
		    	$tracem_page_header_image = get_template_directory_uri() . '/inc/images/header/just-waves.png';
		    } else {
		    	$tracem_page_header_image = $tracem_page_header_image;
		    }


        	// Footer Option
        	$tracem_is_page_footer_activate = isset( $_tracem_page_header_options['tracem_is_page_footer_activate'] ) ? $_tracem_page_header_options['tracem_is_page_footer_activate'] : '';

		    if( ( is_page() || 'portfolio' == get_post_type() ) && $tracem_is_page_footer_activate == true ) {
		        $tracem_footer_top_bgc    		= isset( $_tracem_page_header_options['tracem_footer_top_bgc'] ) ? $_tracem_page_header_options['tracem_footer_top_bgc'] : '#121212';
		        $tracem_footer_top_cl    		= isset( $_tracem_page_header_options['tracem_footer_top_cl'] ) ? $_tracem_page_header_options['tracem_footer_top_cl'] : '#aaa';
		        $tracem_footer_top_cl_hover    	= isset( $_tracem_page_header_options['tracem_footer_top_cl_hover'] ) ? $_tracem_page_header_options['tracem_footer_top_cl_hover'] : '#eee';


		        $tracem_footer_bottom_bgc    	= isset( $_tracem_page_header_options['tracem_footer_bottom_bgc'] ) ? $_tracem_page_header_options['tracem_footer_bottom_bgc'] : '#121212';
		        $tracem_footer_bottom_cl    	= isset( $_tracem_page_header_options['tracem_footer_bottom_cl'] ) ? $_tracem_page_header_options['tracem_footer_bottom_cl'] : '#aaa';
		        $tracem_footer_bottom_cl_hover  = isset( $_tracem_page_header_options['tracem_footer_bottom_cl_hover'] ) ? $_tracem_page_header_options['tracem_footer_bottom_cl_hover'] : '#eee';

		        $tracem_footer_bottom_border_cl = isset( $_tracem_page_header_options['tracem_footer_bottom_border_cl'] ) ? $_tracem_page_header_options['tracem_footer_bottom_border_cl'] : '#232323';
		    } else {
	    		$tracem_footer_top_bgc     		= cs_get_option( 'tracem_footer_top_bgc', '#121212' );
	    		$tracem_footer_top_cl     		= cs_get_option( 'tracem_footer_top_cl', '#aaa' );
	    		$tracem_footer_top_cl_hover     = cs_get_option( 'tracem_footer_top_cl_hover', '#eee' );

	    		$tracem_footer_bottom_bgc     	= cs_get_option( 'tracem_footer_bottom_bgc', '#121212' );
	    		$tracem_footer_bottom_cl     	= cs_get_option( 'tracem_footer_bottom_cl', '#aaa' );
	    		$tracem_footer_bottom_cl_hover  = cs_get_option( 'tracem_footer_bottom_cl_hover', '#eee' );

	    		$tracem_footer_bottom_border_cl = cs_get_option( 'tracem_footer_bottom_border_cl', '#232323' );
		    }

		    $tracem_body_default_font_family 	= cs_get_option( 'tracem_body_default_font_family' );
		    $tracem_body_extra_font_family 		= cs_get_option( 'tracem_body_extra_font_family' );
		    $tracem_brand_color 				= cs_get_option( 'tracem_brand_color' );
		    $tracem_btn_opacity_color 			= cs_get_option( 'tracem_btn_opacity_color' );
		    $tracem_body_font_size 				= cs_get_option( 'tracem_body_font_size', '18' );

			wp_enqueue_style( 'tracem-style', get_template_directory_uri() . '/css/tracem-style.css' );

			$custom_css = "
			body {
				font-family: {$tracem_body_default_font_family['family']} !important;
				font-size: {$tracem_body_font_size}px ! important;
			}

			.section-intro h3,
			.btn-generic a,
			.portfolio-extra-info span,
			.tracem-banner-one-area .swiper-pagination-bullet,
			.tracem-centered-img-carousel .swiper-pagination-bullet,
			.home-minimal h3,
			.btn-simple,
			.tracem-single-blog-post span,
			.leave-comment span,
			.widget_search form input[type='search'],
			.search-form .search-field,
			.blog-post-share p,
			#cancel-comment-reply-link,
			.comment-form input:not([type='submit']),
			.comment-form textarea,
			.footer-large h4,
			.subscribe-area h4,
			button,
			input,
			select,
			textarea,
			button,
			button[disabled]:hover,
			button[disabled]:focus,
			input[type='button'],
			input[type='button'][disabled]:hover,
			input[type='button'][disabled]:focus,
			input[type='reset'],
			input[type='reset'][disabled]:hover,
			input[type='reset'][disabled]:focus,
			input[type='submit'],
			input[type='submit'][disabled]:hover,
			input[type='submit'][disabled]:focus,
			.post-password-form label,
			input::placeholder,
			textarea::placeholder {
				font-family: {$tracem_body_default_font_family['family']} !important;
			}

			h1,
			h2,
			h3,
			h4,
			h5,
			h6,
			.home-minimal p.signature,
			.home-link h2,
			.single-project-counter .counter,
			.contact-form input[type='text'],
			.contact-form input[type='email'],
			.contact-form textarea,
			.counter-area span,
			.widget_recent_comments ul li .comment-author-link,
			.widget_rss .rsswidget,
			.btn-fill,
			.btn-fill:visited,
			.btn-fill:active,
			.chart-number span,
			.tracem-progress span,
			.progressbar-text,
			.testimonial-one .single-testimonial p.testi-text,
			.testimonial-two .single-testimonial p.testi-text,
			.testimonial-three .single-testimonial p.testi-text,
			.section-subscribe-area.subscribe-three .subscribe-text > p,
			.section-subscribe-area.subscribe-area .subscribe-form form .mailpoet_submit,
			.section-subscribe-area.subscribe-area .subscribe-form form input[type='email'],
			.footer-large form input[type='submit'],
			.subscribe-area form input[type='submit'],
			#mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-disable-link > a.mega-menu-link {
				font-family: {$tracem_body_extra_font_family['family']} !important;
			}

			.tracem-breadcrumb li.active,
			.tracem-breadcrumb li span.bread-current,
			.trsubtitle,
			.portfolio-sporadic .portfolio-details h4 a,
			.portfolio-sporadic .portfolio-details h4 a:hover,
			.simple-overlay .portfolio-details h4 a,
			.simple-overlay .portfolio-details h4 a:hover,
			.opacity .portfolio-details h4 a,
			.opacity .portfolio-details h4 a:hover,
			.boxed .portfolio-details h4 a,
			.boxed .portfolio-details h4 a:hover,
			.boxed-large .portfolio-details h4 a,
			.boxed-large .portfolio-details h4 a:hover,
			.default .portfolio-details h4 a,
			.default .portfolio-details h4 a:hover,
			.portfolio_category ul li a,
			.tracem-single-portfolio .portfolio-cat a,
			.widget ul li a:hover,
			.widget_tag_cloud .tagcloud a:hover,
			.blockquote-2 span,
			.blockquote-two blockquote h5 {
				color: {$tracem_brand_color} !important;
			}

			.btn-circle:hover:before,
			.boxed-reveal .portfolio-overlay,
			.form-submit:hover:before,
			.tracem-link-post,
			.pagination-area .pagination li.active a,
			.pagination-area .pagination li a:hover{
				background-color: {$tracem_brand_color} !important;
			}

			.blockquote-1 {
				border-left-color: {$tracem_brand_color} !important;
			}

			.single-project-counter-3 {
				border-color: {$tracem_brand_color} !important;
			}

			.tracem-breadcrumb-area {
				background-image: url({$tracem_page_header_image}) !important;
			}

			.breadcrumb-overlay {
				background-color: {$tracem_page_header_overlay};
			}

			.footer-simple-area .footer-large {
				background-color: {$tracem_footer_top_bgc};
			}

			.footer-large form input[type='email']::placeholder,
			.footer-navigation ul li a,
			.footer-simple-area p.mailpoet_paragraph {
				color: {$tracem_footer_top_cl} !important;
			}

			.footer-large form input[type='submit'],
			.subscribe-area form input[type='submit'],
			.footer-large form input[type='email'],
			.subscribe-area form input[type='email'],
			.footer-navigation ul li a:hover {
				color: {$tracem_footer_top_cl_hover} !important;
			}

			.footer-navigation ul li a:before {
				background-color: {$tracem_footer_top_cl_hover} !important;
			}

			.footer-simple-area .footer-small {
				background-color: {$tracem_footer_bottom_bgc};
			}

			.footer-simple-area p,
			.footer-simple-area p a,
			.footer-social li a {
				color: {$tracem_footer_bottom_cl} !important;
			}

			.footer-simple-area p a:before {
				background-color: {$tracem_footer_bottom_cl} !important;
			}

			.footer-simple-area p a:hover,
			.footer-social li a:hover {
				color: {$tracem_footer_bottom_cl_hover} !important;
			}

			.footer-simple-area p a:hover:before {
				background-color: {$tracem_footer_bottom_cl_hover} !important;
			}

			.footer-small {
				border-top-color: {$tracem_footer_bottom_border_cl} !important;
			}

			.form-submit:before {
				background: {$tracem_btn_opacity_color} !important;
			}
			";

			wp_add_inline_style( 'tracem-style', $custom_css );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'tracem_style', 90 );