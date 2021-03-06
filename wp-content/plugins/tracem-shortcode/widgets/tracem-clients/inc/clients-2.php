<!-- ============================================================================ -->
<!-- =============================== Service Area =============================== -->
<!-- ============================================================================ -->

<div class="our-clients-area">
    <div class="container">
        <div class="our-clients clients-two">
            <div class="row">
                <div class="col-lg-5 col-12 align-self-center">
                    <div class="clients-left-text">
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
            </div><!-- .row -->
            <div class="row">
                <div class="col">
                    <div class="clients-container swiper-container">
                        <div class="clients-wrap swiper-wrapper">
                            <?php
                            if( $settings['clients'] ) { ?>
                                <?php
                                foreach( $settings['clients'] as $client ) {
                                    $op_logo    = isset( $client['logo_opacity']['url'] ) ? $client['logo_opacity']['url'] : '';
                                    $logo       = isset( $client['logo']['url'] ) ? $client['logo']['url'] : '';
                                    $url        = isset( $client['url'] ) ? $client['url'] : '';
                                    ?>
                                    <div class="single-client swiper-slide">
                                        <?php
                                        if( $url ) { echo '<a href="' . esc_url( $url ) . '">'; } ?>

                                                <?php
                                                if( $logo ) {
                                                    echo '<span class="tracem-ovh"><img src="' . esc_url( $logo ) . '" class="cm_logo" alt="' . esc_attr__( 'Clients Logo', 'tracem' ) . '"></span>';
                                                }
                                                if( $op_logo ) {
                                                    echo '<span class="tracem-ovh"><img src="' . esc_url( $op_logo ) . '" class="op_logo" alt="' . esc_attr__( 'Clients Logo', 'tracem' ) . '"></span>';
                                                } ?>
                                        <?php
                                        if( $url ) { echo '</a>'; } ?>
                                    </div><!-- .single-client -->
                                <?php } ?>
                            <?php } ?>
                        </div><!-- .clients-container .swiper-container -->
                    </div><!-- .clients-wrap -->
                </div><!-- .col-->
            </div><!-- .row -->
        </div><!-- .our-clients -->
    </div><!-- .container -->
</div><!-- .our-clients-area -->