<?php
  if(has_nav_menu('header-menu')){
    wp_nav_menu(array(
      'theme_location' => 'header-menu',
      'menu_class' => 'main-menu',
      'menu_id' => '',
      'container' => 'div',
      'container_class' => 'main-menu--wrapper',
      'container_id' => '',
      'before' => '',
      'after' => '',
      'link_before' => '',
      'link_after' => '',
      'echo' => true,
      'depth' => 3,
      'walker' => new Child_Wrap()
    ));
  }
?>
