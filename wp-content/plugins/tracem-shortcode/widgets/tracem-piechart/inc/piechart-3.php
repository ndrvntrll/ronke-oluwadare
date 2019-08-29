<!-- ============================================================================ -->
<!-- ================================ Team Area ================================= -->
<!-- ============================================================================ -->

<div class="piecharts-area piechart-03">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="piechart-text">
                    <?php
                    if( $settings['subtitle'] ) {
                        echo '<h5 class="trsubtitle wow fadeInUp" data-wow-delay="200ms">' . esc_html( $settings['subtitle'] ) . '</h5>';
                    }
                    if( $settings['title'] ) {
                        echo '<h3 class="trtitle wow fadeInUp" data-wow-delay="400ms">' . wp_kses_post( $settings['title'] ) . '</h3>';
                    }
                    ?>
                </div><!-- .piechart-text -->
            </div><!-- .col -->
        </div><!-- .row -->
        <?php
        if( $settings['piecharts'] ) { ?>
            <div class="row">
                <?php
                $i = 0;
                foreach( $settings['piecharts'] as $single_piechart ) {
                $number = isset( $single_piechart['number'] ) ? $single_piechart['number'] : '';
                $text   = isset( $single_piechart['text'] ) ? $single_piechart['text'] : '';
                ?>
                <div class="col-md col-sm-6 col-12 chart-wrapper-3">
                    <div class="chart-3 chart-number">
                        <div class="chart-3-<?php echo esc_attr( $i ); ?> chart-value" data-size="<?php echo esc_attr( $settings['size'] ); ?>" data-width="<?php echo esc_attr( $settings['width'] ); ?>" data-tcolor="<?php echo esc_attr( $settings['tcolor'] ) ?>" data-barcolor="<?php echo esc_attr( $settings['barcolor'] ) ?>" data-percent="<?php echo esc_attr( $number ); ?>"><span><?php echo esc_html( $number ); ?>%</span></div>
                        <?php
                        if( $text ) {
                            echo '<h5>' . esc_html( $text ) . '</h5>';
                        } ?>
                    </div><!-- .chart-1 -->
                </div><!-- .col -->
                <?php $i++; } ?>
            </div><!-- .row -->
        <?php } ?>
    </div><!-- .container -->
</div><!-- .piecharts-area -->