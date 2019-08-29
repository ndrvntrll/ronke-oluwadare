<!-- ============================================================================ -->
<!-- ============================= Home Parallax ================================ -->
<!-- ============================================================================ -->

<div class="home-parallax-area tracem-relative-large">
    <div class="home-parallax">
        <?php
        while( $portfolio->have_posts() ) : $portfolio->the_post();
        $portfolio_thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
            <div class="single-parallax background-image" style="background-image: url(<?php echo esc_url( $portfolio_thumb ); ?>);">
                <div class="parallax-overlay"></div>
                <div class="container-fluid">
                    <div class="row tracem-shrink no-gutters">
                        <div class="col">
                            <div class="parallax-port-cats">
                                <div class="tracem-ovh">
                                    <h5><?php echo get_the_term_list( get_the_ID(), 'portfolio_category', '', ', ' ); ?></h5>
                                    <div class="parallax-line"></div>
                                </div><!-- .tracem-ovh -->
                            </div><!-- .parallax-port-cats -->
                            <div class="parallax-port-details">
                                <div class="tracem-ovh">
                                    <?php
                                    the_title( '<h2>', '</h2>' ); ?>
                                </div><!-- .tracem-ovh -->
                                <div class="btn-generic">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <span>
                                            <span><?php echo esc_html__( 'View Project', 'tracem' ); ?></span>
                                        </span>
                                    </a>
                                </div><!-- .btn-generic -->
                            </div><!-- .parallax-port-details -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container-fluid -->
            </div><!-- .single-parallax -->
        <?php endwhile; wp_reset_postdata(); ?>
    </div><!-- .home-parallax -->
</div><!-- .home-parallax-area -->

<script>
    ;(function($){
        "use strict";
        $(document).ready(function () {

            $(window).on('load', function() {

                jQuery('.home-parallax .single-parallax:nth-child(1)').addClass('animation-loaded');
                jQuery('.home-parallax .single-parallax:nth-child(1) .btn-generic a span').addClass('animation-loaded');            
            });

            /*
            ======================================
                On Scroll Animation
            ======================================
            */
            (function() {

                try {

                    $('.single-parallax').appear(function() {
                        $(this).addClass('animation-loaded');
                        $(this).find('.btn-generic a span').addClass('animation-loaded');
                    });

                } catch (err) {
                }
            
            })();


        });
    })(jQuery)
</script>