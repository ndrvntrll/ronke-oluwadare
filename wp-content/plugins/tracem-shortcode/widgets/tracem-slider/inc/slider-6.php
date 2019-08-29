<!-- ============================================================================ -->
<!-- =============================== Flip Slider ================================ -->
<!-- ============================================================================ -->

<div class="page-flip-slideshow">
    <?php
    $i = 1;
    foreach( $settings['flip_slide'] as $single_page_flip_slide ) :

    $pf_current = '';
    if( $i == 1 ) {
        $pf_current = 'page-flip-slide--current';
    } else {
        $pf_current = '';
    }
    ?>
    <div class="page-flip-slide page-flip-slide--layout-<?php echo esc_attr( $i ); ?> <?php echo esc_attr( $pf_current ); ?>">
        <?php 
        $args              = array(
            'post_type'         => 'portfolio',
            'posts_per_page'    => $single_page_flip_slide['post_count'],
            'order'             => $single_page_flip_slide['order'],
            'orderby'           => $single_page_flip_slide['orderby'],
            'tax_query'         => array(
                                array(
                                    'taxonomy' => 'portfolio_tag',
                                    'field'    => 'slug',
                                    'terms'    => $single_page_flip_slide['tag_in_slider'],
                                ),
            ),
            'post_status'       => 'publish'
        );

        $portfolio = new \WP_Query( $args );

        while( $portfolio->have_posts() ) : $portfolio->the_post();
        $portfolio_thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        
        $tracem_portfolio_xt = '';
        if( function_exists( 'cs_get_option' ) ) {
            $tracem_portfolio_opt   = get_post_meta( get_the_ID(), '_tracem_portfolio_options', true );
            $tracem_portfolio_xt    = isset( $tracem_portfolio_opt['tracem_portfolio_xtra_title'] ) ? $tracem_portfolio_opt['tracem_portfolio_xtra_title'] : '';
        }
        ?>
        <figure class="page-flip-slide__figure">
            <div class="page-flip-slide__figure-inner">
                <div class="page-flip-slide__figure-img" style="background-image: url(<?php echo esc_url( $portfolio_thumb ); ?>)"></div>
                <div class="page-flip-slide__figure-reveal"></div>
            </div>
            <figcaption>
                <?php
                the_title( '<h3 class="page-flip-slide__figure-title">', '</h3>' ); ?>
                <?php
                if( $tracem_portfolio_xt ) {
                    echo '<p class="page-flip-slide__figure-description">' . esc_html( $tracem_portfolio_xt ) . '</p>';
                } ?>
                
            </figcaption>
        </figure>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php $i++; endforeach; ?>
    <!-- revealer -->
    <div class="page_flip_revealer">
        <div class="page_flip_revealer__item page_flip_revealer__item--left"></div>
        <div class="page_flip_revealer__item page_flip_revealer__item--right"></div>
    </div>
    <nav class="page-flip-arrow-nav">
        <button class="page-flip-arrow-nav__item page-flip-arrow-nav__item--prev">
            <span class="ti-arrow-left"></span>
        </button>
        <button class="page-flip-arrow-nav__item page-flip-arrow-nav__item--next">
            <span class="ti-arrow-right"></span>
        </button>
    </nav>
</div>