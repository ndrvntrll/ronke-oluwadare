<?php
/**
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */
function tracem_breadcrumbs($class = '') {

    // Settings
    $separator	 = '|';
    $breadcrums_id	 = 'breadcrumbs';
    $breadcrums_class	 = 'breadcrumb ' . $class;
    $home_title	 = 'Home';

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy	 = 'product_cat';

    // Get the query & post information
    global $post;

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="item-home breadcrumb-item"><a class="bread-link bread-home" href="' . esc_url(get_home_url()) . '" title="' . esc_attr( $home_title ) . '">' . esc_html( $home_title ) . '</a></li>';
        if ( is_author() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            $custom_tax_name = get_the_author_meta('display_name');
            echo '<li class="item-current item-archive breadcrumb-item"><span class="bread-current bread-archive">' . $custom_tax_name . '</span></li>';
        } else if (class_exists( 'tracem' ) ) {
                echo '<li class="item-current item-archive breadcrumb-item"><span class="bread-current bread-archive">' . get_the_title('') . '</span></li>'; 
        } else if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="item-current item-archive breadcrumb-item"><span class="bread-current bread-archive">' . get_the_archive_title() . '</span></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat breadcrumb-item item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive breadcrumb-item"><span class="bread-current bread-archive">' . $custom_tax_name . '</span></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat breadcrumb-item item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';

            }

            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $all_category = array_values($category);
                $last_category = end($all_category);

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display    = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat breadcrumb-item">'.$parents.'</li>';
                }

            }

            // Check if the post is in a category
            if(!empty( $last_category ) ) {
                echo wp_kses_post( $cat_display );
                echo '<li class="item-current breadcrumb-item item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

                // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li class="item-cat breadcrumb-item item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="item-current breadcrumb-item item-' . $post->ID . ' active">' . get_the_title() . '</li>';

            } else {

                echo '<li class="item-current breadcrumb-item item-' . $post->ID . ' active">' . get_the_title() . '</li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current breadcrumb-item item-cat"><span class="bread-current bread-cat">' . single_cat_title('', false) . '</span></li>';
            
        } else if ( is_home() ) {
            echo '<li class="active item-cat breadcrumb-item"><span class="bread-current bread-cat">' . esc_html__( 'Blog', 'tracem' ) . '</span></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);
                $parents = '';
                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent breadcrumb-item item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';                    
                }

                // Display parent pages
                echo wp_kses_post( $parents );

                // Current page
                echo '<li class="item-current breadcrumb-item item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="item-current breadcrumb-item item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</span></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id	 = get_query_var('tag_id');
            $taxonomy	 = 'post_tag';
            $args	 = 'include=' . $term_id;
            $terms	 = get_terms( $taxonomy, $args );
            $get_term_id	 = $terms[0]->term_id;
            $get_term_slug	 = $terms[0]->slug;
            $get_term_name	 = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current breadcrumb-item item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><span class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</span></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year breadcrumb-item item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator breadcrumb-item separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month breadcrumb-item item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator breadcrumb-item separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current breadcrumb-item item-' . get_the_time('j') . '"><span class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</span></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year breadcrumb-item item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator breadcrumb-item separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="item-month breadcrumb-item item-month-' . get_the_time('m') . '"><span class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</span></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current breadcrumb-item item-current-' . get_the_time('Y') . '"><span class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</span></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current breadcrumb-item item-current-' . $userdata->user_nicename . '"><span class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</span></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="item-current breadcrumb-item item-current-' . get_query_var('paged') . '"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.esc_html__('Page','tracem') . ' ' . get_query_var('paged') . '</span></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ul>';

    }

}