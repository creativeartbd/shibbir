<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shibbir
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-lg col-md blog-post-hr' ); ?>>
	<div class="blog-post mb-30">
        <div class="post-meta"><?php shibbir_posted_by(); ?>, <?php shibbir_posted_on(); ?></div>

        <div class="post-header">
            <h2><?php echo get_the_title(); ?></h2>
        </div>

        <div class="post-media">
            <div class="owl-carousel item1-carousel nf-carousel-theme">
                <div class="item">
                    <img src="img/full/28.jpg" alt="" />
                </div>
                <div class="item">
                    <img src="img/full/04.jpg" alt="" />
                </div>
                <div class="item">
                    <img src="img/full/26.jpg" alt="" />
                </div>
            </div>
        </div>

        <div class="post-entry">
           <?php the_content(); ?>
        </div>

        <div class="post-tag pull-left"><?php shibbir_post_category(); ?></div>
    </div>

    <hr />

    <div class="post-author">
        <div class="post-author-img pull-left">
        	<?php shibbir_author_thumb( get_current_user_id() ); ?>            
        </div>
        <div class="post-author-details pull-left">
            <h6><?php echo get_the_author_meta( 'display_name' ); ?></h6>
            <?php  
            $current_user = get_current_user_id();
			$user_meta = get_user_meta ( $current_user );			

			$author_description = $user_meta['description'][0];
			$author_facebook = $user_meta['facebook'][0];
			$author_linkedin = $user_meta['linkedin'][0];
			$author_wordpress = $user_meta['wordpress'][0];
			$author_github = $user_meta['github'][0];
			$author_blog = $user_meta['blog'][0];
			
            ?>
            <ul class="social">
                <li><a href="<?php echo $author_facebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="<?php echo $author_linkedin; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="<?php echo $author_github; ?>" target="_blank"><i class="fa fa-github"></i></a></li>
                <li><a href="<?php echo $author_wordpress; ?>" target="_blank"><i class="fa fa-wordpress"></i></a></li>
                <li><a href="<?php echo $author_blog; ?>" target="_blank"><i class="fa fa-pencil-square-o"></i></a></li>
            </ul>

        </div>
    </div>

    <hr />

    <div class="clearfix"></div>

    <div class="post-comment mtb-30">
    	<?php     	
    	if ( comments_open() || get_comments_number() ) :
           comments_template();
        endif;
    	?>     
    </div>

    <div class="mtb-60">
        <h4>Leave a comment</h4>
        <div class="row mt-30">
            <form class="container">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="input-lg form-full" value="" placeholder="Name" name="name" id="name" required />
                    </div>
                    <div class="col-md-4">
                        <input type="email" class="input-lg form-full" value="" placeholder="Email" name="email" id="email2" required />
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="input-lg form-full" value="" placeholder="Website" name="website" id="website" required />
                    </div>
                    <div class="col-md-12">
                        <textarea placeholder="Message" name="message" id="message" class="form-full" required></textarea>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-lg btn-black">Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
