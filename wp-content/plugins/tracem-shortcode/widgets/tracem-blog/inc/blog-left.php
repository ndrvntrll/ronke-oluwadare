<section class="tracem-blog-area right-sidebar ptb130">
    <div class="container">
        <div class="row">
			<div class="col-lg-8 sticky">
				<div class="tracem-blog">

					<?php
						/* Start the Loop */
						while ( $blog->have_posts() ) : $blog->the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/post/content', get_post_format() );

						endwhile; wp_reset_postdata();

						tracem_numeric_pagination();
					?>
				</div><!-- .tracem-blog -->
			</div><!-- .col-lg-9 .sticky -->

			<?php
			get_sidebar(); ?>
        </div><!-- .row -->
    </div><!-- .container-fluid -->
</section><!-- .blog-area -->