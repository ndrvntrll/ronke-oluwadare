<!-- ============================================================================ -->
<!-- =============================== Home Split ================================= -->
<!-- ============================================================================ -->
<div class="home-split-area">
    <div class="home-split">
        <?php
        $fl = 1;
        $i = 1;

        while ( $fl <= 2 ) {
            if( $fl == 1 ) { ?>
                <div class="ms-left">
                    <?php
                    while( $portfolio->have_posts() ) : $portfolio->the_post();
                    $portfolio_thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );

                    $tracem_portfolio_opt   = get_post_meta( get_the_ID(), '_tracem_portfolio_options', true );
                    $tracem_portfolio_ct    = isset( $tracem_portfolio_opt['tracem_portfolio_custom_title'] ) ? $tracem_portfolio_opt['tracem_portfolio_custom_title'] : '';
                    $tracem_portfolio_lw    = isset( $tracem_portfolio_opt['tracem_portfolio_link_window'] ) ? $tracem_portfolio_opt['tracem_portfolio_link_window'] : '';
                    ?>
                    <div class="single-split-text ms-section">
                        <div class="container-fluid">
                            <div class="row tracem-shrink">
                                <div class="col">
                                    <div class="split-text">
                                        <div class="title-cats">
                                            <div class="tracem-ovh">
                                                <h4><?php echo get_the_term_list( get_the_ID(), 'portfolio_category', '', ', ' ); ?></h4>
                                            </div><!-- .tracem-ovh -->
                                            <div class="tracem-ovh">
                                                <?php
                                                the_title( '<h3>', '</h3>' );
                                                the_title( '<h2>', '</h2>' );
                                                ?>
                                            </div><!-- .tracem-ovh -->
                                        </div><!-- .title-cats -->

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

                                        <?php
                                        if( $settings['social_list'] ) : ?>
                                            <div class="portfolio-social-area">
                                                <div class="tracem-ovh">
                                                    <ul>
                                                        <?php
                                                        foreach( $settings['social_list'] as $single_list ) {
                                                            echo '<li><a href="' . esc_url( $single_list['social_url'] ) . '" target="_blank"><i class="' . esc_attr( $single_list['social_icon'] ) . '"></i></a></li>';
                                                        } ?>
                                                    </ul>
                                                </div><!-- .tracem-ovh -->
                                            </div><!-- .portfolio-social-area -->
                                        <?php endif; ?>
                                    </div><!-- .split-text -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div><!-- .container-fluid -->
                    </div><!-- .single-split-text -->
                    <?php endwhile; wp_reset_postdata(); ?>
                </div><!-- .ms-left -->
            <?php } else { ?>
                <div class="ms-right">
                    <?php
                    while( $portfolio->have_posts() ) : $portfolio->the_post();
                    $portfolio_thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
                        <div class="single-split-image ms-section">
                            <div class="split-image" style="background-image: url(<?php echo esc_url( $portfolio_thumb ); ?>);"></div><!-- .split-image -->
                        </div><!-- .single-split-image -->
                    <?php endwhile; wp_reset_postdata(); ?>
                </div><!-- .ms-right -->
            <?php }
            $fl++;
        }

        ?>
    </div><!-- .home-split -->
</div><!-- .home-split-area -->
