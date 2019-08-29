<!-- ============================================================================ -->
<!-- =============================== Home Slider ================================ -->
<!-- ============================================================================ -->

<div class="tracem-banner-one-area tracem-relative">
    <div class="container-fluid">
        <div class="row tracem-shrink no-gutters">
            <div class="col">
                <div class="tracem-banner-one swiper-container">
                    <div class="tracem-banner-one-wrapper swiper-wrapper">

                    	<?php
						while( $portfolio->have_posts() ) : $portfolio->the_post();
						$portfolio_thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                        
                        $tracem_portfolio_opt   = get_post_meta( get_the_ID(), '_tracem_portfolio_options', true );
                        $tracem_portfolio_ct    = isset( $tracem_portfolio_opt['tracem_portfolio_custom_title'] ) ? $tracem_portfolio_opt['tracem_portfolio_custom_title'] : '';
                        $tracem_portfolio_lw    = isset( $tracem_portfolio_opt['tracem_portfolio_link_window'] ) ? $tracem_portfolio_opt['tracem_portfolio_link_window'] : '';
                        ?>
                            
                            <div class="single-banner-text background-image swiper-slide" style="background-image: url( <?php echo esc_url( $portfolio_thumb ); ?> );">
                                <div class="banner-left">
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
                                    <div class="portfolio-extra-info">
                                        <span class="total-view">
                                            <i class="fas fa-eye"></i> <?php echo themestrace_get_post_views( get_the_ID() ); ?>
                                        </span><!-- .total-view -->
                                        
										<?php
										if ( function_exists( 'likeCount' ) ) {
                                            
											echo '<span class="total-like"><a class="like" rel="' . esc_attr( get_the_ID() ) . '"><i class="fas fa-heart"></i> ' . likeCount( get_the_ID() ) . '</a></span><!-- .total-like -->';
										}
										?>
                                        
                                        <?php
                                        if( comments_open() ) : ?>
                                            <span class="total-comment">
                                            	<i class="fas fa-comment"></i> <?php comments_popup_link( '0', '01', '%', '', 'Comments Off' ); ?>
                                            </span><!-- .total-comment -->
                                    	<?php endif; ?>
                                    </div><!-- .portfolio-extra-info -->
                                </div><!-- .banner-left -->
                                <div class="banner-right">
                                    <?php
                                	the_title( '<div class="tracem-ovh"><h2>', '</h2></div>' ); ?>
                                </div><!-- .banner-right -->
                            </div><!-- .single-banner-text -->
                    	<?php endwhile; wp_reset_postdata(); ?>

                    </div><!-- .tracem-banner-one-wrapper -->
                </div><!-- .tracem-banner-one -->
                <div class="swiper-pagination"></div><!-- .swiper-pagination -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
    <?php
    if( $settings['social_list'] ) : ?>
        <div class="banner-social-area">
            <ul>
                <?php
                foreach( $settings['social_list'] as $single_list ) {
                    echo '<li><a href="' . esc_url( $single_list['social_url'] ) . '" target="_blank"><i class="' . esc_attr( $single_list['social_icon'] ) . '"></i></a></li>';
                } ?>
            </ul>
        </div><!-- .banner-social-area -->
    <?php endif; ?>
</div><!-- .tracem-banner-one-area -->