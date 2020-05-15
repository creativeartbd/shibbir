<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shibbir
 */

get_header();
?>

<!-- Blank Section -->
<section class="ptb ptb-sm-80">
    <div class="container">
        <div class="row">            
            <div class="col-lg col-md">       
              	<!-- Post Item -->         
				<main id="primary" class="site-main">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'page' );						
				endwhile; // End of the loop.
				?>
				</main>
				 <!-- End Post Item -->
			</div>			
		</div>
	</div>
</section>

<?php
get_footer();
