    <footer class="footer">
      <div class="footer__top">

        <?php if(!get_option('is_simple_footer')): ?>
          <?php include(TEMPLATEPATH . '/includes/footer-menu.php'); ?>
        <?php endif; ?>

      </div>
      <div class="footer__bottom">

        <div class="footer__bottom--aux">
          <?php if(get_option('is_simple_footer')): ?>
            <?php include(TEMPLATEPATH . '/includes/footer-menu.php'); ?>
          <?php endif; ?>

          <div class="footer-widgets">
            <?php dynamic_sidebar('sidebar-footer'); ?>
          </div>

          <div class="footer-copy">
            <?php if(substr(get_bloginfo('language'), 0, 2) == 'es' && get_option('footer_copy_es') != ''): ?>
              <p><?php echo get_option('footer_copy_es'); ?></p>
            <?php elseif(substr(get_bloginfo('language'), 0, 2) != 'es' && get_option('footer_copy_en') != ''): ?>
              <p><?php echo get_option('footer_copy_en'); ?></p>
            <?php endif; ?>
          </div>
        </div>

        <div class="footer-logo--wrapper">
          <a href="<?php if(get_option('is_single_page')){ echo '#'; } else { echo get_home_url(); } ?>" class="footer-logo">
            <?php if(get_option('logo_negative')): ?>
              <img src="<?php echo get_option('logo_negative'); ?>" alt="" class="footer-logo--image">
            <?php else: ?>
              <img src="<?php echo get_site_url(); ?>/wp-content/themes/FlyingPigsIE/logos/logo-ie-negative.png" alt="" class="footer-logo--image">
            <?php endif; ?>
          </a>
        </div>

      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
