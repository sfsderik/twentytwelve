<!doctype html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo asset_path('images/fenwickmortgage.ico'); ?>" type="image/x-icon" />
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="wrap" role="document">
        <header id="masthead" class="site-header" role="banner">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="<?php esc_url( home_url('/') ); ?>">
                          <?php if ( get_header_image() ) : ?>
                          <img src="<?php header_image(); ?>" class="header-image" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
                         <?php else : ?>
                             <img src="" alt="<?php echo get_bloginfo('name'); ?>"/>
                         <?php endif; ?>
                      </a>
                    </div>
                    <?php if ( is_active_sidebar( 'navbar-widget' ) ) : ?>
                      <?php dynamic_sidebar( 'navbar-widget' ); ?>
                    <?php endif; ?>
                    <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
                        <?php if ( has_nav_menu('primary') ) : ?>
                            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav navbar-nav', 'container' => false ) ); ?>
                        <?php endif; ?>
                    </div><!--/.nav-collapse -->
                  </div>
            </nav>
        </header><!-- #masthead -->
