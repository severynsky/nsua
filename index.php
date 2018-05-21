<?php get_header(); ?>
<!-- ==========================index=============== -->
	<div class="default_template_background" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
   <div class="content_block default_template_header">
	    <h1><?php the_title(); ?></h1>
    </div>

      <div class="content_block">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="archive_post">
                    <h2><?php the_title(); ?></h2>
	                <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="button is_bigger is_dark">Learn More</a>
                </div>
        <?php endwhile; endif; ?>
    </div>

<?php get_footer(); ?>