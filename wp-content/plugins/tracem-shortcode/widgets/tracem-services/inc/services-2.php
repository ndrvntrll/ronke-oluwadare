<!-- ============================================================================ -->
<!-- =============================== Service Area =============================== -->
<!-- ============================================================================ -->

<div class="our-services-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="services-left-text">
                    <?php
                    if( $settings['subtitle'] ) {
                        echo '<h5 class="trsubtitle wow fadeInUp" data-wow-delay="200ms">' . esc_html( $settings['subtitle'] ) . '</h5>';
                    }
                    if( $settings['title'] ) {
                        echo '<h3 class="trtitle wow fadeInUp" data-wow-delay="400ms">' . wp_kses_post( $settings['title'] ) . '</h3>';
                    }
                    if( $settings['description'] ) {
                        echo '<p class="wow fadeInUp" data-wow-delay="600ms">' . esc_textarea( $settings['description'] ) . '</p>';
                    }
                    ?>
                </div><!-- .services-left-text -->
            </div><!-- .col -->
        </div><!-- .row -->

        <?php
        if( $settings['services'] ) { ?>
        <div class="our-services service-two">
            <div class="row">
                
                <?php
                foreach( $settings['services'] as $funfact ) :
                    $ser_icon   = isset( $funfact['ser_icon'] ) ? $funfact['ser_icon'] : '';
                    $icon_image = isset( $funfact['icon_image'] ) ? $funfact['icon_image'] : '';
                    $ser_number = isset( $funfact['ser_number'] ) ? $funfact['ser_number'] : '';
                    $ser_title  = isset( $funfact['ser_title'] ) ? $funfact['ser_title'] : '';
                    $ser_des    = isset( $funfact['ser_des'] ) ? $funfact['ser_des'] : '';
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 service-wrap">
                        <div class="single-services">
                            <?php
                            if( $ser_title ) {
                                echo '<h5><span>' . esc_html( $ser_number ) . ' </span>' . esc_html( $ser_title ) . '</h5>';
                            } ?>
                            <div class="service-details">
                                <div class="icon-wrapper">
                                    <?php
                                    if( $ser_icon ) {
                                        echo '<i class="' . esc_attr( $ser_icon ) . '"></i>';
                                    }
                                    if( $icon_image ) {
                                        echo '<span class="ser-icon-img"><img src=" ' . esc_attr( $icon_image['url'] ) . ' "/></span>';
                                    }
                                    ?>
                                </div><!-- .icon-wrapper -->
                                <?php
                                if( $ser_des ) {
                                    echo '<p>' . esc_html( $ser_des ) . '</p>';
                                } ?>
                            </div><!-- .service-details -->
                        </div><!-- .single-services -->
                    </div><!-- .col-lg-4 col-md-6 col-sm-6 col-12 service-wrap -->
                <?php endforeach; ?>

            </div><!-- .row -->
        </div><!-- .our-services -->
        <?php } ?>
    </div><!-- .container -->
</div><!-- .our-services-area -->