<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' :'; } ?> <?php bloginfo( 'name' ); ?></title>

    <link href="http://www.google-analytics.com/" rel="dns-prefetch"><!-- dns prefetch -->
    <!-- meta -->

    <!-- icons -->
    <link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">

    <!-- css + javascript -->
    <?php wp_head(); ?>
    <!--[if lt IE 9]>
      <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
      <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr.js"></script>
      <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/respond.js"></script>
    <![endif]-->
</head>
<body <?php body_class(); ?>>
<!-- wrapper -->
<div class="wrapper container">

  <div class="header-top inner row">

    <nav class="col-md-6 header-top-nav">
      <?php wpeTopHeadNav(); ?>
    </nav><!-- header-top-nav -->
    <div class="col-md-6 header-top-contact">
      <a href="mailto:info@nord-energo.ru" class="mail">info@nord-energo.ru</a>
      <a href="tel:+74956661364" class="phone">+7 (495) <span>666-13-64</span></a>
    </div><!-- header-top-contact -->

  </div><!-- /.header-top -->

  <header role="banner">

    <div class="header-slider-container">
      <?php putRevSlider('homeslider', 'homepage'); ?>
    </div><!-- /.header-slider-container -->

    <div class="row inner header-inner">
      <div class="col-md-4">
        <div class="logo">
          <?php if ( is_front_page() && is_home() ){ } else { ?>
            <a href="<?php echo home_url(); ?>">
              <?php  } ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php wp_title( '' ); ?>" title="<?php wp_title( '' ); ?>" class="logo-img">
              <?php if ( is_front_page() && is_home() ){
              } else { ?>
            </a>
          <?php } ?>
        </div><!-- /logo -->
      </div><!-- /.col-md-4 -->

      <nav class="nav col-offset-md-3 col-md-5" role="navigation">
        <?php wpeHeadNav(); ?>
      </nav><!-- /nav -->
    </div><!-- header-inner -->

  </header><!-- /header -->

  <section role="main">
