<?php
  if(has_nav_menu('footer-menu')){
    wp_nav_menu(array(
      'theme_location' => 'footer-menu',
      'menu_class' => 'footer-menu',
      'menu_id' => '',
      'container' => 'div',
      'container_class' => 'footer-menu--wrapper',
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
