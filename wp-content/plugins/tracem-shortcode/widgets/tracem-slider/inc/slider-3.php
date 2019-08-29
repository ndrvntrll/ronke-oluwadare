<div class="full-width-slideshow">
    <?php
    while( $portfolio->have_posts() ) : $portfolio->the_post();
    $portfolio_thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );

    $tracem_portfolio_opt   = get_post_meta( get_the_ID(), '_tracem_portfolio_options', true );
    $tracem_portfolio_ct    = isset( $tracem_portfolio_opt['tracem_portfolio_custom_title'] ) ? $tracem_portfolio_opt['tracem_portfolio_custom_title'] : '';
    $tracem_portfolio_lw    = isset( $tracem_portfolio_opt['tracem_portfolio_link_window'] ) ? $tracem_portfolio_opt['tracem_portfolio_link_window'] : '';
    ?>
    <div class="full-width-slide">
        <div class="full_width_slide__wrap">
            <div class="full_width_slide__img" style="background-image: url(<?php echo esc_url( $portfolio_thumb ); ?>);"></div>
            <div class="container-fluid">
                <div class="row tracem-shrink">
                    <div class="col">
                        <div class="full_width_slide__title-wrap">
                            <h4 class="slide-cat"><?php echo get_the_term_list( get_the_ID(), 'portfolio_category', '', ', ' ); ?></h4>
                            <?php
                            the_title( '<h3 class="full_width_slide__title">', '</h3>' ); ?>

                            <p class="full_width_slide__subtitle">
                                <?php echo get_the_excerpt(); ?>
                            </p>

                            <?php
                            if( ! empty( $settings['button_text'] ) ) { 
                                if( ! empty( $tracem_portfolio_ct ) ) : ?>
                                    <div class="btn-generic">
                                        <a href="<?php echo esc_url( $tracem_portfolio_ct ); ?>" target="<?php echo esc_attr( $tracem_portfolio_lw ); ?>">
                                            <span class="animation-loaded">
                                                <span class="animation-loaded"><?php echo esc_html( $settings['button_text'] ); ?></span>
                                            </span>
                                        </a>
                                    </div><!-- .btn-generic -->
                                <?php else : ?>
                                    <div class="btn-generic">
                                        <a href="<?php echo get_the_permalink(); ?>">
                                            <span class="animation-loaded">
                                                <span class="animation-loaded"><?php echo esc_html( $settings['button_text'] ); ?></span>
                                            </span>
                                        </a>
                                    </div><!-- .btn-generic -->
                                <?php endif; ?>
                            <?php } ?>
                        </div>
                    </div><!-- .col -->
                </div><!-- .row.tracem-shrink -->
            </div><!-- .container-fluid -->
        </div>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>
</div><!-- /slideshow -->
<nav class="boxnav">
    <button class="boxnav__item boxnav__item--prev">
        <i class="fas fa-angle-left"></i>
    </button>
    <div class="boxnav__item boxnav__item--label">
        <span class="boxnav__label boxnav__label--current"><?php echo esc_html__( '1', 'tracem' ); ?></span>
        <span class="boxnav__label boxnav__label--total"></span>
    </div>
    <button class="boxnav__item boxnav__item--next">
        <i class="fas fa-angle-right"></i>
    </button>
</nav>