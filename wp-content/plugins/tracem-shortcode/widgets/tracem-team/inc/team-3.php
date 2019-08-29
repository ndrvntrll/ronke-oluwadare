<!-- ============================================================================ -->
<!-- ================================ Team Area ================================= -->
<!-- ============================================================================ -->

<div class="our-team-area team-two">
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

        <div class="team-members">
            <div class="row">
                <?php
                $i = 1;
                while( $team->have_posts() ) : $team->the_post();
                $portfolio_thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );

                $tracem_team_member_designation = '';
                $tracem_team_member_socials     = '';
                if( function_exists( 'cs_get_option' ) ) {
                    $_tracem_team_options           = get_post_meta( get_the_ID(), '_tracem_team_options', true );
                    $tracem_team_member_designation = isset( $_tracem_team_options['tracem_team_member_designation'] ) ? $_tracem_team_options['tracem_team_member_designation'] : '';
                    $tracem_team_member_socials     = isset( $_tracem_team_options['tracem_team_member_socials'] ) ? $_tracem_team_options['tracem_team_member_socials'] : '';
                }
                ?>
                    <div class="col-md-4 col-sm-6 col-12 team-member-wrap">
                        <div class="single-team-member team-three">
                            <img src="<?php echo esc_url( $portfolio_thumb ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                            <?php
                            the_title( '<h4>', '</h4>' ); ?>
                            <?php
                            if( $tracem_team_member_designation ) {
                                echo '<p class="designation">' . esc_html( $tracem_team_member_designation ) . '</p>';
                            } 
                            if( $tracem_team_member_socials ) {
                                echo '<ul>';
                                    foreach( $tracem_team_member_socials as $tracem_team_member_social ) {
                                        echo '<li><a href="' . esc_url( $tracem_team_member_social['url'] ) . '"><i class="' . esc_attr( $tracem_team_member_social['icon'] ) . '"></i></a></li>';
                                    }
                                echo '</ul>';
                            } ?>

                        </div><!-- .single-team-member -->
                    </div>

                <?php $i++; endwhile; wp_reset_postdata(); ?>
            </div><!-- .row -->
        </div><!-- .team-members -->
    </div><!-- .container -->
</div><!-- .our-team-area -->