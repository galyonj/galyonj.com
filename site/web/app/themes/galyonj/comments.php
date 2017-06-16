<?php
/**
 * Comments template
 * Author     : John Galyon
 * Author URI : https://www.galyonj.com
 * Created    : May 8, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage galyonj
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comment-area">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'galyonj' ), get_the_title() );
			} else {
				printf(
				/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'twentyseventeen'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'avatar_size' => 100,
				'style'       => 'ol',
				'short_ping'  => true,
				'reply_text'  => '<i class="fa fa-reply" aria-hidden="true"></i> ' . __( 'Reply', 'galyonj' ),
			) );
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => '<i class="fa fa-chevron-left" aria-hidden="true"></i><span class="screen-reader-text">' . __( 'Previous', 'galyonj' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'galyonj' ) . '</span><i class="fa fa-chevron-right" aria-hidden="true"></i>',
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'galyonj' ); ?></p>
		<?php
	endif;

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? ' aria-required="true"' : '' );

	$fields = array(
		'author' => '<div class="form-group"><label for="author">' . __( 'Name', 'galyonj') . '</label>' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . ( $req ? 'aria-required="true"' : '' ) . '></div>',
		'email'  => '<div class="form-group"><label for="email">' . __( 'Email', 'galyonj') . '</label>' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" ' . ( $req ? 'aria-required="true"' : '' ) . '></div>',
		'url'    => '<div class="form-group"><label for="url">' . __( 'Website', 'galyonj') . '</label><input id="url" class="form-control" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" ' . ( $req ? 'aria-required="true"' : '' ) . '></div>'
	);

	$comment_args = array(
		'comment_field' => '<div class="form-group"><label for="comment">' . __( 'Comment', 'galyonj' ) . '</label>'
		                   . ( $req ? '<span class="required">*</span>' : '' ) . '<textarea id="comment" name="comment" class="form-control" rows="8" ' . $aria_req . '></textarea></div>',
		'fields'        => apply_filters( 'comment_form_default_fields', $fields ),
		'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-default" value="%4$s" />',
		'title_reply'   => __( 'Leave a reply', 'galyonj' )
	);

	comment_form( $comment_args );
	?>
</div>

<!--<div class="form-group">
	<label for="author"><?php /*__( 'Name', 'galyonj' ); ( $req ? '<span class="required">*</span>' : '' ); */?></label>
	<input type="text" id="author" class="form-control" name="author" <?php /*$aria_req; */?> value="<?php /*esc_attr( $commenter[comment_author] ); */?>">
</div>-->
