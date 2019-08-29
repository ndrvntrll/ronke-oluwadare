<section class="tracem-blog-area ptb130">
    <div class="container">
        <div class="row justify-content-md-center">
			<div class="col-md-10">
				<div class="tracem-blog">

					<?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif;

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/post/content', get_post_format() );

						endwhile;

						tracem_numeric_pagination();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div><!-- .tracem-blog -->
			</div><!-- .col-lg-10 -->
        </div><!-- .row -->
    </div><!-- .container-fluid -->
</section><!-- .blog-area -->
