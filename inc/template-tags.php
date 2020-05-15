<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package shibbir
 */

function post_comments_style( $comments, $args, $depth ) {

	// echo '<pre>';
	// 	print_r( $comments );
	// echo '</pre>';
	$comment_author = $comments->comment_author;
	$comment_date = $comments->comment_date;
	$comment_content = $comments->comment_content;
	$comment_approved = $comments->comment_approved;
	$comment_parent = $comments->comment_parent;
	$user_id = $comments->user_id;
	?>
	<ul class="comment-list mt-30">
		<li>
	        <div class="comment-avatar">
	            <?php shibbir_author_thumb( $user_id ); ?>
	        </div>
	        <div class="">
	            <div class="comment-detail">
	                <h6><?php echo $comment_author; ?></h6>
	                <div class="post-meta">
	                	<span>March 16, 2015</span> | 
                		<span>
                			<!-- <a class="comment-reply-btn" href="
                				<i class="fa fa-reply"></i>Reply
                			</a> -->
                			<?php comment_reply_link( array_merge( $args, array(
							    'reply_text' => __('<i class="fa fa-reply"></i>Reply', 'shibbir'),
							    'depth'      => $depth,
							    'max_depth'  => $args['max_depth']
							    )
							)); ?>
                		</span>
                	</div>
                	<p><?php echo $comment_content; ?></p>
            	</div>
	        </div>
	    </li>
    </ul>
	<?php
	
}

if ( ! function_exists( 'shibbir_author_thumb' ) ) :
	/**
	 * Prints author thumb
	 */
	function shibbir_author_thumb( $user_id ) {	

		if( ! $user_id ) {
			echo sprintf( "<img src='%s'>", get_template_directory_uri() . '/assets/img/user-av.jpg');
		} else {
			$author_id = get_the_author_meta( 'ID', $user_id );
			echo get_avatar( $author_id, 80 );
		}
	}
endif;



if ( ! function_exists( 'shibbir_post_category' ) ) :
	/**
	 * Prints category name of current post
	 */
	function shibbir_post_category() {
		$categories = get_the_category();
		if( $categories ) {
			foreach ( $categories as $category ) {
	    		$category_name = $category->name;
	    		$category_link = get_term_link( $category->term_id );
	    		echo "<span><a href='$category_link'>$category_name</a>,</span>";	
	    	}	
		}
	}
endif;

if ( ! function_exists( 'shibbir_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function shibbir_posted_on() {
		$time_string = '<span>%2$s</span>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<span>%2$s</span><span>%4$s</span>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'shibbir' ),	$time_string  
		);

		echo $posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'shibbir_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function shibbir_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'shibbir' ),
			'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);

		echo '<span> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'shibbir_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function shibbir_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'shibbir' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'shibbir' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'shibbir' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'shibbir' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'shibbir' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'shibbir' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'shibbir_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function shibbir_post_thumbnail() {
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
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
