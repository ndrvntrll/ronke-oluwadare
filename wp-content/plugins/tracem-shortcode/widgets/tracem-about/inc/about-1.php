<!-- ============================================================================ -->
<!-- =============================== About Us Area ============================== -->
<!-- ============================================================================ -->

<div class="about-us-area about-one">
    <div class="container">
        <div class="row">
            <div class="col-lg col-12 align-self-center">
                <div class="about-us-text">
                    <?php
                    if( $settings['subtitle'] ) {
                        echo '<h5 class="trsubtitle wow fadeInUp" data-wow-delay="200ms">' . esc_html( $settings['subtitle'] ) . '</h5>';
                    }
                    if( $settings['title'] ) {
                        echo '<h3 class="trtitle wow fadeInUp" data-wow-delay="400ms">' . wp_kses_post( $settings['title'] ) . '</h3>';
                    }
                    if( $settings['description'] ) {
                        echo '<p class="wow fadeInUp" data-wow-delay="600ms">' . wp_kses_post( $settings['description'] ) . '</p>';
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
            <?php
            if( $settings['about_image']['url'] ) { ?>
            <div class="col-lg col-12">
                <div class="about-us-img wow fadeIn" data-wow-delay="1000ms">
                    <img src="<?php echo esc_url( $settings['about_image']['url'] ) ?>" alt="<?php echo esc_attr( 'About Image', 'tracem' ); ?>">
                    <?php
                    if( $settings['experience_number'] || $settings['experience_text'] ) { ?>
                        <div class="experience-wrapper">
                            <?php
                            if( $settings['experience_number'] ) {
                                echo '<h2 class="number">' . esc_html( $settings['experience_number'] ) . '</h2>';
                            }
                            if( $settings['experience_text'] ) {
                                echo '<h5 class="expr-text">' . esc_html( $settings['experience_text'] ) . '</h5>';
                            } ?>
                        </div><!-- .experience-wrapper -->
                    <?php } ?>
                </div><!-- .about-us-img -->
            </div><!-- .col -->
            <?php } ?>
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .about-us-area -->
