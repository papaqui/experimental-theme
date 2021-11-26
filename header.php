<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

    <header class="main-container">

      <div class="site-title">
        <h1><a href="<?php echo site_url('/') ?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
      </div>

      <!-- The icon -->
      <div class="the-icon">
        <div id="nav-icon3">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>

      <!-- Navigation -->
      <div class="main-navigation">
       <nav>
        <?php 
          wp_nav_menu(array(
            'theme_location' => 'mainMenu'
          )); 
        ?>
        </nav>
      </div>

    </header>
 