<!-- ============================================================================ -->
<!-- =============================== Coming Soon =============================== -->
<!-- ============================================================================ -->

<section class="coming-soon-area text-center">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="coming-soon">
                    <div class="coming-soon-text">
                        <?php
                        if( $settings['subtitle'] ) {
                            echo '<h5 class="trsubtitle">' . esc_html( $settings['subtitle'] ) . '</h5>';
                        }
                        if( $settings['title'] ) {
                            echo '<h3 class="trtitle">' . wp_kses_post( $settings['title'] ) . '</h3>';
                        }

                        if( $settings['social_profiles'] ) {
                        ?>
                        <div class="coming-soon-social">
                            <ul>
                                <?php
                                foreach( $settings['social_profiles'] as $social_profile ) {
                                    echo '<li><a href="' . esc_url( $social_profile['url'] ) . '"><i class="' . esc_attr( $social_profile['icon'] ) . '"></i></a></li>';
                                } ?>
                            </ul>
                        </div><!-- .coming-soon-social -->
                        <?php } ?>

                        <?php
                        if( $settings['description'] ) {
                            echo '<p>' . wp_kses_post( $settings['description'] ) . '</p>';
                        }
                        ?>
                    </div><!-- .about-us-text -->
                </div><!-- coming-soon -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container-fluid -->
</section><!-- .comming-soon-area -->