<!-- ========================================================FOOTER=================================================== -->
<footer class="footer">
		<div class="footer_info content_block">
			<?php	$first_row = get_field('text_group', 'option');	?>
			<h2 class="footer_info_heading"><?php echo  $first_row['block_heading']; ?></h2>
			<div class="footer_info_content">
				<?php echo  $first_row['block_content']; ?>
			</div>
			<div class="footer_info_link"><a href=""><?php echo  $first_row['button_name']; ?></a></div>			
		</div>
		<hr class="footer_line">
		<div class="footer_form_wraper">
			<h3 class="footer_form_heading"><?php the_field('footer_form_heading','option'); ?></h3>
			<div class="footer_form_item">
				<?php echo do_shortcode('[contact-form-7 id="128" title="Footer subsribe"]'); ?>	
			</div>			
		</div>
		<div class="footer_contakt">
			<?php $contact_row = get_field('footer_contact_row', 'option'); ?> 
			<div class="footer_contakt_item contakt_item_mail"><a href="mailto:<?php echo $contact_row['mail_adress']; ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/main-img/mail.svg"><span><?php echo $contact_row['mail_adress']; ?></span></a></div>
			<div class="footer_contakt_item contakt_item_phone"><a href="tel:<?php echo $contact_row['phone_number']; ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/main-img/phone.svg"><span><?php echo $contact_row['phone_number']; ?></span></a></div>
			<div class="footer_contakt_item contakt_item_skype"><a href="skype:<?php echo $contact_row['skype_address']; ?>?call"><img src="<?php echo get_template_directory_uri(); ?>/img/main-img/skype.svg"><span><?php echo $contact_row['skype_address']; ?></span></a></div>
			<div class="footer_contakt_item contakt_item_viber"><a href="viber://chat?number=<?php echo $contact_row['viber_number']; ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/main-img/viber.svg"><span><?php echo $contact_row['viber_number']; ?></span></a></div>			
		</div>
		<hr class="footer_line">
		<div class="footer_legal_info content_block">
			<?php	$second_row = get_field('footer_under_contact', 'option');	?>
			<h3 class="footer_legal_heading"><?php echo  $second_row['block_heading']; ?></h3>
			<div class="footer_legal_content">
				<?php echo  $second_row['block_content']; ?>
			</div>			
		</div>
		<div class="footer_navigation">
				<div class="footer_navigation_wraper content_block">
		<!-- ===============================================MENU==================================== -->
			
			<div class="footerMenu">
				<?php	wp_nav_menu( array(
					'theme_location'  => 'main_menu',
					'menu'            => 'Main menu', 
					'container'       => 'false', 
					'menu_class'      => 'header_main', 
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
					'depth'           => 0,
				) );?>
			</div>
		
		<!-- ============================================HEADER LOGO================================== -->
			<div class="header_logo">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php the_field('company_logo', 'option'); ?>">
				</a>				
			</div>
		<!-- ==========================================SOCIAL========================================= -->
			<div class="footer_social">
				<a class="header_social-link" href="<?php the_field('facebook_link', 'option'); ?>">
					<svg class="social_img" version="1.1" id="Facebook" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="35px" height="35px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve"><path class="social_main_side" d="M57,36.9c3.5,0,7.2-0.1,10.7,0.1 c-0.1,3.7,0,7.6-0.1,11.3c-3.5,0-7.1,0-10.6,0c0,11.7,0,23.3,0,35c-5,0-10,0-15,0c0-11.7,0-23.3,0-35c-3.1-0.1-6.4,0-9.6-0.1c0-3.8,0-7.6,0-11.4c3.2,0,6.4,0,9.5,0c0.1-3,0-5.7,0.2-8.1s1-4.4,2.1-6.1c2.2-3.2,5.8-5.8,10.7-6c4-0.2,8.5,0.1,12.8,0.1c0,3.8,0.1,7.7-0.1,11.4c-2.1,0.1-4.3-0.2-6.1,0c-1.9,0.2-3.3,1.3-3.9,2.7C56.7,32.5,57,34.6,57,36.9z"></path></svg>
				</a>
				<a class="header_social-link" href="<?php the_field('youtube_link','option'); ?>">
					<svg class="social_img" version="1.1" id="YouTube" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="35px" height="35px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve"><g class="social_main_side">
						<path d=" M55.4,32.9c0-3.3,0-6.4,0-9.2c1-0.1,2.3-0.1,3.3,0 c0,2.2,0,4.5,0,6.9s-0.2,4.9,0,7c0.2,1.2,1.1,1.1,1.9,0.5c0.3-0.2,0.8-0.6,0.9-0.9c0.1-0.4,0-1.2,0-1.7c0-3.7,0-8.1,0-11.7c1-0.1,2.3-0.1,3.3,0c0,5.9,0,11.8,0,17.7c-1,0.1-2.3,0.1-3.3,0c0-0.6,0-1.2,0-1.8c-0.8,0.9-3.4,3.2-5.2,1.7  C54.9,40.1,55.4,35.5,55.4,32.9z M47.2,23.2c2.4-0.2,4,0.7,4.8,2.1c0.9,1.5,0.6,4.9,0.6,7.1s0.2,5.7-0.5,7.2c-1.1,2.1-4.6,3.1-6.9,1.6c-1.2-0.7-2-2.1-2.1-3.6c-0.2-1.6,0-3.5,0-5.3c0-2.7-0.3-5.4,0.5-6.9C44.2,24.3,45.4,23.4,47.2,23.2z   M30.7,17.4c1.1-0.1,2.5,0,3.7,0c0.8,2.8,1.5,5.7,2.2,8.5c0.1,0.4,0.1,0.8,0.4,1.1c0.3-0.3,0.3-0.8,0.4-1.1     c0.7-2.8,1.4-5.8,2.1-8.5c1.2,0,2.4,0,3.7,0c-1.1,4-2.5,8.2-3.7,12.3c-0.2,0.6-0.5,1.2-0.5,1.8c-0.1,0.8,0,1.7,0,2.5c0,2.6,0,5,0,7.5c-1.2,0-2.5,0.1-3.7,0c0-1.6,0-3.2,0-4.7c0-1.6,0.2-3.2,0-4.7c-0.1-0.6-0.4-1.2-0.5-1.8C33.3,25.9,32.1,21.5,30.7,17.4L30.7,17.4z M77,73.9c0,4.9-3.9,8.8-8.8,8.8H31.7c-4.9,0-8.8-3.9-8.8-8.8V55c0-4.9,3.9-8.8,8.8-8.8     h36.5c4.9,0,8.8,3.9,8.8,8.8V73.9z     M38.4,55.5c0-1.3,0-2.5,0-3.8c-3.8,0-7.6,0-11.3,0c-0.1,0,0,0.1,0,0.1c0,1.2,0,2.4,0,3.6c1.3,0,2.7-0.1,3.8,0c0,6.8,0,13.7,0,20.5c1.2,0,2.5,0,3.7,0c0-6.8-0.1-13.8,0-20.6C35.9,55.5,37.1,55.5,38.4,55.5zM44.5,69.7c0,0.6,0.1,1.3,0,1.7c-0.1,0.5-1.4,1.5-2.1,1.4c-1-0.1-0.7-2.1-0.7-3.2c0-4,0-7.8,0-11.7c-1.1,0-2.2,0-3.2,0 c-0.1,0,0,0.1,0,0.1c0,3.9,0,9,0,13.3c0,1.6-0.1,3.1,0.5,3.9c1.2,1.8,4,0.3,4.9-0.6c0.2-0.2,0.4-0.5,0.7-0.6c0,0.6,0,1.3,0,1.9c1.1,0,2.2,0,3.3,0c0-6,0-12,0-18c-1.1,0-2.2,0-3.3,0C44.5,61.7,44.5,66,44.5,69.7zM60.5,67.4c0-2.1,0.1-4.2,0-5.6c-0.1-1.5-0.5-2.8-1.3-3.4c-1.1-0.9-2.8-0.7-3.8,0c-0.4,0.3-0.7,0.7-1.1,0.9c0-2.5,0-5.1,0-7.6c-1.1,0-2.2,0-3.3,0c-0.1,0,0,0.1,0,0.1c0,8.1,0,16.1,0,24.2c1.1,0,2.2,0,3.3,0c0-0.4,0-0.9,0-1.3  c0.9,1.1,2.9,2,4.6,1.2c0.9-0.5,1.5-1.6,1.6-2.9C60.6,71.4,60.5,69.4,60.5,67.4z M56.6,73.4c-0.8,0.5-1.7-0.2-2.2-0.7c0-2.4,0-5.5,0-8.2c0-0.9-0.2-2.1,0-2.7c0.2-0.6,1.3-1.1,2.1-0.6c1.1,0.6,0.6,4.4,0.6,6.1c0,1.1,0,2.2,0,3.4   C57.1,71.7,57.2,73,56.6,73.4zM72.7,69.4c-1.1,0-2.3,0-3.4,0c-0.1,1.3,0.3,3.2-0.6,3.8c-0.3,0.2-1,0.4-1.6,0.1c-1.4-0.6-0.5-3.9-0.8-5.7 c2.1,0,4.2,0,6.3,0c-0.1-2.5,0.2-4.9-0.2-6.9c-0.5-2-2.2-3.3-4.8-3.2c-2.4,0.1-4.3,1.8-4.6,3.9c-0.3,2.1-0.1,5.3-0.1,8.1    c0,3,0.3,5,2,6.2c1.4,1,4,1.1,5.7,0.1C72.4,74.8,72.8,72.6,72.7,69.4z M66.7,61.4c0.4-0.6,1.5-0.6,2.1-0.2c0.8,0.6,0.5,2.2,0.6,3.4c-1,0-2,0-2.9,0C66.4,63.4,66.2,62.1,66.7,61.4z"></path></g></svg>
				</a>
				<a class="header_social-link" href="<?php the_field('instagram_link','option'); ?>">
					<svg class="social_img" version="1.1" id="Instagram" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="35px" height="35px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve"><g class="social_main_side"> <path d=" M78.1,65.2c0,3.8-0.7,6.7-2.7,9c-1.8,2-4.2,3.7-7.6,4  c-5.6,0.4-11.6,0-17.6,0c-5.7,0-11.8,0.4-17.6,0c-5.7-0.4-10.1-4.6-10.5-10.5c-0.6-7.8,0.4-17,0-25.4c0-0.2,0.1-0.4,0.3-0.4c5.3,0,10.5,0,15.8,0c0.5,0.3-0.4,1-0.7,1.5c-1.1,2-1.9,5-1.6,8.3c0.4,6.6,6,12.3,13.1,12.8c5.2,0.4,9.4-2.1,12-5.3  c2.4-2.9,4.4-8,2.6-13.4c-0.2-0.7-0.6-1.4-1-2c-0.3-0.6-0.8-1.2-0.8-1.9c5.4,0,10.7,0,16.1,0C78.2,50.1,78.1,57.6,78.1,65.2z     M39,50.5c-0.1-3.6,1.6-6.5,3.3-8.2s3.8-2.8,7.1-3c6.1-0.4,11.1,3.9,11.7,9.5c0.6,6.2-3.7,11.7-9.3,12.4c-1,0.1-2.4,0.1-3.4,0 C43.5,60.7,39.1,56.2,39,50.5z M78.1,40.3c-4.5,0-8.6,0-13.2,0c-1.4,0-3.1,0.3-4.4,0c-0.8-0.2-1.2-1-1.9-1.5c-2.2-1.6-5.6-3-9.8-2.7c-3.1,0.2-5.2,1.3-7.2,2.9c-0.5,0.4-1.3,1.2-1.9,1.4c-1.2,0.3-3,0-4.5,0c-4.3,0-8.5,0-13.1,0c0.2-3.3-0.4-6.5,0.1-9.3c0.6-3.3,2.6-5.6,4.6-7c0,3.9,0,11.7,0,11.7H29c0,0-0.2-9,0.1-13.1c0.3-0.3,1-0.2,1.4-0.5  c0.3,4.2,0.3,13.6,0.3,13.6H33c0,0,0-9,0-13.5c0-0.2,0-0.4,0.1-0.4c0.5,0,0.9,0,1.4,0c0,4.6,0,13.9,0,13.9h2.3c0,0,0-9.3,0-13.9c9.4,0.5,21.5-0.6,30.7,0c3.6,0.2,6.6,2,8.3,4.2C78.3,29.3,78.2,34,78.1,40.3z M71.3,26.6H65c-0.9,0-1.6,0.7-1.6,1.6v6.3c0,0.9,0.7,1.6,1.6,1.6h6.3c0.9,0,1.6-0.7,1.6-1.6v-6.3C73,27.3,72.2,26.6,71.3,26.6zM50.1,58.4c4.1,0,7.8-3.4,8-7.6c0.3-5.6-4.5-9.1-9.3-8.5c-3.5,0.5-6.1,2.9-6.8,6.4C40.9,54.2,45.6,58.4,50.1,58.4z"></path></g></svg>
				</a>
				<?php $regLnk = get_field('register_page', 'option'); ?>
				
				<?php if (!is_user_logged_in()) { ?>
					<a class="header_login_link" href="<?php echo $regLnk; ?>">Login</a>
				<?php } ?>
				<?php if (is_user_logged_in()) { ?>
					<a class="footer_link_account" href="<?php echo home_url();?>/profile/">My Account</a>
				<?php } ?>
				
			</div>			
		</div>
		</div>

		
	</footer>
	
<?php wp_footer(); ?>
</body>
</html>