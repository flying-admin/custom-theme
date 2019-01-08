<?php get_header(); ?>

<div class="blog-wrapper blog-wrapper--search">

  <div class="blog-topbar">
    <ul class="blog-topbar__breadcrumbs">
      <li><a href="<?php echo get_home_url(); ?>">Inicio</a></li>
      <li><?php echo get_the_title(get_option('page_for_posts')); ?></li>
    </ul>
  </div>

  <div class="blog-header">
    <h1 class="blog-header__title">
      <?php echo get_the_title(get_option('page_for_posts')); ?>
    </h1>
    <div class="blog-header__search">
      <?php get_search_form(); ?>
    </div>
  </div>

  <?php if(have_posts()): ?>

    <div class="blog-content">

      <?php while(have_posts()): the_post(); ?>
        <?php if ($post->post_type == 'page'){ continue; } ?>

        <!-- <?php the_content(); ?> -->
        <!-- <?php the_excerpt(); ?> -->
        <!-- <?php the_time(); ?> -->
        <?php $featuredImg = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'full')[0]; ?>
        <?php if ($featuredImg): ?>
          <div class="blog-content__post blog-content__post--image">
            <div class="blog-content__post--inner" style="background-image: url(<?php echo $featuredImg; ?>)">
        <?php else: ?>
          <div class="blog-content__post">
            <div class="blog-content__post--inner">
        <?php endif; ?>
            <p class="blog-content__post__title">
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
            </p>
            <p class="blog-content__post__date">
              <?php the_time(get_option('date_format')); ?>
            </p>
            <p class="blog-content__post__category">
              <?php the_category(', '); ?>
            </p>
          </div>
        </div>

      <?php endwhile; ?>

    </div>

    <div class="blog-pagination">
      <?php echo paginate_links([
        'prev_text' => '&lsaquo;',
        'next_text' => '&rsaquo;',
        'before_page_number' => '<span>',
      	'after_page_number'  => '</span>'
      ]); ?>
    </div>

  <?php else: ?>

    <div class="blog-content">
      <h4 style="padding-left: 20px;">No hay entradas del blog que coincidan con la busqueda.</h4>
      <br /><br /><br /><br /><br />
    </div>

  <?php endif; ?>

</div>
<?php get_footer(); ?>
