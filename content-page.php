<!-- #post-<?php echo get_post(get_the_ID())->post_name; ?> -->
<section id="post-<?php echo get_post(get_the_ID())->post_name; ?>" <?php post_class(); ?> >
	<div class="section-content">
		<?php
			the_content();
		?>
	</div>
</section>
<!-- / #post-<?php echo get_post(get_the_ID())->post_name; ?> -->
