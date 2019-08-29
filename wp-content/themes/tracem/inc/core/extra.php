<?php
/**
 * Tracem Core Extra
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

/*
 * Tracem Megamenu theme
 */

function tracem_megamenu_override_default_theme( $value ) {
  // change 'primary' to your menu location ID
  if ( !isset($value['primary']['theme']) ) {
    $value['primary']['theme'] = 'tracem_megamenu_add_theme_default_1554556593'; // change my_custom_theme_key to the ID of your exported theme
  }

  return $value;
}
add_filter( 'default_option_megamenu_settings', 'tracem_megamenu_override_default_theme' );


/*
 * Add custom information in user profile
 */

function tracem_user_profile_fields( $user ) { ?>
    <h3><?php esc_html_e( 'Extra profile information' , 'tracem' ); ?></h3>

    <table class="form-table">
	    <tr>
	        <th><label for="designation"><?php esc_html_e( 'Designation', 'tracem' ); ?></label></th>
	        <td>
	            <input type="text" name="designation" id="designation" value="<?php echo esc_attr( get_the_author_meta( 'designation', $user->ID ) ); ?>" class="regular-text" /><br />
	            <p class="description"><?php esc_html_e( 'Please enter your designation.', 'tracem' ); ?></p>
	        </td>
	    </tr>
	    <tr>
	        <th><label for="signature"><?php esc_html_e( 'Signature URL', 'tracem' ); ?></label></th>
	        <td>
	            <input type="text" name="signature" id="signature" value="<?php echo esc_attr( get_the_author_meta( 'signature', $user->ID ) ); ?>" class="regular-text" /><br />
	            <p class="description"><?php esc_html_e( 'Please upload your image from media library and paste the URL here.', 'tracem' ); ?></p>
	        </td>
	    </tr>
    </table>
<?php }
add_action( 'show_user_profile', 'tracem_user_profile_fields' );
add_action( 'edit_user_profile', 'tracem_user_profile_fields' );

/*
 * Save custom information in database from user profile
 */

function save_tracem_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'designation', $_POST['designation'] );
    update_user_meta( $user_id, 'signature', $_POST['signature'] );
}

add_action( 'personal_options_update', 'save_tracem_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_tracem_user_profile_fields' );


/*
 * Move comment form to bottom
 */
function tracem_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
 
add_filter( 'comment_form_fields', 'tracem_move_comment_field_to_bottom' );


if( ! function_exists( 'tracem_modified_excerpt_more' ) ) {
	/*
	 * Modify Excerpt More Default [...]
	 */
	function tracem_modified_excerpt_more() {
		return '';
	}
}

add_filter( 'excerpt_more', 'tracem_modified_excerpt_more' );


/**
  * Add post view counter
  */
function tracem_post_views( $post_ID ) {

    //Set the name of the Posts Custom Field.
    $count_key = 'post_views_count';

    //Returns values of the custom field with the specified key from the specified post.
    $count = get_post_meta( $post_ID, $count_key, true );

    //If the the Post Custom Field value is empty.
    if( $count == '' ) {
        $count = 0; // set the counter to zero.

        //Delete all custom fields with the specified key from the specified post.
        delete_post_meta( $post_ID, $count_key );

        //Add a custom (meta) field (Name/value)to the specified post.
        add_post_meta( $post_ID, $count_key, '0' );
        return $count . '';

        //If the the Post Custom Field value is NOT empty.
    } else {
        $count++; //increment the counter by 1.
        //Update the value of an existing meta key (custom field) for the specified post.
        update_post_meta( $post_ID, $count_key, $count );

        //If statement, is just to have the singular form 'View' for the value '1'
        if( $count == '1' ){
            return $count . '';
        }
        //In all other cases return (count) Views
        else {
            return $count . '';
        }
    }
}
add_action( 'init', 'tracem_post_views' );

if( ! function_exists( 'themestrace_get_post_views' ) ) {
	/*
	 * Function to display number of posts
	 */
	function themestrace_get_post_views( $postID ) {

	    $count_key 	= 'post_views_count';
	    $count 		= get_post_meta( $postID, $count_key, TRUE );

	    if( $count == '' ) {
	        delete_post_meta( $postID, $count_key );
	        add_post_meta( $postID, $count_key, '0' );
	        return "0";
	    }
	    return $count;
	}
}


function tracem_import_files() {
  return array(
    array(
        'import_file_name'             => esc_html__( 'Demo Content', 'tracem' ),
        'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/content.xml',
        'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/widget.wie',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'screenshot.png',
        'import_notice'                => esc_html__( 'After finishing the demo data, you need to import theme options backup!', 'tracem' ),
        'preview_url'                  => 'http://themestrace.com/tracem/',
    ),
    array(
        'import_file_name'             => esc_html__( 'Demo Content', 'tracem' ),
        'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/content.xml',
        'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/widget.wie',
        'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'screenshot.png',
        'import_notice'                => esc_html__( 'After finishing the demo data, you need to import theme options backup!', 'tracem' ),
        'preview_url'                  => 'http://themestrace.com/tracem/',
    ),

  );
}
add_filter( 'pt-ocdi/import_files', 'tracem_import_files' );


function tracem_after_import_setup() {
    // Assign menus to their locations.
    $main_menu      = get_term_by( 'name', 'Primary', 'nav_menu' );
    $mobile_menu    = get_term_by( 'name', 'Mobile Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary'       => $main_menu->term_id,
            'mobile-menu'   => $mobile_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Right Sidebar Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'tracem_after_import_setup' );