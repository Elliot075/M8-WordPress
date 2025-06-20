<?php
/**
 * A custom walker for comments, based on the walker in TwentyNineteen
 *
 * @package WordPress
 * @subpackage Magze
 * @since Magze 1.0
 */

if ( ! class_exists( 'Magze_Walker_Comment' ) ) :
	class Magze_Walker_Comment extends Walker_Comment {

		/**
		 * Outputs a comment in the HTML5 format.
		 *
		 * @see wp_list_comments()
		 *
		 * @param WP_Comment $comment Comment to display.
		 * @param int        $depth   Depth of the current comment.
		 * @param array      $args    An array of arguments.
		 */
		protected function html5_comment( $comment, $depth, $args ) {

			$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

			?>
			<<?php echo esc_html( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
				<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
					<footer class="comment-meta">
						<div class="comment-author vcard">
							<?php
							$comment_author_url = get_comment_author_url( $comment );
							$comment_author     = get_comment_author( $comment );
							$avatar             = get_avatar( $comment, $args['avatar_size'] );
							if ( 0 != $args['avatar_size'] ) {
								if ( empty( $comment_author_url ) ) {
									echo $avatar;
								} else {
									printf( '<a href="%s" rel="external nofollow" class="url">', $comment_author_url );
									echo $avatar;
								}
							}

							printf(
								/* Translators: %s = comment author link */
								__( '%s <span class="screen-reader-text says">says:</span>', 'magze' ),
								sprintf( '<span class="fn">%s</span>', $comment_author )
							);

							if ( ! empty( $comment_author_url ) ) {
								echo '</a>';
							}
							?>
						</div><!-- .comment-author -->

						<div class="comment-metadata">
								<?php
								/* Translators: 1 = comment date, 2 = comment time */
								$comment_timestamp = sprintf( __( '%1$s - %2$s', 'magze' ), get_comment_date( '', $comment ), get_comment_time() );
								?>
								<time datetime="<?php comment_time( 'c' ); ?>" title="<?php echo $comment_timestamp; ?>">
									<?php echo $comment_timestamp; ?>
								</time>
						</div><!-- .comment-metadata -->

					</footer><!-- .comment-meta -->

					<div class="comment-content">

						<?php

						comment_text();

						if ( '0' == $comment->comment_approved ) :
							?>
							<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'magze' ); ?></p>
						<?php endif; ?>

					</div><!-- .comment-content -->

					<?php

					$comment_reply_link = get_comment_reply_link(
						array_merge(
							$args,
							array(
								'add_below' => 'div-comment',
								'depth'     => $depth,
								'max_depth' => $args['max_depth'],
								'before'    => '<span class="comment-reply">',
								'after'     => '</span>',
							)
						)
					);

					$by_post_author = magze_is_comment_by_post_author( $comment );

					$edit_comment_link = get_edit_comment_link() ? '<a class="edit-comment-link" href="' . get_edit_comment_link() . '">' . __( 'Edit', 'magze' ) . '</a>' : '';

					if ( $comment_reply_link || $by_post_author || $edit_comment_link ) :
						?>

						<footer class="comment-footer-meta">

							<?php
							if ( $comment_reply_link ) {
								echo $comment_reply_link;
							}
							if ( $edit_comment_link ) {
								echo $edit_comment_link;
							}
							if ( $by_post_author ) {
								echo '<span class="by-post-author">' . __( 'By Post Author', 'magze' ) . '</span>';
							}
							?>

						</footer>

					<?php endif; ?>

				</article><!-- .comment-body -->

			<?php
		}
	}
endif;
