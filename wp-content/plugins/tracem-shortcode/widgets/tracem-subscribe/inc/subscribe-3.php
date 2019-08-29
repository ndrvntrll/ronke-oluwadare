<!-- ============================================================================ -->
<!-- ================================ Team Area ================================= -->
<!-- ============================================================================ -->

<div class="section-subscribe-area subscribe-area subscribe-three">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="subscribe-text text-center">
                    <?php
                    if( $settings['description'] ) {
                        echo '<p>' . wp_kses_post( $settings['description'] ) . '</p>';
                    }
                    if( ! empty( $settings['shortcode'] ) ) {
                        echo '<div class="subscribe-form">' . do_shortcode( $settings['shortcode'] ) . '</div><!-- .subscribe-form -->';
                    }
                    ?>
                </div><!-- .subscribe-text -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .section-subscribe-area -->