<!-- ============================================================================ -->
<!-- ================================ Team Area ================================= -->
<!-- ============================================================================ -->

<div class="section-blog-posts-area section-blog-posts-two">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-blog-text">
                    <?php
                    if( $settings['subtitle'] ) {
                        echo '<h5 class="trsubtitle wow fadeInUp" data-wow-delay="200ms">' . esc_html( $settings['subtitle'] ) . '</h5>';
                    }
                    if( $settings['title'] ) {
                        echo '<h3 class="trtitle wow fadeInUp" data-wow-delay="400ms">' . wp_kses_post( $settings['title'] ) . '</h3>';
                    }
                    ?>
                </div><!-- .about-us-text -->
            </div><!-- .col -->
        </div><!-- .row -->

        <div class="row">
            <?php
            while( $posts->have_posts() ) : $posts->the_post(); ?>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="single-section-blog-post">
                        <?php
                        the_title( '<h5><a href=" ' . esc_url( get_the_permalink() ) . ' ">', '</a></h5>' ); ?>
                        
                        <?php
                        the_excerpt(); ?>
                    </div><!-- .single-section-blog-post -->
                </div><!-- .col-md-4 col-sm-6 col-12 -->
            <?php endwhile; wp_reset_postdata(); ?>
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .section-blog-posts-area -->
