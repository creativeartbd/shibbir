<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
            <!-- Post Item -->
            <div class="col-lg col-md"> 
                <div class="row">
            	   <?php 
                    if( have_posts() ) {
                    	while( have_posts() ) {
                    		the_post();
                            get_template_part( 'template-parts/content', 'archive' );
                    	}
                    }
                    ?>
                </div>

                <!-- Pagination Nav -->
                <div class="pagination-nav text-left mt-60 mtb-xs-30">
                    <ul>
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
                <!-- End Pagination Nav -->

            </div>
            <!-- End Post Item -->           
        </div>
    </div>
</section>
<!-- End Blank Section -->

<!-- END CONTENT ---------------------------------------------------------------------------->

<?php
get_footer();
