<section class="tracem-portfolio-area tracem-relative is_animation <?php echo esc_attr( $settings['portfolio_hover_types'] ); ?> portfolio-sporadic" id="tracem-portfolio">
    <div class="container-fluid no-padding">
        <div class="grid portfolio-content" id="portfolio-sporadic">
            <div class="grid-sporadic-sizer"></div>
            <?php
            $tracem_portfolio_masonary_dimension = '';
            while( $portfolio->have_posts() ) : $portfolio->the_post();
            $portfolio_thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );
            if( function_exists( 'cs_get_option' ) ) {
                $_tracem_portfolio_options      = get_post_meta( get_the_ID(), '_tracem_portfolio_options', true );
                $tracem_portfolio_masonary_dimension       = isset( $_tracem_portfolio_options['tracem_portfolio_masonary_dimension'] ) ? $_tracem_portfolio_options['tracem_portfolio_masonary_dimension'] : '';
                $t_video_url = isset( $_tracem_portfolio_options['tracem_portfolio_video_url'] ) ? $_tracem_portfolio_options['tracem_portfolio_video_url'] : '';

                $grid_col = '';
                if ( $tracem_portfolio_masonary_dimension == 'large-width' || $tracem_portfolio_masonary_dimension == 'large-width-height' ) {
                    $grid_col = 'col-xs-12 col-sm-6 col-md-6';
                } else {
                    $grid_col = 'col-xs-12 col-sm-3 col-md-3';
                }
            }
            ?>
            <div class="grid-sporadic-item <?php echo esc_attr( $grid_col ); ?>">
                <div class="sporadic-item-wrapper">
                    <div class="portfolio-img">
                        <?php
                        if ( $tracem_portfolio_masonary_dimension == 'large-height' ) {
                            the_post_thumbnail( 'tracem-plh', array( 'class' => 'img-responsive' ) );
                        } elseif ( $tracem_portfolio_masonary_dimension == 'large-width' ) {
                            the_post_thumbnail( 'tracem-plw', array( 'class' => 'img-responsive' ) );
                        }  elseif ( $tracem_portfolio_masonary_dimension == 'large-width-height' ) {
                            the_post_thumbnail( 'tracem-plwh', array( 'class' => 'img-responsive' ) );
                        } else {
                            the_post_thumbnail( 'tracem-pd', array( 'class' => 'img-responsive' ) );
                        }
                        ?>
                    </div>
                    <div class="portfolio-overlay"></div>
                    <div class="portfolio-details">
                        <div class="portfolio-cats">
                            <div class="tracem-ovh">
                                <h4><?php echo get_the_term_list( get_the_ID(), 'portfolio_category', '', ', ' ); ?></h4>
                            </div><!-- .tracem-ovh -->
                        </div><!-- .portfolio-cats -->
                        <div class="portfolio-title">
                            <div class="tracem-ovh">
                                <?php
                                the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
                            </div><!-- .tracem-ovh -->
                        </div><!-- .portfolio-title -->
                    </div><!-- .portfolio-details -->
                    <?php
                    if( ! empty( $t_video_url ) ) : ?>
                        <div class="tracem-ovh">
                            <div class="port-video-btn">
                                <a class="mixed" data-flashy-type="video" href="<?php echo esc_url( $t_video_url ); ?>">
                                    <img src="<?php echo esc_url( plugins_url( 'tracem-shortcode/assets/images/play-icon.png' ) ); ?>" alt="<?php echo esc_attr__( 'Video Button', 'tracem' ); ?>">
                                </a>
                            </div><!-- .port-video-btn -->
                        </div><!-- .tracem-ovh -->
                    <?php endif; ?>
                </div><!-- .sporadic-item-wrapper -->
            </div>
           <?php endwhile; wp_reset_postdata(); ?>
        </div><!-- #portfolio-container -->
    </div><!-- .container-fluid -->
</section><!-- .tracem-portfolio-area -->