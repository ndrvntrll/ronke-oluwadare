<?php
/**
 * Tracem Left Menu
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

$tracem_header_logo         = '';
$tracem_retina_header_logo  = '';
$tracem_is_header_logo      = '';

if( function_exists( 'cs_get_option' ) ) {
    $_tracem_page_header_options    = get_post_meta( get_the_ID(), '_tracem_page_header_options', true );
    $tracem_page_header_activate    = isset( $_tracem_page_header_options['tracem_page_header_activate'] ) ? $_tracem_page_header_options['tracem_page_header_activate'] : '';
    $tracem_is_header_logo          = isset( $_tracem_page_header_options['tracem_is_header_logo'] ) ? $_tracem_page_header_options['tracem_is_header_logo'] : '';

    if( is_page() && $tracem_page_header_activate == true && $tracem_is_header_logo == true ) {
        $tracem_header_logo          = isset( $_tracem_page_header_options['tracem_header_logo'] ) ? $_tracem_page_header_options['tracem_header_logo'] : '';
        $tracem_retina_header_logo   = isset( $_tracem_page_header_options['tracem_retina_header_logo'] ) ? $_tracem_page_header_options['tracem_retina_header_logo'] : '';
        $tracem_header_logo         = wp_get_attachment_url( $tracem_header_logo );
        $tracem_retina_header_logo  = wp_get_attachment_url( $tracem_retina_header_logo );

    } else {
        $tracem_header_logo         = cs_get_option( 'tracem_header_logo' );
        $tracem_retina_header_logo  = cs_get_option( 'tracem_retina_header_logo' );
        $tracem_header_logo         = wp_get_attachment_url( $tracem_header_logo );
        $tracem_retina_header_logo  = wp_get_attachment_url( $tracem_retina_header_logo );
    }
}


?>

<!-- ============================================================================ -->
<!-- =============================== Mobile Menu ================================ -->
<!-- ============================================================================ -->

<div class="tracem-left-menu-area">
    <div class="tracem-left-menu">
        <?php
        if( ! empty( $tracem_header_logo ) ) {
            echo '<a class="left-menu-logo" href="' . esc_url( home_url( '/' ) ) . '"><img srcset="' . esc_url( $tracem_retina_header_logo ) . ' 2x" src="' . esc_url( $tracem_header_logo ) . '" alt="' . get_bloginfo( 'name' ) . '"></a>';
        } else {
            echo '<a class="left-menu-logo" href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a>';
        } ?>
        <div class="left-menu-wrapper">
            <?php
            if( has_nav_menu( 'mobile-menu' ) ) :

                wp_nav_menu( array(
                    'theme_location'    => 'mobile-menu',
                    'menu_class'        => 'active',
                    'container'         => false,
                    'fallback_cb'       => false
                ) );

            endif; ?>
        </div><!-- .left-menu-wrapper -->
        <?php
        if( $tracem_header_socials ) :

            echo '<ul class="social-area">';

                foreach( $tracem_header_socials as $header_social ) :

                    echo '<li class="nav-item"><a class="nav-link" href="' . $header_social['url'] . '"><i class="' . $header_social['icon'] . '"></i></a></li>';

                endforeach;

            echo '</ul><!-- .navbar-nav .ml-auto -->';

        endif; ?>
    </div><!-- .tracem-mobile-menu -->
</div><!-- .tracem-mobile-menu -->