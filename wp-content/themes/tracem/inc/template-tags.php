<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Tracem
 */

if ( ! function_exists( 'tracem_post_meta' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function tracem_post_meta() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'tracem' ),
			'<a href="' . esc_url( get_day_link('', '', '') ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'tracem' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				$categories_list; // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'tracem' ) );
			if ( $tags_list ) {
				$tags_list;
			}
		}

		$cats =  get_the_category();
    $cat = $cats[0];
		$cat_slug = $cat->slug;
		$cat_name = $cat->name;
		// $cat_fake_link = get_site_url(null, $cat_slug, null);
		$cat_fake_link = sprintf(
			/* translators: %s: post date. */
			'<a href="' . esc_url( get_site_url(null, $cat_slug, null) ) . '" rel="bookmark">' . $cat_name . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'tracem' ),
			'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);

		// echo '<span class="post-date"><i class="ti-time"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.
		if ( $categories_list ) {
			echo '<span class="post-cats"><i class="far fa-folder"></i>' . $cat_fake_link . '</span>';
		}
		if ( $tags_list ) {
			echo '<span class="post-tags"><i class="fas fa-tag"></i>' . $tags_list . '</span>';
		}
		// echo '<span class="post-author"><i class="ti-user"></i>' . $byline . '</span>';

	}
endif;

if ( ! function_exists( 'tracem_section_post_meta' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function tracem_section_post_meta() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'tracem' ),
			'<a href="' . esc_url( get_day_link('', '', '') ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'tracem' ),
			'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);

		echo '<span class="post-author">by ' . $byline . '</span>';
		echo '<span class="post-date">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
}


if ( ! function_exists( 'tracem_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function tracem_entry_footer() {

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'tracem' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'tracem_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function tracem_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'tracem-blog', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;
