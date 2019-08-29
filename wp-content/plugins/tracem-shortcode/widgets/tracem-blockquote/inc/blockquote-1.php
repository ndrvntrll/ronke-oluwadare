<!-- ============================================================================ -->
<!-- ================================ Team Area ================================= -->
<!-- ============================================================================ -->

<div class="blockquote-area blockquote-one">
    <div class="container">
        <div class="row">
            <div class="col">
                <blockquote>
                    <?php
                    if( $settings['blockquote_text'] ) {
                        echo '<p>' . wp_kses_post( $settings['blockquote_text'] ) . '</p>';
                    }
                    if( $settings['blockquote_author'] ) {
                        echo '<h5>' . esc_html( $settings['blockquote_author'] ) . '</h5>';
                    } ?>
                    
                </blockquote>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .blockquote-area -->