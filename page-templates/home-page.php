<?php
/**
 * The main template file
 * Template Name: Home Page
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
<section class="ptb-sm-80">                
	<?php 
    if( have_posts() ) {
        while( have_posts() ) {
            the_post();
            the_content();
        }
    } ?>   
</section>
<!-- End Blank Section -->

<!-- END CONTENT ---------------------------------------------------------------------------->

<?php
get_footer();
