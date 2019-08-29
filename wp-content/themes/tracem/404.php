<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Tracem
 */

get_header();

$tracem_404_bg = '';
if( function_exists( 'cs_get_option' ) ) {
    $tracem_404_bg = cs_get_option( 'tracem_404_bg' );
    $tracem_404_bg = wp_get_attachment_url( $tracem_404_bg );
}

if( $tracem_404_bg ) {
    $tracem_404_bg = 'style=background-image:url('. esc_url($tracem_404_bg) .')';
}

?>

    <!-- ============================================================================ -->
    <!-- ================================= 404 Area ================================= -->
    <!-- ============================================================================ -->

    <section class="page-404-area text-center" <?php echo esc_attr( $tracem_404_bg ); ?>>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-404-text">
                        <h2>404</h2>
                        <h5 class="trsubtitle"><?php echo esc_html__( 'page not found', 'tracem' ); ?></h5>
                        <h3 class="trtitle"><?php echo wp_kses_post( 'Sorry! The page you are looking for is not <br> found or move forward', 'tracem' ); ?></h3>
                        <a class="btn-circle" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <span><?php esc_html_e( 'Back to homepage', 'tracem' ); ?></span>
                            <svg width="13px" height="10px" viewBox="0 0 13 10">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                        </a>
                    </div><!-- .about-us-text -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </section><!-- .page-404-area -->

<?php
get_footer();
