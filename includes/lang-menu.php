<?php
  if(has_nav_menu('lang-menu')){
    wp_nav_menu(array(
      'theme_location' => 'lang-menu',
      'menu_class' => 'lang-menu',
      'menu_id' => '',
      'container' => 'div',
      'container_class' => 'lang-menu--wrapper',
      'container_id' => '',
      'before' => '',
      'after' => '',
      'link_before' => '',
      'link_after' => '',
      'echo' => true,
      'depth' => 1
    ));
  }
?>
