<!-- ============================================================================ -->
<!-- =============================== Service Area =============================== -->
<!-- ============================================================================ -->

<div class="contact-area contact-three">
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
                        <?php
                        if( $settings['informations'] ) { ?>
                            <div class="single-contact-wrapper">                            
                                <?php
                                foreach( $settings['informations'] as $information ) {
                                    $info_title = isset( $information['info_title'] ) ? $information['info_title'] : '';
                                    $info       = isset( $information['info'] ) ? $information['info'] : '';
                                    ?>

                                    <div class="single-contact-info">
                                        <?php
                                        if( $info_title ) {
                                            echo '<h4 class="wow fadeInDown" data-wow-delay="600ms">' . esc_html( $info_title ) . '</h4>';
                                        } 
                                        if( $info ) {
                                            echo '<h3 class="wow fadeInUp" data-wow-delay="600ms">' . wp_kses_post( $info ) . '</h3>';
                                        } ?>
                                    </div><!-- .single-contact-info -->

                                <?php } ?>
                            </div><!-- .single-contact-wrapper -->

                        <?php } ?>
                    </div><!-- .contact-text -->
                </div><!-- .contact -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container-fluid -->
</div><!-- .contact-area -->