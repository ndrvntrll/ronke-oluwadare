<!-- ============================================================================ -->
<!-- =============================== Service Area =============================== -->
<!-- ============================================================================ -->

<div class="our-testimonial-area">
    <div class="container">
        <?php
        if( $settings['testimonial'] ) { ?>
        <div class="our-testimonial testimonial-two">
            <div class="testimonial-container swiper-container">
                <div class="testimonial-wrap swiper-wrapper">
                    <?php
                    foreach( $settings['testimonial'] as $testimonial ) :
                    $tdetails   = isset( $testimonial['tdetails'] ) ? $testimonial['tdetails'] : '';
                    $timg       = isset( $testimonial['timg']['url'] ) ? $testimonial['timg']['url'] : '';
                    $tname      = isset( $testimonial['tname'] ) ? $testimonial['tname'] : '';
                    $tdesig     = isset( $testimonial['tdesig'] ) ? $testimonial['tdesig'] : ''; ?>
                        <div class="single-testimonial swiper-slide">
                            <div class="row">
                                <div class="col-md-2 col-12">
                                    <div class="testi-author-wrap">
                                        <?php
                                        if( $timg ) { ?>
                                            <div class="testi-author-img">
                                                <img src="<?php echo esc_url( $timg ); ?>" alt="<?php echo esc_attr( $tname ); ?>">
                                            </div><!-- .testi-author-img -->
                                        <?php } ?>
                                        <div class="testi-author-details">
                                            <?php
                                            if( $tname ) {
                                                echo '<h5>' . esc_html( $tname ) . '</h5>';
                                            }

                                            if( $tdesig ) {
                                                echo '<p class="designation">' . esc_html( $tdesig ) . '</p>';
                                            }
                                            ?>
                                        </div><!-- .testi-author-details -->
                                    </div><!-- .testi-author-wrap -->
                                </div><!-- .col-md-2 .col-12 -->
                                <div class="col-md-10 col-12">
                                    <?php
                                    if( $tdetails ) {
                                        echo '<p class="testi-text">' . wp_kses_post( $tdetails ) . '</p>';
                                    }
                                    ?>
                                </div><!-- .col-md-10 .col-12 -->
                            </div><!-- .row -->
                        </div><!-- .single-testimonial -->
                    <?php endforeach; ?>
                </div><!-- .testimonial-wrap -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div><!-- .testimonial-container -->
        </div><!-- .our-testimonial -->
        <?php } ?>
    </div><!-- .container -->
</div><!-- .our-testimonial-area -->