<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

$tracem_header_select			= '';


if( function_exists( 'cs_get_option' ) ) {
	$_tracem_page_header_options 	= get_post_meta( get_the_ID(), '_tracem_page_header_options', true );
	$tracem_is_page_menu 			= isset( $_tracem_page_header_options['tracem_is_page_menu'] ) ? $_tracem_page_header_options['tracem_is_page_menu'] : '';

	if( is_page() && $tracem_is_page_menu == true ) {

		// This data comes from specific page option
		$tracem_header_select 			= isset( $_tracem_page_header_options['tracem_header_select'] ) ? $_tracem_page_header_options['tracem_header_select'] : '';
	} else {
		// If page options turn off then theme options
		$tracem_header_select 			= cs_get_option( 'tracem_header_select' );
	}
}

$wrapper_class = '';
if( $tracem_header_select == 'v5' ) {
	$wrapper_class = 'is-left-menu';
} else {
	$wrapper_class = '';
}


?>

<div class="tracem-fullwidth-wrapper <?php echo esc_attr( $wrapper_class ); ?>" id="page-<?php the_ID(); ?>">
	<div class="template-content">
		<?php
		the_content( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'tracem' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tracem' ),
			'after'  => '</div>',
		) ); ?>
	</div><!-- /.template-content -->
	
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'tracem' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</div><!-- #post-## -->
