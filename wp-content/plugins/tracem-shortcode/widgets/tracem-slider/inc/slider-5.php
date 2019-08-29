<!-- ============================================================================ -->
<!-- ========================== Home Centered Carousel ========================== -->
<!-- ============================================================================ -->

<div class="tracem-centered-img-carousel-area tracem-relative-large">
    <div class="container-fluid no-padding">
        <div class="row">
            <div class="col">
                <div class="tracem-centered-img-carousel">
                    <div class="tracem-centered-img-carousel-wrapper swiper-wrapper">
                        <?php
                        while( $portfolio->have_posts() ) : $portfolio->the_post();
                        $portfolio_thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );


                        $tracem_portfolio_opt   = get_post_meta( get_the_ID(), '_tracem_portfolio_options', true );
                        $tracem_portfolio_ct    = isset( $tracem_portfolio_opt['tracem_portfolio_custom_title'] ) ? $tracem_portfolio_opt['tracem_portfolio_custom_title'] : '';
                        $tracem_portfolio_lw    = isset( $tracem_portfolio_opt['tracem_portfolio_link_window'] ) ? $tracem_portfolio_opt['tracem_portfolio_link_window'] : '';
                        ?>

                            <div class="single-centered-img-carousel-content swiper-slide">
                                <img src="<?php echo esc_url( $portfolio_thumb ); ?>" alt="<?php esc_attr_e( get_the_title() ); ?>">
                                <div class="centered-carousel-img-text">
                                    <h4><?php echo get_the_term_list( get_the_ID(), 'portfolio_category', '', ', ' ); ?></h4>
                                    <?php
                                    if( ! empty( $tracem_portfolio_ct ) ) {
                                        the_title( '<h3><a href="' . esc_url( $tracem_portfolio_ct ) . '" target="' . esc_attr( $tracem_portfolio_lw ) . '">', '</a></h3>' );
                                    } else {
                                        the_title( '<h3><a href="' . get_the_permalink() . '">', '</a></h3>' );
                                    } ?>
                                </div><!-- .centered-carousel-img-text -->
                            </div><!-- .single-centered-img-carousel-content -->

                        <?php endwhile; wp_reset_postdata(); ?>
                    </div><!-- .tracem-centered-img-carousel-wrapper -->
                    <div class="swiper-pagination"></div><!-- .swiper-pagination -->
                </div><!-- .tracem-centered-img-carousel -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .tracem-centered-img-carousel-area -->