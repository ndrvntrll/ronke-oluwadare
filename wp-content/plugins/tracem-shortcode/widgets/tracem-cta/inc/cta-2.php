<!-- ============================================================================ -->
<!-- ================================ Team Area ================================= -->
<!-- ============================================================================ -->

<div class="call-to-action-area cta-two">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="cta-text">
                    <?php
                    if( $settings['subtitle'] ) {
                        echo '<h5 class="trsubtitle wow fadeInUp" data-wow-delay="200ms">' . esc_html( $settings['subtitle'] ) . '</h5>';
                    }
                    if( $settings['title'] ) {
                        echo '<h3 class="trtitle wow fadeInUp" data-wow-delay="400ms">' . wp_kses_post( $settings['title'] ) . '</h3>';
                    }
                    ?>
                </div><!-- .about-us-text -->
            </div><!-- .col -->
            <div class="col-md-6 col-12 align-self-center">
                <?php
                if( $settings['btn_text'] ) {
                    echo '<a href="' . esc_url( $settings['btn_url'] ) . '" class="btn-fill wow fadeInUp" data-wow-delay="600ms">' . esc_html( $settings['btn_text'] ) . '</a>';
                }
                ?>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container-fluid -->
</div><!-- .call-to-action-area -->