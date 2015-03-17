<?php
/**
 * Template for displaying Comments
 *
 * @package WordPress
 * @since PlanusWP 1.0
 */
?>

			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'planuswp' ); ?></p>
			</div><!-- #comments -->
<?php
		/*
		 * Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
			<h3 class="comm-title" id="comments-title"><?php
			printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'planuswp' ),
				number_format_i18n( get_comments_number() )  );
			?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'planuswp' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'planuswp' ) ); ?></div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>

			<ol class="comments">
				<?php
					/*
					 * Loop through and list the comments. Tell wp_list_comments()
					 * to use planuswp_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define planuswp_comment() and that will be used instead.
					 * See planuswp_comment() in planuswp/functions.php for more.
					 */
					wp_list_comments( array( 
						'callback'        => 'planuswp_comment',
						'max_depth'       => '',
						'avatar_size'       => 0, ) );
				?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'planuswp' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'planuswp' ) ); ?></div>
			</div><!-- .navigation -->
<?php endif; // check for comment navigation ?>

	<?php
	/*
	 * If there are no comments and comments are closed, let's leave a little note, shall we?
	 * But we only want the note on posts and pages that had comments in the first place.
	 */
	if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'planuswp' ); ?></p>
	<?php endif;  ?>

<?php endif; // end have_comments() ?>


<!-- Comment Form -->
<?php $comment_args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
    'author' => '<div class="form-group comment-form-name">' .
                '<input class="form-control input-lg" id="author" type="text" name="author" placeholder="' . __( 'Your Name', 'planuswp' ) . '" value="'.
                esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' .
                '</div>',
    'email'  => '<div class="form-group comment-form-email">' .
                '<input class="form-control input-lg" id="email" name="email" type="text" placeholder="' . __( 'Your Email', 'planuswp' ) . '" value="' .
                esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' .
				'</div>',
    'url'    => '' ) ),
    'comment_field' => '<div class="form-group comment-form-comment">' .
                '<textarea class="form-control" id="comment" name="comment" placeholder="' . __( 'Comment', 'planuswp' ) . '" cols="45" rows="8" aria-required="true"></textarea>' .
                '</div>',
    'comment_notes_after' => '',
    'comment_notes_before' => '<p class="comment-note">' . __( 'Email will remain private. All fields are required. No html tags alowed.', 'planuswp' ) . '</p>',
); ?>

<?php comment_form($comment_args); ?>

</div><!-- #comments -->
