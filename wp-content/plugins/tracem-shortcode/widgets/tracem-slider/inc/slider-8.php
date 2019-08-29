<!-- ============================================================================ -->
<!-- ================================ Home Link ================================= -->
<!-- ============================================================================ -->

<div class="home-link-area">
    <div class="container-fluid">
        <div class="row tracem-shrink no-gutters">
            <div class="col">
                <div class="home-link">
                    <?php
                    while( $portfolio->have_posts() ) : $portfolio->the_post();
                    $portfolio_thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>

                       <h2><a class="screenshot strip" href="<?php echo esc_url( $portfolio_thumb ) ?>"><?php the_title(); ?></a></h2>

                    <?php endwhile; wp_reset_postdata(); ?>
                </div><!-- .home-link -->
            </div><!-- .col-md-6 -->
        </div><!-- .row -->
    </div><!-- .container-fluid -->
</div><!-- .home-link-area -->