<?php
/**
 * Tracem Page Header
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

$tracem_is_page_header              = true;
$tracem_page_header_activate        = false;
$tracem_page_header_video           = '';
$tracem_is_page_header_container    = true;

if( function_exists( 'cs_get_option' ) ) {
    $_tracem_page_header_options    = get_post_meta( get_the_ID(), '_tracem_page_header_options', true );
    $tracem_page_header_activate    = isset( $_tracem_page_header_options['tracem_page_header_activate'] ) ? $_tracem_page_header_options['tracem_page_header_activate'] : '';

    if( ( is_page() || 'portfolio' == get_post_type() ) && $tracem_page_header_activate == true ) {
        $tracem_is_page_header      = isset( $_tracem_page_header_options['tracem_is_page_header'] ) ? $_tracem_page_header_options['tracem_is_page_header'] : '';
        $tracem_page_header_video       = isset( $_tracem_page_header_options['tracem_page_header_video'] ) ? $_tracem_page_header_options['tracem_page_header_video'] : '';
        $tracem_is_page_header_container  = isset( $_tracem_page_header_options['tracem_is_page_header_container'] ) ? $_tracem_page_header_options['tracem_is_page_header_container'] : '';
    } else {
        $tracem_is_page_header              = cs_get_option( 'tracem_is_page_header' );
        $tracem_is_page_header_container    = cs_get_option( 'tracem_is_page_header_container' );
    }
}

$header_video = '';
if( ! empty( $tracem_page_header_video ) ) {
    $header_video   = 'data-vide-bg=' . esc_url($tracem_page_header_video);
    $header_video  .= ' data-vide-options=loop:true,muted:true';
} else {
    $header_video = ''; 
}


$con_class = 'container';
$row_class = '';
if( $tracem_is_page_header_container == true ) {
    $con_class = 'container';
    $row_class = '';
} else {
    $con_class = 'container-fluid';
    $row_class = 'tracem-shrink no-gutters';
}

?>

<?php


if( $tracem_is_page_header == true && ! is_404() ) : ?>
<!-- ============================================================================ -->
<!-- =============================== Breadcrumb ================================= -->
<!-- ============================================================================ -->
<section class="tracem-breadcrumb-area section-padding-large" <?php echo esc_attr( $header_video ); ?> style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/inc/images/header/just-waves.png' ) ?>);">
    <div class="breadcrumb-overlay"></div>
    <div class="<?php echo esc_attr( $con_class ); ?>">
        <div class="row <?php echo esc_attr( $row_class ); ?>">
            <div class="col">
                <div class="tracem-breadcrumb is_animation">
                    <div class="tracem-ovh">
                        <h2>
                            <?php
                            if( is_archive() ) {
                                the_archive_title();
                            } elseif( is_singular( 'portfolio' ) ) {
                                the_title();
                            } elseif( is_home() || is_single() ) {
                                echo esc_html__( 'Blog', 'tracem' );
                            } elseif( is_page() ) {
                                the_title();
                            } elseif( is_search() ) {
                                printf( esc_html__( 'Search Result for: %s', 'tracem' ), '<span>' . get_search_query() . '</span>' );
                            } else {
                                the_title();
                            } ?>
                        </h2>
                    </div><!-- .tracem-ovh -->
                    <div class="tracem-ovh">
                        <nav aria-label="breadcrumb">
                            <?php tracem_breadcrumbs( 'tracem-breadcrumb' ); ?>
                        </nav>
                    </div><!-- .tracem-ovh -->
                </div><!-- .tracem-breadcrumb -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container-fluid -->
</section><!-- .tracem-breadcrumb-area -->
<?php endif; ?>