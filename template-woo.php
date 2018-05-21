<?php
/*
*Template Name: woo page
*/
?>
<?php 
?>
<?php get_header('register'); ?>
	<section class="register_page" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
		<div style="width: 90%; background-color: #fff; color:#000; margin:0 auto;" ">
			<div class="register_logo"><img src="<?php echo get_template_directory_uri(); ?>/img/blue_logo.svg"></div>
			<?php echo do_shortcode('[woocommerce_my_account]') ?>
		</div>	
	</section>
<?php get_footer('register'); ?>