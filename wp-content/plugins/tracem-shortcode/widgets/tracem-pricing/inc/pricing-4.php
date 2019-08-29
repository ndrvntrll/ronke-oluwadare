<!-- ============================================================================ -->
<!-- =============================== Service Area =============================== -->
<!-- ============================================================================ -->

<div class="our-pricing-area pricing-two pricing-four">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-12 align-self-center">
                <div class="pricing-text">
                    <?php
                    if( $settings['subtitle'] ) {
                        echo '<h5 class="trsubtitle wow fadeInUp" data-wow-delay="200ms">' . esc_html( $settings['subtitle'] ) . '</h5>';
                    }
                    if( $settings['title'] ) {
                        echo '<h3 class="trtitle wow fadeInUp" data-wow-delay="400ms">' . wp_kses_post( $settings['title'] ) . '</h3>';
                    }
                    if( $settings['description'] ) {
                        echo '<p class="wow fadeInUp" data-wow-delay="600ms">' . wp_kses_post( $settings['description'] ) . '</p>';
                    }
                    ?>
                </div><!-- .pricing-text -->
            </div><!-- .col-lg-5 col-12 -->
            <div class="col-lg-7 col-12">
                <?php
                if( $settings['pricing'] ) { ?>
                <div class="our-pricing">
                    <div class="row">
                        
                        <?php
                        foreach( $settings['pricing'] as $single_pricing ) :
                            $package_name   = isset( $single_pricing['package_name'] ) ? $single_pricing['package_name'] : '';
                            $price_in       = isset( $single_pricing['price_in'] ) ? $single_pricing['price_in'] : '';
                            $price          = isset( $single_pricing['price'] ) ? $single_pricing['price'] : '';
                            $price_des      = isset( $single_pricing['price_des'] ) ? $single_pricing['price_des'] : '';
                            $button_text    = isset( $single_pricing['button_text'] ) ? $single_pricing['button_text'] : '';
                            $button_url     = isset( $single_pricing['button_url'] ) ? $single_pricing['button_url'] : '';
                            ?>
                            <div class="col-sm-6 col-12 pricing-wrap">
                                <div class="single-pricing">
                                    <?php
                                    if( $package_name ) {
                                        echo '<div class="package-name"><h5>' . esc_html( $package_name ) . '</h5></div><!-- .package-name -->';
                                    }
                                    if( $price ) {
                                        echo '<div class="package-price"><h2><span>' . esc_html( $price_in ) . '</span>' . esc_html( $price ) . '</h2></div><!-- .package-price -->';
                                    }
                                    if( $price_des ) {
                                        echo '<div class="package-des">' . wp_kses_post( $price_des ) . '</div><!-- .package-price -->';
                                    }

                                    if( $button_text ) : ?>
                                        <a class="btn-circle" href="<?php echo esc_url( $button_url ); ?>">
                                            <span><?php echo esc_html( $button_text ); ?></span>
                                            <svg width="13px" height="10px" viewBox="0 0 13 10">
                                                <path d="M1,5 L11,5"></path>
                                                <polyline points="8 1 12 5 8 9"></polyline>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                    
                                </div><!-- .single-pricing -->
                            </div><!-- .col-sm-6 col-12 pricing-wrap -->
                        <?php endforeach; ?>

                    </div><!-- .row -->
                </div><!-- .our-pricing -->
                <?php } ?>
            </div><!-- .col-md-7 .col-12 -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .our-pricing-area -->