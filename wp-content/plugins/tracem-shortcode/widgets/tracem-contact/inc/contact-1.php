<!-- ============================================================================ -->
<!-- =============================== Service Area =============================== -->
<!-- ============================================================================ -->

<div class="contact-area contact-one">
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-4 col-12 align-self-center">
                <div class="contact-info">
                    <?php
                    if( $settings['informations'] ) {
                        foreach( $settings['informations'] as $information ) {
                            $info_title = isset( $information['info_title'] ) ? $information['info_title'] : '';
                            $info       = isset( $information['info'] ) ? $information['info'] : '';
                            ?>

                            <div class="single-contact-info">
                                <?php
                                if( $info_title ) {
                                    echo '<h4 class="wow fadeInUp" data-wow-delay="200ms">' . esc_html( $info_title ) . '</h4>';
                                } 
                                if( $info ) {
                                    echo '<h3 class="wow fadeInUp" data-wow-delay="400ms">' . wp_kses_post( $info ) . '</h3>';
                                } ?>
                            </div><!-- .single-contact-info -->

                        <?php }
                    } ?>
                    <?php
                        if( $settings['social_profiles'] ) {
                        ?>
                        <div class="contact-social wow fadeInUp" data-wow-delay="600ms">
                            <ul>
                                <?php
                                foreach( $settings['social_profiles'] as $social_profile ) {
                                    echo '<li><a href="' . esc_url( $social_profile['url'] ) . '"><i class="' . esc_attr( $social_profile['icon'] ) . '"></i></a></li>';
                                } ?>
                            </ul>
                        </div><!-- .contact-social -->
                    <?php } ?>
                </div><!-- .contact-info -->
            </div><!-- .col -->
            <div class="col-xl-8 col-lg-8 col-md-8 col-12 offset-xl-2 offset-lg-1">
                <div class="contact">
                    <div class="contact-text">
                        <?php
                        if( $settings['subtitle'] ) {
                            echo '<h5 class="trsubtitle wow fadeInUp" data-wow-delay="800ms">' . esc_html( $settings['subtitle'] ) . '</h5>';
                        }
                        if( $settings['title'] ) {
                            echo '<h3 class="trtitle wow fadeInUp" data-wow-delay="1000ms">' . wp_kses_post( $settings['title'] ) . '</h3>';
                        }
                        ?>
                    </div><!-- .contact-text -->
                    <?php
                    if( ! empty( $settings['contact-form-shortcode'] ) ) {

                        echo '<div class="contact-form wow fadeIn" data-wow-delay="1200ms">' . do_shortcode( '[contact-form-7 id="' . $settings['contact-form-shortcode'] . '"]' ) . '</div><!-- .contact-form -->';
                    };
                    ?>
                </div><!-- .contact -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container-fluid -->
</div><!-- .contact-area -->