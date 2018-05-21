<?php get_header(); ?>
<!-- ==========================single=============== -->
	<div class="default_template_background" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
   <div class="content_block default_template_header">
	    <h1><?php the_title(); ?></h1>
    </div>

      <div class="content_block">
        <?php the_content(); ?>
    </div>

<?php get_footer(); ?>