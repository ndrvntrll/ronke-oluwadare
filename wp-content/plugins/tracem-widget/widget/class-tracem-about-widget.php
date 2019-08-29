<?php
/**
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

/**
 * Add About Widget
 */

class Tracem_Widget_About extends Tracem_Widget {
	/**
	 * Register widget with WordPress
	 */
	public function __construct() {
		parent::__construct(
			'tracem_about_me',	// Base ID
			esc_html__( 'Tracem About Me', 'tracem' ),	// Name
			array( 'description' => esc_html__( 'Widgets to display about information', 'tracem' ) )	// Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo wp_kses_post( $args['before_widget'] );

		if( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
		}

		echo '<div class="widget-about">';
			if( ! empty( $instance['image'] ) ) {
				$img_url = wp_get_attachment_image_url( $instance['image'], 'thumbnail' );
				echo '<img class="wid-about-img" src="' . esc_url( $img_url ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
			}

			echo '<div class="widget-author-des">';
				
				if( ! empty( $instance['description'] ) ) {
					echo '<p>' . wp_kses_post( $instance['description'] ) . '</p>';
				}

				if( ! empty( $instance['signature'] ) ) {
					$img_url = wp_get_attachment_url( $instance['signature'] );
					echo '<div class="about-signature"><img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '"></div>';
				}

				if( ! empty( $instance['facebook_text'] ) || ! empty( $instance['twitter_text'] ) || ! empty( $instance['linkedin_text'] ) || ! empty( $instance['dribbble_text'] ) || ! empty( $instance['pinterest_text'] ) || ! empty( $instance['g_plus_text'] ) || ! empty( $instance['youtube_text'] ) || ! empty( $instance['flickr_text'] ) || ! empty( $instance['behance_text'] ) || ! empty( $instance['vimeo_text'] ) ) {

					echo '<div class="about-social"><ul>';

						if( ! empty( $instance['facebook_text'] ) || ! empty( $instance['facebook_url'] ) ) {
							echo '<li><a href="' . esc_url( $instance['facebook_url'] ) . '">' . esc_html( $instance['facebook_text'] ) . '</a></li>';
						}

						if( ! empty( $instance['twitter_text'] ) || ! empty( $instance['twitter_url'] ) ) {
							echo '<li><a href="' . esc_url( $instance['twitter_url'] ) . '">' . esc_html( $instance['twitter_text'] ) . '</a></li>';
						}

						if( ! empty( $instance['linkedin_text'] ) || ! empty( $instance['linkedin_url'] ) ) {
							echo '<li><a href="' . esc_url( $instance['linkedin_url'] ) . '">' . esc_html( $instance['linkedin_text'] ) . '</a></li>';
						}

						if( ! empty( $instance['dribbble_text'] ) || ! empty( $instance['dribbble_url'] ) ) {
							echo '<li><a href="' . esc_url( $instance['dribbble_url'] ) . '">' . esc_html( $instance['dribbble_text'] ) . '</a></li>';
						}

						if( ! empty( $instance['pinterest_text'] ) || ! empty( $instance['pinterest_url'] ) ) {
							echo '<li><a href="' . esc_url( $instance['pinterest_url'] ) . '">' . esc_html( $instance['pinterest_text'] ) . '</a></li>';
						}

						if( ! empty( $instance['g_plus_text'] ) || ! empty( $instance['g_plus_url'] ) ) {
							echo '<li><a href="' . esc_url( $instance['g_plus_url'] ) . '">' . esc_html( $instance['g_plus_text'] ) . '</a></li>';
						}

						if( ! empty( $instance['youtube_text'] ) || ! empty( $instance['youtube_url'] ) ) {
							echo '<li><a href="' . esc_url( $instance['youtube_url'] ) . '">' . esc_html( $instance['youtube_text'] ) . '</a></li>';
						}

						if( ! empty( $instance['flickr_text'] ) || ! empty( $instance['flickr_url'] ) ) {
							echo '<li><a href="' . esc_url( $instance['flickr_url'] ) . '">' . esc_html( $instance['flickr_text'] ) . '</a></li>';
						}

						if( ! empty( $instance['behance_text'] ) || ! empty( $instance['behance_url'] ) ) {
							echo '<li><a href="' . esc_url( $instance['behance_url'] ) . '">' . esc_html( $instance['behance_text'] ) . '</a></li>';
						}

						if( ! empty( $instance['vimeo_text'] ) || ! empty( $instance['vimeo_url'] ) ) {
							echo '<li><a href="' . esc_url( $instance['vimeo_url'] ) . '">' . esc_html( $instance['vimeo_text'] ) . '</a></li>';
						}

					echo '</ul></div>';
				}

			echo '</div>';

		echo '</div>';

		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Recent Posts field with Codestar Framework
	 */
	function get_options() {
		return array(

			array(
				'id'			=> 'title',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Title', 'tracem' )
			),

			array(
				'id'			=> 'image',
				'type'			=> 'image',
				'title'			=> esc_html__( 'Image', 'tracem' )
			),

			array(
				'id'			=> 'description',
				'type'			=> 'textarea',
				'title'			=> esc_html__( 'Description', 'tracem' )
			),

			array(
				'id'			=> 'facebook_text',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Facebook Text', 'tracem' )
			),

			array(
				'id'			=> 'facebook_url',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Facebook URL', 'tracem' )
			),

			array(
				'id'			=> 'twitter_text',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Twitter Text', 'tracem' )
			),

			array(
				'id'			=> 'twitter_url',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Twitter URL', 'tracem' )
			),

			array(
				'id'			=> 'linkedin_text',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Linkedin Text', 'tracem' )
			),

			array(
				'id'			=> 'linkedin_url',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Linkedin URL', 'tracem' )
			),

			array(
				'id'			=> 'dribbble_text',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Dribbble Text', 'tracem' )
			),

			array(
				'id'			=> 'dribbble_url',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Dribbble URL', 'tracem' )
			),

			array(
				'id'			=> 'pinterest_text',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Pinterest Text', 'tracem' )
			),

			array(
				'id'			=> 'pinterest_url',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Pinterest URL', 'tracem' )
			),

			array(
				'id'			=> 'g_plus_text',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Google+ Text', 'tracem' )
			),

			array(
				'id'			=> 'g_plus_url',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Google+ URL', 'tracem' )
			),

			array(
				'id'			=> 'youtube_text',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Youtube Text', 'tracem' )
			),

			array(
				'id'			=> 'youtube_url',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Youtube URL', 'tracem' )
			),

			array(
				'id'			=> 'flickr_text',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Flickr Text', 'tracem' )
			),

			array(
				'id'			=> 'flickr_url',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Flickr URL', 'tracem' )
			),

			array(
				'id'			=> 'behance_text',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Behance Text', 'tracem' )
			),

			array(
				'id'			=> 'behance_url',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Behance URL', 'tracem' )
			),

			array(
				'id'			=> 'vimeo_text',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Vimeo Text', 'tracem' )
			),

			array(
				'id'			=> 'vimeo_url',
				'type'			=> 'text',
				'title'			=> esc_html__( 'Vimeo URL', 'tracem' )
			),

			array(
				'id'			=> 'signature',
				'type'			=> 'image',
				'title'			=> esc_html__( 'Signature', 'tracem' )
			),

		);
	}
}

