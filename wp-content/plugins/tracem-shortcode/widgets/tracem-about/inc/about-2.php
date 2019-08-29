<!-- ============================================================================ -->
<!-- =============================== About Us Area ============================== -->
<!-- ============================================================================ -->

<div class="about-us-area about-two">
    <div class="container">
        <div class="row">
            <?php
            if( $settings['about_text'] ) { ?>
            <div class="col-lg-5 col-12 align-self-center">
                <div class="about-text wow fadeIn" data-wow-delay="100ms">
                    <h2><?php echo esc_html( $settings['about_text'] ); ?></h2>
                </div><!-- .about-us-img -->
            </div><!-- .col -->
            <?php } ?>
            <div class="col-lg-7 col-12">
                <div class="about-us-text">
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
                    if( $settings['btn_text'] ) { ?>
                        <a class="btn-circle wow fadeInUp" data-wow-delay="800ms" href="<?php echo esc_url( $settings['btn_url'] ) ?>">
                            <span><?php echo esc_html( $settings['btn_text'] ); ?></span>
                            <svg width="13px" height="10px" viewBox="0 0 13 10">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                        </a>
                    <?php }
                    ?>
                </div><!-- .about-us-text -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .about-us-area -->