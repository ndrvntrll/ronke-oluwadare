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

$image_class = 'tracem-single-blog-post tracem-image-post';

$is_comment = '';
if( comments_open() ) {
	$is_comment = 'tracem-open-comment';
} else {
	$is_comment = '';
}

?>

<article id="<?php the_ID(); ?>" <?php post_class( array( $image_class, $is_comment ) ); ?>>
    <div class="post-img-wrapper">
        <?php tracem_post_thumbnail(); ?>
    </div><!-- .post-img-wrapper -->

    <div class="post-info">
    	<?php tracem_post_meta(); ?>
    </div><!-- .post-info -->

	<?php
	if( is_single() ) {
		the_title( '<h2>', '</h2>' );
	} else {
		the_title( '<h2 class="single-post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
	}
	?>

    <div class="post-content">
		<?php
		if( ! is_single() ) {
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
		} else {
			the_content( sprintf(
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
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tracem' ),
				'after'  => '</div>',
			) );
		}

    	if( comments_open() ) {
    		echo '<div class="leave-comment">';

    			tracem_entry_footer();

    		echo '</div>';
    	}

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