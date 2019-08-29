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

$standard_class = 'tracem-single-blog-post tracem-standard-post';
$margin_class 	= '';

if( is_single() ) {
	$margin_class = 'no-margin';
} else {
	$margin_class = '';
}

?>

<article id="<?php the_ID(); ?>" <?php post_class( array( $standard_class, $margin_class ) ); ?>>

    <div class="post-img-wrapper">
        <?php tracem_post_thumbnail(); ?>
    </div><!-- .post-img-wrapper -->

	<?php 
	the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>

    <div class="post-content">
		<?php
		the_excerpt( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'tracem' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		?>
        <a class="btn-circle" href="<?php echo get_permalink(); ?>">
        	<span><?php esc_html_e( 'Read More', 'tracem' ); ?></span>
			<svg width="13px" height="10px" viewBox="0 0 13 10">
				<path d="M1,5 L11,5"></path>
				<polyline points="8 1 12 5 8 9"></polyline>
			</svg>
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
    </div><!-- .post-content -->
</article>