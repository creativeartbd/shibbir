<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shibbir
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-6 col-sm-6 nf-item spacing-grid' ); ?>>
	<div class="blog-post">
        <div class="post-media">
        	<?php shibbir_post_thumbnail(); ?>
        </div>
        <div class="post-meta"><?php shibbir_posted_by(); ?>, <?php shibbir_posted_on(); ?></div>
        <div class="post-header">
            <h5><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
        </div>
        <div class="post-entry">
            <p><?php echo get_the_excerpt(); ?></p>
        </div>
        <div class="post-tag pull-left">
        	<?php shibbir_post_category(); ?>
        </div>
        <div class="post-more-link pull-right">
            <a href="<?php echo get_the_permalink(); ?>">Read More<i class="fa fa-long-arrow-right right"></i></a>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
