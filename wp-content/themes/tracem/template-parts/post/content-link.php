<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

?>

<article id="<?php the_ID(); ?>" <?php post_class( 'tracem-single-blog-post tracem-link-post' ); ?>>

	<?php
	the_title( '<h2><a target="_blank" href="'.esc_url(get_the_content()).'">', '</a></h2>' ); ?>

    <a target="_blank" href="<?php echo esc_url(get_the_content()); ?>">
        <i class="ti ti-link"></i>
    </a>

	<div class="edit-post-link">
		<?php
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'tracem' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
		?>
	</div><!-- .edit-post-link -->
</article>