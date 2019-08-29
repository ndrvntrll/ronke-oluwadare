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

<section class="tracem-single-portfolio single-portfolio-one tracem-relative" id="tracem-portfolio">
    <div class="container">
        
        <?php
        if( have_posts() ) :

            while( have_posts() ) : the_post(); ?>

                <div class="row">
                    <div class="col-md col-12">
                        <div class="theiaStickySidebar">
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
                        </div><!-- .theiaStickySidebar -->
                    </div><!-- .col -->
                    <div class="col-md col-12">
                        <div class="portfolio-content" data-views="<?php echo tracem_post_views( get_the_ID() ); ?>" style="background-image: url(<?php echo get_template_directory_uri(); ?>/inc/images/portfolio/single-portfolio-bg.png);">
                            <div class="theiaStickySidebar">
                            	<div class="portfolio_category">
									<?php
                                    echo get_the_term_list( get_the_ID(), 'portfolio_category', '<ul><li>', ', ', '</li></ul>' ); ?>
                            	</div><!-- .portfolio_category -->
                                <?php
                                if( $tp_xtra_title ) {
                                	echo '<h2>' . esc_html( $tp_xtra_title ) . '</h2>';
                                }
                                the_content(); ?>

                                <?php
                                if( $tp_port_infos ) {
                                    echo '<div class="portfolio-info">';
                                        foreach( $tp_port_infos as $tp_port_info ) {
                                            $tp_heading = isset( $tp_port_info['heading'] ) ? $tp_port_info['heading'] : '';
                                            $tp_info    = isset( $tp_port_info['info'] ) ? $tp_port_info['info'] : '';
                                            echo '<div class="single-portfolio-info">';
                                                echo '<h4>' . esc_html( $tp_heading ) . '</h4>';
                                                echo '<p>' . esc_html( $tp_info ) . '</p>';
                                            echo '</div><!-- .single-portfolio-info -->';
                                        }
                                    echo '</div><!-- .portfolio-info -->';
                                } ?>

                            </div><!-- .theiaStickySidebar -->
                        </div><!-- .portfolio-content -->
                    </div><!-- .col -->
                </div><!-- .row -->

                <div class="row">
                    <div class="col-12">
                        <div class="portfolio-comment">
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                                
                            endwhile; ?>
                        </div>
                    </div>
                </div>
        <?php endif; ?>

    </div><!-- .container-fluid -->
</section><!-- .tracem-portfolio-area -->