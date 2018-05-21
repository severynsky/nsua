<?php
/*
Template Name: Static page
*/
?>
<?php get_header(); ?>

<section class="company_page" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');">
	<div class="company_page_wrap content_block">
		<div class="company_page_content">
			<h1 class="company_page_heading"><?php the_title(); ?></h1>

			<div class="company_page_tab_content">
				<a class="link_static_page" href="<?php the_field('link_to_page'); ?>"><h4 class="company_page_tab_name static_page_subheading"><span id="company_page_tab1" class="company_page_tab_heading"><img src="<?php the_field('icon_image'); ?>"><?php the_field('name_page'); ?></span></h4></a>
					<div class="static_content_wrap">
						<?php
							if (have_posts()):
							  while (have_posts()) : the_post();
							    the_content();
							  endwhile;
							else:					 
							endif;	
						?>
					</div>
			</div>
		</div>
		<div class="company_page_link">

			<!-- <a href=""><h4 class="company_page_link_item">terms and conditions</h4></a>
			<a href=""><h4 class="company_page_link_item">privacy policy</h4></a>
			<a href=""><h4 class="company_page_link_item">cookies policy</h4></a> -->
		</div>
		
	</div>
	
</section>



<?php get_footer(); ?>