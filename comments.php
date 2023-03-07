<?php
//
// The template for displaying comments.
//
// @link https://developer.wordpress.org/themes/basics/template-hierarchy/
//
defined( 'ABSPATH' ) || exit; // Exit if accessed directly.


if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	if ( have_comments() ) : ?>
		<h2 class="comments-title"><?php esc_html_e( 'Comments', 'template' ); ?></h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Comment Navigation Above', 'template' ); ?>">
			<span class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'template' ); ?></span>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'template' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'template' ) ); ?></div>
		</nav>
		<?php endif; ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'template' ); ?></h2>
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'template' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'template' ) ); ?></div>
				</div>
			</nav>
   		<?php endif; ?>

		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'style'      => 'ol',
						'short_ping' => true,
						'callback'   => 'single_comment',
					)
				);
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'template' ); ?></h2>
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'template' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'template' ) ); ?></div>
				</div>
			</nav>
    	<?php endif;

  	endif; 

	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments have been closed.', 'template' ); ?></p>
	<?php endif;

	comment_form();
	?>

</div>


<?php
function single_comment( $comment, $args, $depth ) { ?>
  <li id="li-comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
    <div id="comment-<?php comment_ID(); ?>" class="comment-body">

		<div class="comment-meta commentmetadata">
			<div class="comment-author vcard">
      			<?php echo get_avatar( $comment, '40' ); ?>
      			<cite class="comment-author"><?php echo get_comment_author_link(); ?></cite>
			</div>

			<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" class="comment-date">
			<time datetime="<?php echo esc_attr( get_comment_date( 'c' ) ); ?>"><?php echo esc_html( get_comment_date() ); ?></time>
			</a>

			<?php if ( '0' === $comment->comment_approved ) : ?>
				<p><em><?php esc_html_e( 'Your comment is pending approval.', 'template' ); ?></em></p>
			<?php endif; ?>
	  	</div>

		<div class="comment-content">
			<div class="comment-text">
				<?php comment_text(); ?>
			</div>
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
				edit_comment_link( __( '&mdash; Edit', 'template' ), ' ', '' ); ?>
			</div>
		</div>
		
    </div>
  </li>
<?php }
