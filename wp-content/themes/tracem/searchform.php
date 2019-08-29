<?php
/**
 * Template for displaying search forms in Tracem
 *
 * @package tracem
 * @author ThemesTrace
 * @link https://themeforest.net/user/themestrace
 * @version 1.0.0
 * @since 1.0.0
 */

?>

<?php $unique_id = uniqid( 'search-form-' ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="<?php echo esc_attr( $unique_id ); ?>">
        <input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'tracem' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
    </label>
	<button type="submit" class="search-submit"><i class="ti-search"></i><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'tracem' ); ?></span></button>
</form>
