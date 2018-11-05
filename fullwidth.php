<?php
  /*
  Template Name: Full Width
  */
?>
<?php get_header(); ?>
  <main class="site-content">
    <div class="container-fluid">
      <?php
        $page = get_post();
        $query = new WP_Query();
        $all_pages = $query->query(array('post_type' => 'page', 'posts_per_page' => '-1', 'orderby'=>'menu_order', 'order' => 'ASC'));
        $children = get_page_children($page->ID, $all_pages);
        $items = [$page];

        if( get_option('is_single_page') && is_array($children) &! empty($children)){
          $items = array_merge([$page],$children);
        }

        foreach($items as $post){
          setup_postdata($post);
          get_template_part("content", "page");
        }
      ?>
    </div>
  </main>
<?php get_footer(); ?>
