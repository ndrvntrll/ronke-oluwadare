<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

$tracem_is_footer_top       = true;
$tracem_is_parallax_footer  = '';
$tracem_footer_copyright    = '';
$tracem_footer_slogan       = '';
$tracem_footer_socials      = '';
$tracem_header_select       = '';

$tracem_is_footer_bottom                = false;
$tracem_is_footer_top_container         = true;
$tracem_is_footer_bottom_container      = true; 


if( function_exists( 'cs_get_option' ) ) {
    $_tracem_page_header_options    = get_post_meta( get_the_ID(), '_tracem_page_header_options', true );
    $tracem_is_page_footer_activate = isset( $_tracem_page_header_options['tracem_is_page_footer_activate'] ) ? $_tracem_page_header_options['tracem_is_page_footer_activate'] : '';
    
    if( ( is_page() || get_post_type() == 'portfolio' ) && $tracem_is_page_footer_activate == true ) {
        $tracem_is_footer_top      = isset( $_tracem_page_header_options['tracem_is_footer_top'] ) ? $_tracem_page_header_options['tracem_is_footer_top'] : '';
        $tracem_is_parallax_footer = isset( $_tracem_page_header_options['tracem_is_parallax_footer'] ) ? $_tracem_page_header_options['tracem_is_parallax_footer'] : '';

        $tracem_is_footer_bottom = isset( $_tracem_page_header_options['tracem_is_footer_bottom'] ) ? $_tracem_page_header_options['tracem_is_footer_bottom'] : '';
        $tracem_is_footer_top_container = isset( $_tracem_page_header_options['tracem_is_footer_top_container'] ) ? $_tracem_page_header_options['tracem_is_footer_top_container'] : '';
        $tracem_is_footer_bottom_container = isset( $_tracem_page_header_options['tracem_is_footer_bottom_container'] ) ? $_tracem_page_header_options['tracem_is_footer_bottom_container'] : '';
    } else {
        $tracem_is_footer_top               = cs_get_option( 'tracem_is_footer_top' );
        $tracem_is_parallax_footer          = cs_get_option( 'tracem_is_parallax_footer' );
        $tracem_is_footer_bottom            = cs_get_option( 'tracem_is_footer_bottom' );
        $tracem_is_footer_top_container     = cs_get_option( 'tracem_is_footer_top_container' );
        $tracem_is_footer_bottom_container  = cs_get_option( 'tracem_is_footer_bottom_container' );
    }

    $tracem_is_page_menu            = isset( $_tracem_page_header_options['tracem_is_page_menu'] ) ? $_tracem_page_header_options['tracem_is_page_menu'] : '';

    if( is_page() && $tracem_is_page_menu == true ) {

        // This data comes from specific page option
        $tracem_header_select           = isset( $_tracem_page_header_options['tracem_header_select'] ) ? $_tracem_page_header_options['tracem_header_select'] : '';
    } else {
        // If page options turn off then theme options
        $tracem_header_select           = cs_get_option( 'tracem_header_select' );
    }


    // Only from theme options
    $tracem_footer_copyright    = cs_get_option( 'tracem_footer_copyright' );
    $tracem_footer_slogan       = cs_get_option( 'tracem_footer_slogan' );
    $tracem_footer_socials      = cs_get_option( 'tracem_footer_socials' );
}

if( ! is_404() ) : ?>

<!-- ============================================================================ -->
<!-- =============================== Footer Simple ============================== -->
<!-- ============================================================================ -->
<?php
$is_parallax = '';
if( $tracem_is_parallax_footer == true ) {
    $is_parallax = ' is-parallax';
} else {
    $is_parallax = '';
}

$con_class = 'container';
$row_class = '';
if( $tracem_is_footer_bottom_container == true || $tracem_is_footer_top_container == true ) {
    $con_class = 'container';
    $row_class = '';
} else {
    $con_class = 'container-fluid';
    $row_class = 'tracem-shrink no-gutters';
}

$wrapper_class = '';
if( $tracem_header_select == 'v5' ) {
    $wrapper_class = 'is-left-menu';
} else {
    $wrapper_class = '';
}

if( $tracem_is_parallax_footer == true ) {
    echo '<div class="height-emulator"></div>';
} ?>

<?php
if( $tracem_is_footer_top == true || $tracem_is_footer_bottom == true ) : ?>
<footer class="footer-simple-area<?php echo esc_attr( $is_parallax ); ?> <?php echo esc_attr( $wrapper_class ); ?>">
    <?php
    if( $tracem_is_footer_top == true ) {
        if( is_active_sidebar( 'tracem-footer-one' ) || is_active_sidebar( 'tracem-footer-two' ) || is_active_sidebar( 'tracem-footer-subscription' ) ) {
        ?>
            <div class="footer-large">
                <div class="<?php echo esc_attr( $con_class ); ?>">
                    <div class="row <?php echo esc_attr( $row_class ); ?>">

                        <?php
                        if( is_active_sidebar( 'tracem-footer-one' ) ) {
                            echo '<div class="col-md-4 col-sm-6">';
                                dynamic_sidebar( 'tracem-footer-one' );
                            echo '</div>';
                        }
                        if( is_active_sidebar( 'tracem-footer-two' ) ) {
                            echo '<div class="col-md-4 col-sm-6">';
                                dynamic_sidebar( 'tracem-footer-two' );
                            echo '</div>';
                        }
                        ?>

                        <?php
                        if( is_active_sidebar( 'tracem-footer-subscription' ) ) {
                            echo '<div class="col-md-4">';
                                dynamic_sidebar( 'tracem-footer-subscription' );
                            echo '</div>';
                        }
                        ?>

                    </div><!-- .row -->
                </div><!-- .container-fluid -->
            </div><!-- .footer-large -->
        <?php }
    } ?>

    <?php
    if( $tracem_is_footer_bottom == true ) : ?>
        <div class="footer-small">
            <div class="<?php echo esc_attr( $con_class ); ?>">
                <div class="row <?php echo esc_attr( $row_class ); ?>">

                    <?php
                    if( ! empty( $tracem_footer_copyright ) ) {
                        echo '<div class="col-12 col-md">' . wp_kses_post( $tracem_footer_copyright ) . '</div><!-- .col -->';
                    }

                    if( ! empty( $tracem_footer_slogan ) ) {
                        echo '<div class="col-12 col-md">' . wp_kses_post( $tracem_footer_slogan ) . '</div><!-- .col -->';
                    }

                    if( ! empty( $tracem_footer_socials ) ) {
                        echo '<div class="col-12 col-md"><ul class="footer-social">';

                            foreach( $tracem_footer_socials as $footer_social ) {
                                echo '<li><a href="' . esc_url( $footer_social['url'] ) . '"><i class="' . esc_attr( $footer_social['icon'] ) . '"></i></a></li>';
                            }

                        echo '</ul></div><!-- .col -->';
                    }
                    ?>

                </div><!-- .row -->
            </div><!-- .container-fluid -->
        </div><!-- .footer-small -->
    <?php endif; ?>
</footer><!-- .footer-simple-area -->

<?php endif; ?>

<?php endif; ?>

    <a href="<?php echo esc_url( '#' ); ?>" id="top" class="top">
        <i class="<?php echo esc_attr( 'fas fa-long-arrow-alt-up top-icon' ); ?>"></i>
        <i class="<?php echo esc_attr( 'fas fa-long-arrow-alt-up top-icon-alt' ); ?>"></i>
    </a>

<?php wp_footer(); ?>

</body>
</html>
