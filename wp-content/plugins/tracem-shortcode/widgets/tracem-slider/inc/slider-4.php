<!-- ============================================================================ -->
<!-- ========================== Home Centered Carousel ========================== -->
<!-- ============================================================================ -->

<div class="tracem-centered-carousel-area tracem-relative-large">
    <div class="container-fluid">
        <div class="row tracem-shrink no-gutters">
            <div class="col-9">
                <div class="tracem-centered-carousel">
                    <div class="tracem-centered-carousel-wrapper swiper-wrapper">

                        <?php
                        while( $portfolio->have_posts() ) : $portfolio->the_post();
                        $portfolio_thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );

                        $tracem_portfolio_opt   = get_post_meta( get_the_ID(), '_tracem_portfolio_options', true );
                        $tracem_portfolio_ct    = isset( $tracem_portfolio_opt['tracem_portfolio_custom_title'] ) ? $tracem_portfolio_opt['tracem_portfolio_custom_title'] : '';
                        $tracem_portfolio_lw    = isset( $tracem_portfolio_opt['tracem_portfolio_link_window'] ) ? $tracem_portfolio_opt['tracem_portfolio_link_window'] : '';
                        ?>

                        <div class="single-centered-carousel-content swiper-slide">
                            <img src="<?php echo esc_url( $portfolio_thumb ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                            <div class="centered-carousel-text">
                                <div class="tracem-ovh">
                                    <h4><?php echo get_the_term_list( get_the_ID(), 'portfolio_category', '', ', ' ); ?></h4>
                                </div>
                                <div class="tracem-ovh">
                                    <?php
                                    the_title( '<h3>', '</h3>' ); ?>
                                </div>
                                <?php
                                if( ! empty( $settings['button_text'] ) ) { 
                                    if( ! empty( $tracem_portfolio_ct ) ) : ?>

                                        <div class="btn-generic black">
                                            <a href="<?php echo esc_url( $tracem_portfolio_ct ); ?>" target="<?php echo esc_attr( $tracem_portfolio_lw ); ?>">
                                                <span>
                                                    <span><?php echo esc_html( $settings['button_text'] ); ?></span>
                                                </span>
                                            </a>
                                        </div><!-- .btn-generic -->

                                    <?php else : ?>
                                        <div class="btn-generic black">
                                            <a href="<?php echo esc_url( get_permalink() ); ?>" target="<?php echo esc_attr( $tracem_portfolio_lw ); ?>">
                                                <span>
                                                    <span><?php echo esc_html( $settings['button_text'] ); ?></span>
                                                </span>
                                            </a>
                                        </div><!-- .btn-generic -->
                                    <?php endif; ?>
                                <?php } ?>
                            </div><!-- .banner-left -->
                        </div><!-- .single-centered-carousel-content -->
                        <?php endwhile; wp_reset_postdata(); ?>

                    </div><!-- .tracem-centered-carousel-wrapper -->
                    <div class="swiper-scrollbar"></div><!-- .swiper-pagination -->
                </div><!-- .tracem-centered-carousel-area -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .tracem-centered-carousel-area -->