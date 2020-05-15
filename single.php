<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package shibbir
 */

get_header();
?>
<!-- CONTENT --------------------------------------------------------------------------------->
        
<!-- Blank Section -->
<section class="ptb ptb-sm-80">
    <div class="container">
        <div class="row">            
            <div class="col-lg col-md">   
                <!-- Post Item -->
                <main id="primary" class="site-main">             
                <?php 
                if( have_posts() ) {
                	while( have_posts() ) {
                		the_post();
                		get_template_part( 'template-parts/content', 'single' );
                	}
                }
                ?>       
                </main>         
                <!-- End Post Item -->
            </div>           

            <!-- Sidebar -->           
            <?php get_sidebar(); ?>           
            <!-- End Sidebar -->
        </div>
    </div>
</section>
<!-- End Blank Section -->

<!-- END CONTENT ---------------------------------------------------------------------------->
<?php
get_footer();
