<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shibbir
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<!-- Preloader -->
    <!-- <section id="preloader">
        <div class="loader" id="loader">
            <div class="loader-img"></div>
        </div>
    </section> -->
    <!-- End Preloader -->    

    <!-- Site Wraper -->
    <div class="wrapper">
    	<!-- <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'shibbir' ); ?></a> -->
        <!-- Header ("header--dark", "header-transparent", "header--sticky")-->
        <header id="header" class="header header-transparent header--sticky">
            <!-- Nav Bar -->
            <nav id="navigation" class="header-nav">
                <div class="container">
                    <div class="row d-flex flex-md-row align-items-center">
                        <div class="logo mr-auto">
                            <!--logo-->
                            <a href="<?php site_url( '/' ); ?>">
                                <span class="logo-light">< <?php echo bloginfo( 'title' ); ?> <span class="blinking-dark">/</span>></span>
                                <span class="logo-dark">< <?php echo bloginfo( 'title' ); ?> <span class="blinking-light">/</span>></span>
                            </a>
                            <!--End logo-->
                        </div>
                    
                    	<?php  
						wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => 'nav-menu ml-auto',
								'container_id'    => '',
								'menu_class'      => '',
								'fallback_cb'     => '',
								'menu_id'         => '',
								'depth'           => 2,
								'walker'          => new WP_Bootstrap_Navwalker(),
							)
						);
						?>                            
                        
                        <div class="nav-icons">
                            <div class="nav-icon-item d-lg-none">
                                <span class="nav-icon-trigger menu-mobile-btn align-middle"><i class="ion"></i></span>
                            </div>
                        </div>                  
                    </div>
                </div>
            </nav>
            <!-- End Nav Bar -->
        </header>
        <!-- End Header -->

        <?php 
        $header_background = '';
        if( class_exists( 'acf' ) ) {
            $header_background = get_field( 'header_background', get_the_ID() );
            if( $header_background ) {
                $header_background = $header_background['sizes']['1536x1536'];                
            }
        }
        ?>

         <!-- Intro Section -->
        <section class="inner-intro dark-bg bg-image overlay-dark parallax parallax-background1" data-background-img="<?php echo $header_background; ?>">
            <div class="container">
                <div class="row title">
                    <h2 class="h2"><?php echo get_the_title() ?></h2>
                    <div class="page-breadcrumb">
                        <?php  echo get_hansel_and_gretel_breadcrumbs(); ?>                         
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- End Intro Section -->

