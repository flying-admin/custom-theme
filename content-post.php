<!-- #post-<?php echo get_post(get_the_ID())->post_name; ?> -->
<section id="post-<?php echo get_post(get_the_ID())->post_name; ?>" <?php post_class(); ?> >
	<div class="section-post">

		<a href="<?php the_permalink(); ?>">
			<h3><?php the_title(); ?></h3>
		</a>
		<p><?php the_category(', '); ?></p>
		<p><?php the_time(); ?> - <?php the_time(get_option('date_format')); ?></p>
		<p><?php the_excerpt('Leer más'); ?></p>

	</div>
</section>
<!-- / #post-<?php echo get_post(get_the_ID())->post_name; ?> -->
