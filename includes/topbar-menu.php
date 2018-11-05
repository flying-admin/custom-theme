<?php
  if(has_nav_menu('topbar-menu')){
    wp_nav_menu(array(
      'theme_location' => 'topbar-menu',
      'menu_class' => 'aux-menu',
      'menu_id' => '',
      'container' => 'div',
      'container_class' => 'aux-menu--wrapper',
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
