<?php
$grid_class = 'col-lg-8';
$is_sidebar = '';
if( is_active_sidebar( 'tracem-sidebar' ) ) {
	$grid_class = 'col-lg-8';
	$is_sidebar = 'is-sidebar';
} else {
	$grid_class = 'col-lg-12';
	$is_sidebar = '';
}
?>

<section class="tracem-blog-area left-sidebar ptb130 <?php echo esc_attr( $is_sidebar ); ?>">
    <div class="container">
        <div class="row">
			<?php
			get_sidebar(); ?>
			
			<div class="<?php echo esc_attr( $grid_class ); ?>">
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
			</div><!-- .col-lg-9 .sticky -->
        </div><!-- .row -->
    </div><!-- .container-fluid -->
</section><!-- .blog-area -->