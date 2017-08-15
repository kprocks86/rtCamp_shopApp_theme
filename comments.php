<div class="comments">
	<?php if ( have_comments() ): ?>
        <h3 class="comments-title">
			<?php
			if ( get_comments_number() == 1 ) {
				echo get_comments_number() . 'Comment';
			} else {
				echo get_comments_number() . 'Comments';
			}
			?>
        </h3>

        <ul class="row comment-list">
			<?php
			wp_list_comments( array(
				'avatar_size' => 90,
				'callback'    => 'add_theme_comments'
			) );
			?>
        </ul>
	<?php endif; ?>
	<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'Comments' ) ) : {
		?>
        <p class="no-comments">
			<? php_e( 'comments are closed.', 'dazzling' ); ?>
        </p>

	<?php } endif; ?>
</div>
<hr/>
<?php
$comments_args = array(
	// change the title of send button
	'label_submit'        => 'Submit',
	// change the title of the reply section
	'title_reply'         => 'Write a Comment on product',
	// remove "Text or HTML to be displayed after the set of comment fields"
	'comment_notes_after' => '',
	// redefine your own textarea (the comment body)
	'comment_field'       => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br />
            <textarea class="form-control" id="comment" name="comment" aria-required="true"></textarea></p>',
);

comment_form( $comments_args );

// Add Comments
function add_theme_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	extract( $args, EXTR_SKIP );

	if ( 'div' == $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li class="callout secondary"';
		$add_below = 'div-comment';
	}
	?>

    <<?php echo $tag ?><?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>

    <div class="col-md-2">
        <div class="comment-author vcard">
			<?php if ( $args['avatar_size'] != 0 ) {
				echo get_avatar( $comment, $args['avatar_size'] );
			} ?>
			<?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
        </div>
    </div>

    <div class="col-md-10">
		<?php if ( $comment->comment_approved == '0' ) : ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
            <br/>
		<?php endif; ?>

        <div class="comment-meta commentmetadata"><a
                    href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
			?>
        </div>

		<?php comment_text(); ?>

        <div class="reply">
			<?php comment_reply_link( array_merge( $args, array(
				'add_below' => $add_below,
				'depth'     => $depth,
				'max_depth' => $args['max_depth']
			) ) ); ?>
        </div>
    </div>

	<?php if ( 'div' != $args['style'] ) : ?>
        </div>
	<?php endif; ?>
	<?php
}

