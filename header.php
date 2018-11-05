<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

    <?php if(get_option('custom_head_scripts') != ''){
      echo get_option('custom_head_scripts');
    } ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/FlyingPigsIE/style.css">
    <script src="<?php echo get_site_url(); ?>/wp-content/themes/FlyingPigsIE/scripts.js"></script>

    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

    <header class="header">

      <div class="header__top">
        <div class="header__top--inner">

          <div class="header__top--left">

            <?php dynamic_sidebar('sidebar-header-left'); ?>

            <?php include(TEMPLATEPATH . '/includes/lang-menu.php'); ?>

          </div>
          <div class="header__top--right">

            <?php include(TEMPLATEPATH . '/includes/topbar-menu.php'); ?>

            <?php dynamic_sidebar('sidebar-header-right'); ?>

          </div>

        </div>
      </div>

      <div class="header__main">
        <div class="header__main--inner">

          <div class="main-logo--wrapper">
            <a href="<?php if(get_option('is_single_page')){ echo '#'; } else { echo get_home_url(); } ?>" class="main-logo">
              <?php if(get_option('logo_positive')): ?>
                <img src="<?php echo get_option('logo_positive'); ?>" alt="" class="main-logo--image main-logo--positive">
              <?php else: ?>
                <img src="<?php echo get_site_url(); ?>/wp-content/themes/FlyingPigsIE/logos/logo-ie-positive.png" alt="" class="main-logo--image main-logo--positive">
              <?php endif; ?>
              <?php if(get_option('logo_negative')): ?>
                <img src="<?php echo get_option('logo_negative'); ?>" alt="" class="main-logo--image main-logo--negative">
              <?php else: ?>
                <img src="<?php echo get_site_url(); ?>/wp-content/themes/FlyingPigsIE/logos/logo-ie-negative.png" alt="" class="main-logo--image main-logo--negative">
              <?php endif; ?>
            </a>
          </div>

          <div class="header__main__content">

            <?php include(TEMPLATEPATH . '/includes/header-menu.php'); ?>

            <div class="main-cta--wrapper">
              <?php dynamic_sidebar('sidebar-header-cta'); ?>
            </div>
          </div>

          <button type="button" class="header__offcanvas__open" data-toggle="header__offcanvas--expanded" data-target=".header__offcanvas--wrapper">
            <span></span>
            <span></span>
            <span></span>
          </button>

        </div>
      </div>

      <div class="header__offcanvas--wrapper">
        <div class="header__offcanvas">

          <button type="button" class="header__offcanvas__close" data-toggle="header__offcanvas--expanded" data-target=".header__offcanvas--wrapper">
            <span></span>
            <span></span>
          </button>

          <div class="header__offcanvas__content">

            <div class="main-cta--wrapper">
              <?php dynamic_sidebar('sidebar-header-cta'); ?>
            </div>

            <?php include(TEMPLATEPATH . '/includes/header-menu.php'); ?>

            <?php include(TEMPLATEPATH . '/includes/topbar-menu.php'); ?>

            <?php dynamic_sidebar('sidebar-header-left'); ?>

            <?php include(TEMPLATEPATH . '/includes/lang-menu.php'); ?>

          </div>

        </div>

      </div>

    </header>
