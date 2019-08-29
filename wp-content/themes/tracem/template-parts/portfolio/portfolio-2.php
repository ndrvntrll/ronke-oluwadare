<?php
/**
 * Tracem Single Portfolio Style
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

?>

<!-- ============================================================================ -->
<!-- =============================== Portfolio Area ============================= -->
<!-- ============================================================================ -->

<section class="tracem-single-portfolio single-portfolio-two tracem-relative pt100" id="tracem-portfolio">
    <div class="container">

        <?php
        if( have_posts() ) :

            while( have_posts() ) : the_post(); ?>
            <div class="row">
                <div class="col-12">
                    <div class="portfolio-content">
                        <div class="portfolio_category">
                            <?php
                            echo get_the_term_list( get_the_ID(), 'portfolio_category', '<ul><li>', ', ', '</li></ul>' ); ?>
                        </div>
                        <?php
                        if( $tp_xtra_title ) {
                            // echo '<h2>' . esc_html( $tp_xtra_title ) . '</h2>';
                            echo '<h2>';
                            echo the_title();
                            echo '</h2>';
                        }
                        the_content(); ?>

                        <?php
                        if( $tp_port_infos ) {
                            echo '<div class="portfolio-info">';
                                echo '<div class="row">';
                                    foreach( $tp_port_infos as $tp_port_info ) {
                                        $tp_heading = isset( $tp_port_info['heading'] ) ? $tp_port_info['heading'] : '';
                                        $tp_info    = isset( $tp_port_info['info'] ) ? $tp_port_info['info'] : '';
                                        echo '<div class="col-md-3 col-6 portfolio-info-wrap">';
                                            echo '<div class="single-portfolio-info">';
                                                echo '<h4>' . esc_html( $tp_heading ) . '</h4>';
                                                echo '<p>' . esc_html( $tp_info ) . '</p>';
                                            echo '</div><!-- .single-portfolio-info -->';
                                        echo '</div>';
                                    }
                                echo '</div>';
                            echo '</div><!-- .portfolio-info -->';
                        } ?>
                    </div><!-- .portfolio-content -->
                </div><!-- .col -->
                <div class="col-12">
                    <div class="portfolio-img">
                        <?php
                        if( $tracem_portfolio_video_url ) {
                            echo '<div class="video-wrapper embed-responsive embed-responsive-16by9"><iframe class="video-list" src="' . esc_url( $tracem_portfolio_video_url ) . '"></iframe></div>';
                        }
                        if( $tp_xtra_image ) {
                            $tp_xtra_image = explode( ',', $tp_xtra_image );
                            foreach( $tp_xtra_image as $portfolio_image ) {
                                $portfolio_image = wp_get_attachment_image_url( $portfolio_image, 'full' );
                                echo '<img src="' . esc_url( $portfolio_image ) . '" alt="' . esc_attr__( 'Portfolio Image', 'tracem' ) . '" />';
                            }
                        }
                        ?>
                    </div><!-- .portfolio-img -->
                </div><!-- .col -->
            </div><!-- .row -->
            <?php endwhile; ?>
        <?php endif; ?>
    </div><!-- .container-fluid -->
</section><!-- .tracem-portfolio-area -->
