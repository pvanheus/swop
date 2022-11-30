

  <!doctype html>
  <html class="no-js" lang="">
  <html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title>SWOP | Society, Work and Politics Institute</title>
    <meta name="description" content="">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" rel="stylesheet">

    <?php wp_head(); ?>

  </head>

  <body>

    <?php wp_body_open(); ?>

    <!-- mobile nav -->
    <div class="mobile-nav showmobile">
      <a href="#"><i class="fas fa-bars fa-2x"></i> </a>
    </div>

    <!-- header -->
    <div id="holder">
      <div class="container-fluid">
        <div class="row top-bar nopad">
          <div class="col-md-2 col-xs-12">
            <a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="logo hidemobile" /></a>
            <center><a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="logo showmobile" /></a></center>
          </div>
          <div class="col-md-12 hidemobile nopad">
            <div class="nav">
							<?php
							$primaryMenu = array(
							    'theme_location'  => 'primary',
							    'menu'            => 'Menu 1',
							    'container'       => '',
							    'container_class' => false,
							    'container_id'    => '',
							    'menu_class'      => 'menu',
							    'menu_id'         => 'Menu 1',
							    'echo'            => false,
							    'fallback_cb'     => false,
							    'before'          => '',
							    'after'           => '',
							    'link_before'     => '',
							    'link_after'      => '',
							    'depth'           => 0,
							    'walker'          => ''
							);
							echo strip_tags( wp_nav_menu( $primaryMenu ), '<a>' );
 							?>
              <!--
              <a href="../swopHTML/index.html">Home</a>
              <a href="about.html">About</a>
              <a href="research.html">Research Projects</a>
              <a href="publications.html">Publications</a>
              <a href="events.html">Events</a>
              <a href="library.html">Library</a>
              -->

              <span class="nav-separate"></span>
              <a href="https://www.facebook.com/SWOPInstitute/" target="_blank"><i class="fab fa-facebook"></i> </a>
              <a href="https://www.instagram.com/societyworkandpolitics/?hl=en" target="_blank"><i class="fab fa-instagram"></i> </a>
              <a href="https://twitter.com/swopinstitute" target="_blank"><i class="fab fa-twitter"></i> </a>
              <a href="https://www.youtube.com/user/SWOPInstitute" target="_blank"><i class="fab fa-youtube"></i></a>

              <div class="search-container">
                <?php get_search_form(); ?>
              </div>

            </div>
          </div>
        </div>