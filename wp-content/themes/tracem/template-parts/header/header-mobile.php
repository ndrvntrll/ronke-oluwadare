<?php
/**
 * Tracem Header For Mobile Devices
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

$tracem_header_logo             = '';
$tracem_is_transparent_menu     = '';

if( function_exists( 'cs_get_option' ) ) {
    $_tracem_page_header_options    = get_post_meta( get_the_ID(), '_tracem_page_header_options', true );
    $tracem_is_page_menu            = isset( $_tracem_page_header_options['tracem_is_page_menu'] ) ? $_tracem_page_header_options['tracem_is_page_menu'] : '';

    if( is_page() && $tracem_is_page_menu == true ) {
        $tracem_is_transparent_menu     = isset( $_tracem_page_header_options['tracem_is_transparent_menu'] ) ? $_tracem_page_header_options['tracem_is_transparent_menu'] : '';

    } else {
        $tracem_is_transparent_menu     = cs_get_option( 'tracem_is_transparent_menu' );
    }

    // Only from theme options
    $tracem_header_logo = cs_get_option( 'tracem_header_logo' );
    $tracem_header_logo = wp_get_attachment_url( $tracem_header_logo );
}

$is_trans = '';
if( $tracem_is_transparent_menu == true ) {
    $is_trans = 'tracem-transparent-header';
} else {
    $is_trans = '';
}

?>

<!-- ============================================================================ -->
<!-- =============================== Mobile Menu ================================ -->
<!-- ============================================================================ -->

<div class="tracem-mobile-menu-area <?php echo esc_attr( $is_trans ); ?> mobile-header<?php echo esc_attr( $tracem_header_select ); ?>">
    <div class="tracem-mobile-menu">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col tracem-shrink">
                    <ul class="mobile-main-ul active">
                        <li>
                            <?php
                            if( ! empty( $tracem_header_logo ) ) {
                                echo '<a class="mobile-logo" href="' . esc_url( home_url( '/' ) ) . '"><img src="' . esc_url( $tracem_header_logo ) . '" alt="' . get_bloginfo( 'name' ) . '"></a>';
                            } else {
                                echo '<a class="mobile-logo" href="' . esc_url( home_url( '/' ) ) . '"><div>' . get_bloginfo( 'name' ) . '</div></a>';
                            } ?>
                        </li>
                        <li>
                            <?php 
                            if( has_nav_menu( 'mobile-menu' ) ) { ?>
                                <a href="#">
                                    <span>
                                        <span class="bar"></span>
                                        <span class="bar"></span>
                                        <span class="bar"></span>
                                    </span>
                                </a>
                                <?php
                                wp_nav_menu( array(
                                    'theme_location'    => 'mobile-menu',
                                    'menu_class'        => '',
                                    'container'         => false,
                                    'fallback_cb'       => false
                                ) );
                            } else { ?>
                                <a href="#">
                                    <span>
                                        <span class="bar"></span>
                                        <span class="bar"></span>
                                        <span class="bar"></span>
                                    </span>
                                </a>
                                <?php
                                wp_nav_menu( array(
                                    'theme_location'    => 'primary',
                                    'menu_class'        => '',
                                    'container'         => false,
                                    'fallback_cb'       => false
                                ) );
                            } ?>
                        </li>
                    </ul>     
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </div><!-- .tracem-mobile-menu -->
</div><!-- .tracem-mobile-menu -->