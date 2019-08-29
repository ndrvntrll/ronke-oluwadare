<!-- ============================================================================ -->
<!-- ================================ Team Area ================================= -->
<!-- ============================================================================ -->

<div class="progressbar-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="progress-bar-text">
                    <?php
                    if( $settings['subtitle'] ) {
                        echo '<h5 class="trsubtitle wow fadeInUp" data-wow-delay="200ms">' . esc_html( $settings['subtitle'] ) . '</h5>';
                    }
                    if( $settings['title'] ) {
                        echo '<h3 class="trtitle wow fadeInUp" data-wow-delay="400ms">' . wp_kses_post( $settings['title'] ) . '</h3>';
                    }
                    ?>
                </div><!-- .progressbar-text -->
            </div><!-- .col -->
        </div><!-- .row -->
        <?php
        if( $settings['progressbars'] ) { ?>
            <div class="row">
                <div class="col-12">
                    <?php
                    $i = 1;
                    foreach( $settings['progressbars'] as $single_progressbar ) {
                    $number = isset( $single_progressbar['number'] ) ? $single_progressbar['number'] : '';
                    $text   = isset( $single_progressbar['text'] ) ? $single_progressbar['text'] : '';
                    ?>
                    <div class="tracem-progress progressbar-01 tracem-progress-<?php echo esc_attr( $i ); ?>">
                        <div class="tracem-progress-bar-1-<?php echo esc_attr( $i ); ?> tracem-progress-bar" data-number="<?php echo esc_attr( $number ); ?>" data-barcolor="<?php echo esc_attr( $settings['barcolor'] ); ?>"></div><!-- .proress-bar -->
                        <?php
                        if( $text ) {
                            echo '<span>' . esc_html( $text ) . '</span>';
                        } ?>
                    </div><!-- .progress -->
                    <?php $i++; } ?>
                </div><!-- .col -->
            </div><!-- .row -->
        <?php } ?>
    </div><!-- .container -->
</div><!-- .progressbar-area -->