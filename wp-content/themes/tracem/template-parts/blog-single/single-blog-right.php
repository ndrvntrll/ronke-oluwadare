<?php
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

<section class="tracem-blog-area left-sidebar ptb130<?php echo esc_attr( $is_sidebar ); ?>">
    <div class="container">
        <div class="row">
            <?php
            get_sidebar(); ?>
            
			<div class="<?php echo esc_attr( $grid_class ); ?>">
				<div class="tracem-blog">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/post/content', get_post_type() ); ?>

                        <?php
                        if( get_the_author_meta( 'description' ) ) { ?>
                            <div class="post-author-bio">
                                <div class="row">
                                    <div class="col-sm-2">
                                    	<?php
                                    	$user_id = get_the_author_meta( 'ID' );
                                    	echo get_avatar( $user_id, 120 ); ?>
                                    </div><!-- .col-4 -->
                                    <div class="col-sm-10 align-self-center">
                                        <h4><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author_meta( 'nickname' ); ?></a></h4>
                                        <h6><?php echo get_the_author_meta( 'designation' ); ?></h6>
                                        <p><?php echo get_the_author_meta( 'description' ); ?></p>
                                        <?php
                                        if( ! empty( get_the_author_meta( 'signature' ) ) ) { ?>
                                            <img class="signature" src="<?php echo esc_url( get_the_author_meta( 'signature' ) ); ?>" alt="<?php echo get_the_author_meta( 'nickname' ); ?>">
                                        <?php } ?>
                                    </div><!-- .col-8 -->
                                </div><!-- .row -->
                            </div><!-- .post-author-bio -->
                        <?php } ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div><!-- .tracem-blog -->
			</div><!-- .col-sm-9 .sticky -->
        </div><!-- .row -->
    </div><!-- .container-fluid -->
</section><!-- .blog-area -->