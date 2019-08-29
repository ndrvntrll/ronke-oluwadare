<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tracem
 */

get_header();

$grid_class = 'col-lg-8';
$is_sidebar = '';
if( is_active_sidebar( 'tracem-sidebar' ) ) {
	$grid_class = 'col-lg-8';
	$is_sidebar = ' is-sidebar';
} else {
	$grid_class = 'col-lg-12';
	$is_sidebar = '';
}

?>

    <section class="tracem-blog-area right-sidebar ptb130<?php echo esc_attr( $is_sidebar ); ?>">
        <div class="container">
            <div class="row">
				<div class="<?php echo esc_attr( $grid_class ); ?>">
					<div class="tracem-blog">

						<?php if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/post/content', get_post_type() );

							endwhile;

							tracem_numeric_pagination();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
					</div><!-- .tracem-blog -->
				</div><!-- .col-lg-9 .sticky -->

				<?php
				get_sidebar(); ?>
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </section><!-- .blog-area -->


<?php
get_footer();