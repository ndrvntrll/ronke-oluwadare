<!-- ============================================================================ -->
<!-- =============================== Service Area =============================== -->
<!-- ============================================================================ -->

<div class="contact-area contact-two">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact">
                    <div class="contact-text">
                        <?php
                        if( $settings['subtitle'] ) {
                            echo '<h5 class="trsubtitle wow fadeInUp" data-wow-delay="200ms">' . esc_html( $settings['subtitle'] ) . '</h5>';
                        }
                        if( $settings['title'] ) {
                            echo '<h3 class="trtitle wow fadeInUp" data-wow-delay="400ms">' . wp_kses_post( $settings['title'] ) . '</h3>';
                        }
                        ?>
                    </div><!-- .contact-text -->
                    <?php
                    if( ! empty( $settings['contact-form-shortcode'] ) ) {

                        echo '<div class="contact-form">' . do_shortcode( '[contact-form-7 id="' . $settings['contact-form-shortcode'] . '"]' ) . '</div><!-- .contact-form -->';
                    };
                    ?>
                </div><!-- .contact -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container-fluid -->
</div><!-- .contact-area -->