<!-- ============================================================================ -->
<!-- ================================ Team Area ================================= -->
<!-- ============================================================================ -->

<div class="section-subscribe-area subscribe-area subscribe-two">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-12">
                <div class="subscribe-text">
                    <?php
                    if( $settings['subtitle'] ) {
                        echo '<h5 class="trsubtitle wow fadeInUp" data-wow-delay="200ms">' . esc_html( $settings['subtitle'] ) . '</h5>';
                    }
                    if( $settings['title'] ) {
                        echo '<h3 class="trtitle wow fadeInUp" data-wow-delay="400ms">' . wp_kses_post( $settings['title'] ) . '</h3>';
                    }
                    ?>
                </div><!-- .subscribe-text -->
            </div><!-- .col-lg-6 col-12 -->
            <div class="col-lg-5 col-12 offset-lg-2 align-self-center">
                <div class="subscribe-text wow fadeIn" data-wow-delay="600ms">
                    <?php
                    if( ! empty( $settings['shortcode'] ) ) {
                        echo '<div class="subscribe-form">' . do_shortcode( $settings['shortcode'] ) . '</div><!-- .subscribe-form -->';
                    }
                    ?>
                </div><!-- .subscribe-text -->
            </div><!-- .col-lg-6 col-12 -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .section-subscribe-area -->