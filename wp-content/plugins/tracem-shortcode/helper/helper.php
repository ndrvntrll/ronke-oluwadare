<?php
/**
 * Contact Form 7 Post type
 */
if ( ! function_exists( 'tracem_get_contact_form_7_posts' ) ) {

    function tracem_get_contact_form_7_posts(){

        $args = array( 'post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1 );

        $catlist = [];

        if( $categories = get_posts( $args ) ){
        	foreach ( $categories as $category ) {
        		(int)$catlist[$category->ID] = $category->post_title;
        	}
        }
        else{
            (int)$catlist['0'] = esc_html__( 'No contect From 7 form found', 'tracem' );
        }

        return $catlist;
        
    }

}