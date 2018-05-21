<?php get_header(); ?>
<!-- ==========================page=============== -->
	<div class="default_template_background" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
   <div class="content_block default_template_header">
	    <h1><?php the_title(); ?></h1>
    </div>

      <div class="default_page_content content_block">

      	<?php
			if (have_posts()):
			  while (have_posts()) : the_post();
			    the_content();
			  endwhile;
			else:
			  echo '<p>Sorry, no posts matched your criteria.</p>';
			endif;	
		?>
       
    </div>

<?php get_footer(); ?>