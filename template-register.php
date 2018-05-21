<?php
/*
*Template Name: Register tour
*/
?>
<?php 
if(is_user_logged_in()){
	
wp_redirect( home_url().'/profile/' ); 
exit;
}
?>
<?php get_header('register'); ?>
	<section class="register_page" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">

		<div class="register_page_wraper">
			<div class="register_back" onclick="window.history.back();" >
				<span class="register_arrow">
					<svg width="12" height="19" viewBox="0 0 12 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path transform="matrix(-1 0 0 1 12 0)" fill="#FFFFFF" d="M 2.27027 0L 9.70352e-08 2.21667L 7.45946 9.5L 9.70352e-08 16.7833L 2.27027 19L 12 9.5L 2.27027 0Z"/></svg>
				</span> Go Back</div>
			<div class="register_logo"><a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/blue_logo.svg"></a></div>
			<?php echo do_shortcode('[woocommerce_my_account]') ?>
		</div>	
	</section>
<?php get_footer('register'); ?>