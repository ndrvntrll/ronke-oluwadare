<?php
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_list_comments
 * @package tracem
 * @author ThemesTrace
 * @link https://themestrace.com
 * @version 1.0.0
 * @since 1.0.0
 */

function tracem_comment_template( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
            // Display trackbacks differently than normal comments.
            ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <p><?php esc_html__( 'Pingback:', 'tracem' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'tracem' ), '<span class="edit-link">', '</span>' ); ?></p>
            <?php
            break;
        default :
            // Proceed with normal comments.
            global $post;
            ?>
        <li <?php comment_class( 'comment-item' ); ?> id="comment-<?php comment_ID(); ?>">
            <div id="div-comment-<?php comment_ID(); ?>">
                <div class="media single-comment">
                    <?php echo get_avatar( $comment, 70, null, null, array( 'class' => array( 'd-none', 'd-md-block' ) ) ); ?>
                    <div class="media-body">
                        <div class="comment-content">
                            <div class="comment-header">
                                <h4 class="comment-title"><?php echo get_comment_author_link(); ?></h4>
                                <h6>
                                    <span>/</span>
                                    <time datetime="<?php echo get_comment_time( 'c' ); ?>">
                                        <?php echo sprintf( esc_html__( '%1$s at %2$s', 'tracem' ), get_comment_date(), get_comment_time() ) ?>
                                    </time>
                                </h6>
                            </div><!-- .comment-header -->

                            <div class="comment-text">
                               <?php comment_text(); ?> 
                            </div><!-- .comment-text -->
	                        <?php if ( '0' == $comment->comment_approved ) : ?>
	                            <p class="comment-awaiting-moderation"><?php esc_html__( 'Your comment is awaiting moderation.', 'tracem' ); ?></p>
	                        <?php endif; ?>

                            <p class="reply">
                                <?php
                                    comment_reply_link(
                                        array_merge( $args,
                                            array(
                                                'reply_text' => esc_html__( 'Reply', 'tracem' ),
                                                'depth'      => $depth,
                                                'max_depth'  => $args['max_depth'],
                                                'before'     => '<i class="ti-back-right"></i>'
                                            )
                                        )
                                    );
                                ?>
                            </p>
	                        <?php edit_comment_link( esc_html__( 'Edit', 'tracem' ), '<p class="edit-link">', '</p>' ); ?>
                        </div><!-- .comment-content -->
                    </div><!-- .col-8 -->
                </div><!-- .media -->
            </div><!-- .row -->
            <?php
            break;
    endswitch; // end comment_type check
}