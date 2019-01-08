<?php

function fp_register_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('topbar-menu',__( 'Topbar Menu' ));
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
  register_nav_menu('lang-menu',__( 'Lang Menu' ));
}
add_action( 'init', 'fp_register_menu' );

add_theme_support( 'post-thumbnails' );

/* ----- ONLY FOR SPA ----- */
function new_spa_menu_items($items, $args) {

  if( get_option('is_single_page') && $args->theme_location == 'header-menu' ){

    $myItems = wp_get_nav_menu_items($args->menu);
    foreach ($myItems as $item) {
      if ($item->post_parent){
        $auxUrl = str_replace(get_site_url().'/','#post-', $item->url);
        $auxUrl = str_replace('#post-home/','#post-', $auxUrl);
        $auxUrl = str_replace('#post-inicio/','#post-', $auxUrl);
        $auxUrl = str_replace('/','', $auxUrl);
        $auxUrl = str_replace('#post-',get_site_url().'#post-', $auxUrl);

        $items = str_replace($item->url, $auxUrl, $items);
      }
    }

    return $items;
  }
  else{
    return $items;
  }
}
add_filter('wp_nav_menu_items', 'new_spa_menu_items', 10, 3);
/* ----- ONLY FOR SPA ----- */

function my_register_additional_customizer_settings( $wp_customize ) {

  $section = $wp_customize->get_section( 'fpie_theme' );
  if (!$section){
    $wp_customize->add_section(
      'fpie_theme',
      array(
        'title' => 'Ajustes del tema',
        'priority' => 1
      )
    );
  }

  $wp_customize->add_setting(
    'logo_positive',
    array(
      'default' => '',
      'type' => 'option',
      'capability' => 'edit_theme_options'
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'logo_positive',
      array(
        'label' => 'Logo del site (Positivo)',
        'section' => 'title_tagline',
      )
    )
  );

  $wp_customize->add_setting(
    'logo_negative',
    array(
      'default' => '',
      'type' => 'option',
      'capability' => 'edit_theme_options'
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'logo_negative',
      array(
        'label' => 'Logo del site (Negativo)',
        'section' => 'title_tagline',
      )
    )
  );

  $wp_customize->add_setting(
    'is_single_page',
    array(
      'default' => false,
      'type' => 'option',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_checkbox'
    )
  );
  $wp_customize->add_control(
    'is_single_page',
    array(
      'type' => 'checkbox',
      'label' => 'El site es Single Page',
      'description' => 'Marcar la casilla si el site es Single Page',
      'section' => 'fpie_theme'
    )
  );

  $wp_customize->add_setting(
    'is_sticky_menu',
    array(
      'default' => false,
      'type' => 'option',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_checkbox'
    )
  );
  $wp_customize->add_control(
    'is_sticky_menu',
    array(
      'type' => 'checkbox',
      'label' => 'El header es Sticky',
      'description' => 'Marcar la casilla si el header es Sticky',
      'section' => 'fpie_theme'
    )
  );

  $wp_customize->add_setting(
    'is_simple_footer',
    array(
      'default' => false,
      'type' => 'option',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_checkbox'
    )
  );
  $wp_customize->add_control(
    'is_simple_footer',
    array(
      'type' => 'checkbox',
      'label' => 'El footer es Simplificado',
      'description' => 'Marcar la casilla si el footer es Simplificado',
      'section' => 'fpie_theme'
    )
  );

  $wp_customize->add_setting(
    'footer_copy_es',
    array(
      'default' => '',
      'type' => 'option',
      'capability' => 'edit_theme_options'
    )
  );
  $wp_customize->add_control(
    'footer_copy_es',
    array(
      'type' => 'text',
      'label' => 'Copyright del footer (Español)',
      'description' => 'Copyright para incluir en el footer en Español',
      'section' => 'title_tagline'
    )
  );

  $wp_customize->add_setting(
    'footer_copy_en',
    array(
      'default' => '',
      'type' => 'option',
      'capability' => 'edit_theme_options'
    )
  );
  $wp_customize->add_control(
    'footer_copy_en',
    array(
      'type' => 'text',
      'label' => 'Copyright del footer (Inglés)',
      'description' => 'Copyright para incluir en el footer en Inglés',
      'section' => 'title_tagline'
    )
  );

  $wp_customize->add_setting(
    'custom_head_scripts',
    array(
      'default' => '',
      'type' => 'option',
      'capability' => 'edit_theme_options'
    )
  );
  $wp_customize->add_control(
    'custom_head_scripts',
    array(
      'type' => 'textarea',
      'label' => 'Scripts del head',
      'description' => 'Scripts para introducir en el head',
      'section' => 'fpie_theme'
    )
  );

}
add_action( 'customize_register', 'my_register_additional_customizer_settings' );

function sanitize_checkbox( $checked ) {
  // Boolean check.
  return (( isset( $checked ) && $checked == true ) ? true : false );
}

function FlyingPigsIE_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Header Left', 'FlyingPigsIE' ),
    'id'            => 'sidebar-header-left',
    'before_widget' => '<div class="widget-wrapper"><div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar( array(
    'name'          => __( 'Header Right', 'FlyingPigsIE' ),
    'id'            => 'sidebar-header-right',
    'before_widget' => '<div class="widget-wrapper"><div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar( array(
    'name'          => __( 'Header CTA', 'FlyingPigsIE' ),
    'id'            => 'sidebar-header-cta',
    'before_widget' => '<div class="widget-wrapper"><div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar( array(
    'name'          => __( 'Footer', 'FlyingPigsIE' ),
    'id'            => 'sidebar-footer',
    'before_widget' => '<div class="widget-wrapper"><div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
}
add_action( 'widgets_init', 'FlyingPigsIE_widgets_init' );

function custom_classes( $classes ) {
  if(is_front_page()){
    $classes[] = 'front-page';
  }
  if(get_option('is_single_page')){
    $classes[] = 'single-page-site';
  }
  if(get_option('is_sticky_menu')){
    $classes[] = 'header--always-sticky';
  }
  if (is_page_template('fullwidth-solid.php') || is_page_template('contained-solid.php') || is_single() || is_home()){
    $classes[] = 'header--always-solid';
  }
  if(get_option('is_simple_footer')){
    $classes[] = 'footer--always-simple';
  }
  $classes[] = get_locale();

  return $classes;
}
add_filter( 'body_class', 'custom_classes' );

class Child_Wrap extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = array()){
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<div class=\"sub-menu-wrapper\"><ul class=\"sub-menu\">\n";
  }
  function end_lvl(&$output, $depth = 0, $args = array()){
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul></div>\n";
  }
}
