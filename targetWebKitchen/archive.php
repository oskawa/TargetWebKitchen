<?php get_header(); ?>
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			
		<?php endwhile; wp_reset_postdata(); ?>
	<?php endif; ?>
<?php get_footer(); ?>