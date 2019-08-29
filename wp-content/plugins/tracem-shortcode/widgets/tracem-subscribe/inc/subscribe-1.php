<!-- ============================================================================ -->
<!-- ================================ Team Area ================================= -->
<!-- ============================================================================ -->

<div class="section-subscribe-area subscribe-area subscribe-one">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="subscribe-text text-center">
                    <?php
                    if( $settings['subtitle'] ) {
                        echo '<h5 class="trsubtitle wow fadeInUp" data-wow-delay="200ms">' . esc_html( $settings['subtitle'] ) . '</h5>';
                    }
                    if( $settings['title'] ) {
                        echo '<h3 class="trtitle wow fadeInUp" data-wow-delay="400ms">' . wp_kses_post( $settings['title'] ) . '</h3>';
                    }
                    if( ! empty( $settings['shortcode'] ) ) {
                        echo '<div class="subscribe-form wow fadeInUp" data-wow-delay="600ms">' . do_shortcode( $settings['shortcode'] ) . '</div><!-- .subscribe-form -->';
                    }
                    ?>
                </div><!-- .subscribe-text -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .section-subscribe-area -->