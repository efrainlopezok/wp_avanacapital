<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
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

<div id="comments" class="comments-area medium-11">

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( _nx( 'One Comment on &ldquo;%2$s&rdquo;', '%1$s Comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'twentyfifteen' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h3>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
			
		</ol><!-- .comment-list -->

		<?php twentyfifteen_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfifteen' ); ?></p>
	<?php endif;
	$args = array(
	'comment_field' => '<p class="comment-form-comment">' .
		'<label for="comment">' . __( 'Let us know what you have to say:' ) . '</label>' .
		'<textarea id="comment" name="comment" placeholder="Express your thoughts, idea or write a feedback by clicking here & start an awesome comment" cols="45" rows="8" aria-required="true"></textarea>' .
		'</p>',
    'comment_notes_after' => '',

	'fields' => apply_filters(
		'comment_form_default_fields', array(
			'author' =>'<div class="row"><div class="columns medium-6 p-tb0"><p class="comment-form-author">' . '<label for="author">' . __( 'Your Name' ).''. ( $req ? '<span class="required">*</span>' : '' )  .'</label><input id="author" placeholder="Your Name (No Keywords)" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p></div>',

			'email'  => '<div class="columns medium-6 p-tb0"><p class="comment-form-email">' . '<label for="email">' . __( 'Your Email' ) . '' .( $req ? '<span class="required">*</span>' : '' ).'</label><input id="email" placeholder="your-real-email@example.com" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30"' . $aria_req . ' /></p></div></div>'
			
		)
	),
	
    'title_reply' => '<div class="crunchify-text"> <h5>Please post your comment below</h5></div>',
    'class_submit' => 'cta cta-xs-small cta-medium'

);
	if($_GET[ 'c' ] == 'y'){

	    echo '<a href="#thankyou_comment" class="hide thankyou_comment"></a><div class="hide"><h4 id="thankyou_comment"><strong>Thank you for your comment. In an effort to reduce spam, your comment will be reviewed before going live.</strong><a href="javascript:void(0)" class="mfp-close popup-modal-dismiss">x</a></h4></div>';
	    echo '<script>jQuery(window).load(function() {SITE.thankyouForComment()});</script>';
	} 
	comment_form($args); ?>

</div><!-- .comments-area -->
