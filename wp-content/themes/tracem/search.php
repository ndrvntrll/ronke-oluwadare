<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
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

					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						$i = 1;
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							set_query_var( 'count', $i );
							get_template_part( 'template-parts/post/content', 'search' );

						$i++;
						endwhile;

						tracem_numeric_pagination();

					else :

						get_template_part( 'template-parts/post/content', 'none' );

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