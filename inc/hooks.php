<?php
/**
 * All hooks will be registered here
 *
 * @package shibbir
 * 
 */


add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

function wpb_move_comment_field_to_bottom( $fields ) {

	echo '<pre>';
	print_r( $fields );
	echo '</pre>';
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
 


add_filter( 'comment_form_defaults', 'shibbir_post_comment_form_2' );

if ( ! function_exists( 'shibbir_post_comment_form_2' ) ) :
	/**
	 *  Re-design post comment reply form 
	 */
	function shibbir_post_comment_form_2( $fields ) {
	
		// echo '<pre>';
		// 	print_r( $fields );
		// echo '</pre>';
		// echo '<hr/>';
		
		$fields['comment_field'] = '<textarea placeholder="Your Message" name="comment" id="comment" class="form-full" required=""></textarea>';
		$fields['name_submit'] = 'Reply';
		$fields['class_submit'] = 'btn btn-lg btn-black';
		
		return $fields;
	}

endif;


add_filter( 'comment_form_default_fields', 'shibbir_post_comment_form' );

if ( ! function_exists( 'shibbir_post_comment_form' ) ) :
	/**
	 *  Re-design post comment reply form 
	 */
	function shibbir_post_comment_form( $fields ) {
		unset(  $fields[ 'url' ] );
		//unset(  $fields['comment_field'] );

		// echo '<pre>';
		// 	print_r( $fields );
		// echo '</pre>';
		// echo '<hr/>';

		$fields['author'] = '<input type="text" class="input-lg form-full" value="" placeholder="Your name" name="author" id="name" required="">';
		$fields['email'] = '<input type="email" class="input-lg form-full" value="" placeholder="Your email address" name="email" id="email" required="">';
		
		// $fields['url'] = '<input type="text" class="input-lg form-full" value="" placeholder="Website" name="url" id="url" required="">';		
		//$fields['comment_field'] = '<textarea placeholder="Your Message" name="comment" id="comment" class="form-full" required=""></textarea>';
		//$fields['name_submit'] = 'Reply';
		//$fields['class_submit'] = 'btn btn-lg btn-black';
		
		return $fields;
	}

endif;


add_filter( 'user_contactmethods', 'shibbir_user_contactmethods');

if ( ! function_exists( 'shibbir_user_contactmethods' ) ) :
	/**
	 *  Add custom fields
	 */
	function shibbir_user_contactmethods( $user_contactmethods  ) {

		// All required fields
		$extra_fields =  array( 
			array( 'facebook', __( 'Facebook', 'shibbir' ), true ),
			array( 'linkedin', __( 'Linkedin', 'shibbir' ), false ),	
			array( 'wordpress', __( 'WordPress.org', 'shibbir' ), false ),
			array( 'github', __( 'Github', 'shibbir' ), false ),
			array( 'blog', __( 'Personal Blog', 'shibbir' ), true )
		);

		// Display each field
		foreach( $extra_fields as $field ) {
			if ( !isset( $user_contactmethods[ $field[0] ] ) )
	    		$user_contactmethods[ $field[0] ] = $field[1];
		}	

		return $user_contactmethods;

	}
endif;