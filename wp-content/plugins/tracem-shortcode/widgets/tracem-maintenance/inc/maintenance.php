<!-- ============================================================================ -->
<!-- =============================== Coming Soon =============================== -->
<!-- ============================================================================ -->

<section class="maintenance-area text-center">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="maintenance">
                    <div class="maintenance-text">
                        <?php
                        if( $settings['subtitle'] ) {
                            echo '<h5 class="trsubtitle">' . esc_html( $settings['subtitle'] ) . '</h5>';
                        } ?>
                        <div class="counter-area">
                            <span class="counter">56</span>
                            <span class="percent">%</span>
                        </div>
                        <?php
                        if( $settings['title'] ) {
                            echo '<h3 class="trtitle">' . wp_kses_post( $settings['title'] ) . '</h3>';
                        }

                        if( $settings['social_profiles'] ) {
                        ?>
                        <div class="maintenance-social">
                            <ul>
                                <?php
                                foreach( $settings['social_profiles'] as $social_profile ) {
                                    echo '<li><a href="' . esc_url( $social_profile['url'] ) . '"><i class="' . esc_attr( $social_profile['icon'] ) . '"></i></a></li>';
                                } ?>
                            </ul>
                        </div><!-- .maintenance-social -->
                        <?php } ?>

                        <?php
                        if( $settings['btn_text'] ) { ?>
                            <a class="btn-circle" href="<?php echo esc_url( $settings['btn_url'] ); ?>">
                                <span><?php echo esc_html( $settings['btn_text'] ); ?></span>
                                <svg width="13px" height="10px" viewBox="0 0 13 10">
                                    <path d="M1,5 L11,5"></path>
                                    <polyline points="8 1 12 5 8 9"></polyline>
                                </svg>
                            </a>
                        <?php } ?>
                    </div><!-- .maintenance-text -->
                </div><!-- maintenance -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container-fluid -->
</section><!-- .maintenance-area -->