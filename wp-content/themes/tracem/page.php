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
?>

    <section class="tracem-blog-area right-sidebar ptb130">
        <div class="container">
            <div class="row">
				<div class="col-lg-12">
					<div class="tracem-blog">

						<?php

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/post/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile;
						?>
					</div><!-- .tracem-blog -->
				</div><!-- .col-lg-9 .sticky -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </section><!-- .blog-area -->


<?php
get_footer();