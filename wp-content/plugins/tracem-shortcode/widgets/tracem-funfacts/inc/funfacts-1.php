<!-- ============================================================================ -->
<!-- ================================ Team Area ================================= -->
<!-- ============================================================================ -->

<div class="our-project-counter-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="team-left-text">
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
                </div><!-- .about-us-text -->
            </div><!-- .col -->
        </div><!-- .row -->

        <?php
        if( $settings['funfacts'] ) { ?>
        <div class="our-project-counter">
            <div class="row">
                
                <?php
                foreach( $settings['funfacts'] as $funfact ) :
                    $fun_number = isset( $funfact['fun_number'] ) ? $funfact['fun_number'] : '';
                    $fun_text   = isset( $funfact['fun_text'] ) ? $funfact['fun_text'] : '';
                    ?>
                    <div class="col-md-3 col-sm-6 col-12 project-count-wrap">
                        <div class="single-project-counter">
                            <?php
                            if( $fun_number ) {
                                echo '<span class="counter">' . esc_html( $fun_number ) . '</span>';
                            }

                            if( $fun_text ) {
                                echo '<h4>' . esc_html( $fun_text ) . '</h4>';
                            } ?>
                        </div><!-- .single-project-counter -->
                    </div><!-- .col-md-3 col-sm-6 col-12 project-count-wrap -->
                <?php endforeach; ?>

            </div><!-- .row -->
        </div><!-- .our-project-counter -->
        <?php } ?>
    </div><!-- .container -->
</div><!-- .our-project-counter-area -->