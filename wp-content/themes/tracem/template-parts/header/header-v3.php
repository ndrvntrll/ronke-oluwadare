<?php
/**
 * Tracem Header Version Three
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


$is_trans = '';
if( $tracem_is_transparent_menu == true ) {
    $is_trans = 'tracem-transparent-header';
} else {
    $is_trans = '';
}


$is_white = '';
if( $tracem_is_white_menu == true ) {
    $is_white = 'tracem-white-menu';
} else {
    $is_white = '';
}

?>

<!-- ============================================================================ -->
<!-- =============================== Header Area ================================ -->
<!-- ============================================================================ -->

<div class="header-area tracem-initial tracem-primary-header header-three <?php echo esc_attr( $is_trans ); ?> <?php echo esc_attr( $is_white ); ?>">
    <div class="container-fluid">
        <div class="row tracem-shrink no-gutters">
            <div class="col">
                <nav class="navbar navbar-expand-md navbar-light tracem-navbar tracem-initial-navbar">

                    <?php
                    if( ! empty( $tracem_header_logo ) ) {
                        echo '<a href="' . esc_url( home_url( '/' ) ) . '"><img srcset="' . esc_url( $tracem_retina_header_logo ) . ' 2x" src="' . esc_url( $tracem_header_logo ) . '" alt="' . get_bloginfo( 'name' ) . '"></a>';
                    } else {
                        echo '<a class="navbar-brand" href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a>';
                    } ?>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    	<?php
                    	if( has_nav_menu( 'primary' ) ) :

                    		wp_nav_menu( array(
                    			'theme_location'	=> 'primary',
                    			'menu_class'		=> 'navbar-nav ml-auto',
                    			'container'         => false,
                    			'fallback_cb'		=> false
                    		) );

                    	endif; ?>

                        <?php
                        if( $tracem_header_socials ) :

                            // Extra check to see which header version is checked by user
                            $ml = '';
                            if( $tracem_header_select == 'v1' ) {
                                $ml = 'ml-4';
                            } else {
                                $ml = 'ml-auto';
                            }

                            echo '<ul class="navbar-nav social-area ' . esc_attr( $ml ) . '">';

                                foreach( $tracem_header_socials as $header_social ) :

                                    echo '<li class="nav-item"><a class="nav-link" href="' . $header_social['url'] . '"><i class="' . $header_social['icon'] . '"></i></a></li>';

                                endforeach;

                            echo '</ul><!-- .navbar-nav .ml-auto -->';

                        endif; ?>

                        <?php
                        if( $tracem_is_header_search == true ) :

                            // Extra check to see which header version is checked by user
                            $ml = '';
                            if( $tracem_header_select == 'v1' && isset( $tracem_header_socials ) ) {
                                $ml = 'ml-4';
                            } elseif( $tracem_header_select == 'v2' && ! isset( $tracem_header_socials ) ) {
                                $ml = 'ml-auto';
                            } elseif( $tracem_header_select == 'v2' && isset( $tracem_header_socials ) ) {
                                $ml = 'ml-4';
                            } else {
                                $ml = 'ml-auto';
                            }

                            echo '<ul class="tracem-search-nav ' . esc_attr( $ml ) . '">';

                                echo '<li class="nav-item">';

                                    echo '<button id="tracem-search" class="tracem-search"><i class="fas fa-search"></i></button>';

                                    echo '<div id="morphsearch" class="morphsearch">';
                                        echo '<form class="morphsearch-form" action="' . esc_url( home_url( '/' ) ) . '" method="get" role="search">';
                                            echo '<input class="morphsearch-input" type="search" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder', 'tracem' ) . '" name="s" value="' . get_search_query() . '"/>';
                                            echo '<button class="morphsearch-submit" type="submit" style="background-image: url(' . get_parent_theme_file_uri( '/images/magnifier.svg' ) . ')">' . _x( 'Search', 'submit button', 'tracem' ) . '</button>';
                                        echo '</form>';

                                        echo '<span class="morphsearch-close"></span>';
                                    echo '</div><!-- .morphsearch -->';

                                echo '</li>';

                            echo '</ul><!-- .navbar-nav .ml-auto -->';

                        endif; ?>

                    </div><!-- .collapse .navbar-collapse -->
                </nav>
            </div><!-- .col-xs-12 -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .header-area -->