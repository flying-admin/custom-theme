<?php get_header(); ?>
<div class="post-wrapper">

  <?php if(have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>

      <div class="post-topbar">
        <ul class="post-topbar__breadcrumbs">
          <li><a href="<?php echo get_home_url(); ?>"><?php echo __('Home', 'custom-widgets'); ?></a></li>
          <li><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php echo get_the_title(get_option('page_for_posts')); ?></a></li>
          <li><?php the_title(); ?></li>
        </ul>
        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="post-topbar__back"><?php echo __('Go back', 'custom-widgets'); ?></a>
      </div>

      <!-- <?php the_permalink(); ?> -->
      <!-- <?php the_excerpt(); ?> -->
      <!-- <?php the_time(); ?> -->

      <div class="post-content">

        <div class="post-content__header">
          <h1 class="post-content__header__title">
            <?php the_title(); ?>
          </h1>
          <div class="post-content__header__sub">
            <p class="post-content__header__sub__info">
              <span><?php the_time(get_option('date_format')); ?></span>
              <span><?php the_category(', '); ?></span>
            </p>
            <ul class="post-content__header__sub__share">
              <li><a href="https://twitter.com/home?status=<?php echo home_url( $wp->request ); ?>" class="share-twitter">tweet</a></li>
              <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url( $wp->request ); ?>" class="share-facebook">share</a></li>
              <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo home_url( $wp->request ); ?>&title=&summary=&source=" class="share-linkedin">share</a></li>
            </ul>
          </div>
        </div>

        <div class="post-content__image">
          <?php if (has_post_thumbnail()){ the_post_thumbnail(); } ?>
        </div>

        <div class="post-content__content">
          <?php the_content(); ?>
        </div>

      </div>

    <?php endwhile; ?>

    <!-- <div class="post-nav">
      <?php the_post_navigation(
        array(
          'next_text' => '<span>' . __( 'Next', 'twentyfifteen' ) . ': %title</span> ',
          'prev_text' => '<span>' . __( 'Previous', 'twentyfifteen' ) . ': %title</span> ',
        )
      ); ?>
    </div> -->

  <?php else: ?>

    <div class="post-search">
      <h3><?php echo __('What are you looking for?', 'custom-widgets'); ?></h3>
      <?php get_search_form(); ?>
    </div>

  <?php endif; ?>

</div>
<?php get_footer(); ?>
