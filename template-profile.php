<?php
/*
*Template Name: Profile page
*/
?>
<?php 
if(!is_user_logged_in()){

wp_redirect( home_url().'/register/' ); 
exit;
}?>
<?php get_header(); ?>
<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>


<section class="profile_page" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
	<div class="profile_messages" style="    position: fixed;   top: 0;   z-index: 9999; text-align: center;   left: 0;   right: 0;   margin: 0 auto;"></div>
	<div class="profile_page_wrap site_content">
		<div class="profile_heading_wrap">
			<div id="profile_wish" class="profile_tab"><svg width="25" height="23" class="profile_icon" viewBox="0 0 25 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<path class="profile_icon_fill"  d="M 12.5 23C 12.2646 23 12.04 22.9035 11.8799 22.7336L 1.88836 12.1296C 1.88579 12.1268 1.88322 12.1241 1.88072 12.1214C 0.667886 10.7991 0 9.0467 0 7.18699C 0 5.32721 0.667886 3.57491 1.88072 2.25266L 2.03255 2.08717C 3.2671 0.741271 4.91546 -2.1349e-08 6.67405 -2.1349e-08C 8.43264 -2.1349e-08 10.0811 0.741271 11.3157 2.08723L 12.5 3.37843L 13.6842 2.0873C 14.9188 0.741338 16.5672 6.66307e-05 18.3258 6.66307e-05C 20.0845 6.66307e-05 21.7328 0.741338 22.9675 2.08737L 23.1191 2.25246C 24.3321 3.57504 25 5.32735 25 7.18705C 25 9.04676 24.332 10.7991 23.1193 12.1214C 23.1168 12.1242 23.1142 12.127 23.1116 12.1297L 13.12 22.7338C 12.9599 22.9034 12.7353 23 12.5 23ZM 3.13238 11.0009L 12.5 20.9426L 21.8675 11.0008C 23.7949 8.89526 23.7937 5.47292 21.8638 3.36897L 21.7123 3.20387C 20.8024 2.21175 19.5997 1.6655 18.3258 1.6655C 17.0519 1.6655 15.8492 2.21176 14.9395 3.20354L 13.1277 5.17897C 12.9674 5.3538 12.7393 5.45353 12.5001 5.45353C 12.2609 5.45353 12.0328 5.3538 11.8725 5.17897L 10.0606 3.20367C 9.1508 2.21182 7.94818 1.66556 6.67425 1.66556C 5.40033 1.66556 4.19764 2.21176 3.28794 3.2036L 3.13611 3.3691C 1.20627 5.47306 1.20498 8.89539 3.13238 11.0009Z"/></svg>
				<span>Wish List</span>
			</div>
			<div id="profile_paused"  class="profile_tab">
				<svg width="23" height="23" viewBox="0 0 23 23" class="profile_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<path class="profile_icon_fill" d="M 11.5001 0C 5.15844 0 0 5.1587 0 11.5001C 0 17.8418 5.15844 23 11.5001 23C 17.8416 23 23 17.8418 23 11.5001C 23 5.1587 17.8416 0 11.5001 0ZM 11.5001 20.9094C 6.31159 20.9094 2.0906 16.6887 2.0906 11.5001C 2.0906 6.31368 6.31159 2.09112 11.4999 2.09112C 16.6884 2.09112 20.9091 6.31368 20.9091 11.5001C 20.9094 16.6887 16.6887 20.9094 11.5001 20.9094ZM 8.36397 14.6371L 10.4546 14.6371L 10.4546 8.36292L 8.36397 8.36292L 8.36397 14.6371ZM 12.5454 14.6371L 14.6363 14.6371L 14.6363 8.36292L 12.5454 8.36292L 12.5454 14.6371Z"/></svg> 
				<span>Paused Orders</span>
			</div>
			<div id="profile_tours"  class="profile_tab"><svg width="18" height="23" class="profile_icon" viewBox="0 0 18 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<path class="profile_icon_fill"  transform="translate(4.8 4.94)" d="M 4.17072 -1.59025e-07C 1.87099 -1.59025e-07 2.73165e-07 1.91551 2.73165e-07 4.26996C 2.73165e-07 6.6244 1.87099 8.53992 4.17072 8.53992C 6.47044 8.53992 8.34144 6.6244 8.34144 4.26996C 8.34144 1.91551 6.47049 -1.59025e-07 4.17072 -1.59025e-07ZM 4.17072 6.74205C 2.83929 6.74205 1.75608 5.63307 1.75608 4.26996C 1.75608 2.90685 2.83929 1.79786 4.17072 1.79786C 5.50215 1.79786 6.58536 2.90685 6.58536 4.26996C 6.58536 5.63307 5.50215 6.74205 4.17072 6.74205Z"/>
				<path class="profile_icon_fill"  fill="#2B2A29" d="M 9 0C 4.03737 0 -7.36475e-08 4.13349 -7.36475e-08 9.21415L -7.36475e-08 9.46886C -7.36475e-08 12.0384 1.43893 15.0327 4.27695 18.3685C 6.33429 20.7867 8.36289 22.4729 8.44819 22.5435L 9 23L 9.55181 22.5435C 9.63715 22.4729 11.6658 20.7867 13.7231 18.3685C 16.561 15.0327 18 12.0384 18 9.4689L 18 9.2142C 18 4.13349 13.9626 0 9 0ZM 16.2439 9.4689C 16.2439 13.8113 10.7789 19.0678 9 20.6635C 7.22062 19.0673 1.75608 13.811 1.75608 9.4689L 1.75608 9.2142C 1.75608 5.12487 5.00571 1.79791 9 1.79791C 12.9943 1.79791 16.2439 5.12487 16.2439 9.2142L 16.2439 9.4689Z"/></svg>
				<span>My Tours</span>
			</div>
			<div id="profile_services"  class="profile_tab">
			<svg width="25" height="23" viewBox="0 0 25 23" class="profile_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<g id="Canvas" transform="translate(-14702 -5651)">
				<use xlink:href="#path0_fill"  class="profile_icon_fill"  transform="translate(14710.5 5651.82)" />
				<use xlink:href="#path1_fill" class="profile_icon_fill"  transform="translate(14710.5 5654.46)" />
				<use xlink:href="#path2_fill" class="profile_icon_fill" transform="translate(14710.5 5660.39)" />
				<use xlink:href="#path3_fill" class="profile_icon_fill" transform="translate(14710.5 5663.03)" />
				<use xlink:href="#path4_fill" class="profile_icon_fill" transform="translate(14710.5 5668.96)" />
				<use xlink:href="#path5_fill" class="profile_icon_fill" transform="translate(14710.5 5671.6)" />
				<use xlink:href="#path6_fill" class="profile_icon_fill" transform="translate(14702 5651)" />
				<use xlink:href="#path7_fill" class="profile_icon_fill" transform="translate(14702 5659.57)" />
				<use xlink:href="#path8_fill" class="profile_icon_fill" transform="translate(14702 5668.14)" />
				</g>
				<defs>
				<path id="path0_fill" d="M 16.4815 7.8972e-08L 0.0622927 7.8972e-08C 0.0311465 7.8972e-08 -3.16835e-07 0.0258775 -3.16835e-07 0.062106L -3.16835e-07 1.5216C -3.16835e-07 1.55265 0.0259555 1.58371 0.0622927 1.58371L 16.4815 1.58371C 16.5127 1.58371 16.5438 1.55783 16.5438 1.5216L 16.5438 0.062106C 16.5438 0.0258775 16.5179 7.8972e-08 16.4815 7.8972e-08Z"/>
				<path id="path1_fill" d="M 0.0622927 1.58371L 8.23816 1.58371C 8.26931 1.58371 8.30045 1.55783 8.30045 1.5216L 8.30045 0.062106C 8.30045 0.031053 8.2745 7.8972e-08 8.23816 7.8972e-08L 0.0622927 7.8972e-08C 0.0311465 7.8972e-08 -3.16835e-07 0.0258775 -3.16835e-07 0.062106L -3.16835e-07 1.5216C -3.16835e-07 1.55783 0.0259555 1.58371 0.0622927 1.58371Z"/>
				<path id="path2_fill" d="M 16.4815 0L 0.0622927 0C 0.0311465 0 -3.16835e-07 0.0258774 -3.16835e-07 0.062106L -3.16835e-07 1.5216C -3.16835e-07 1.55265 0.0259555 1.58371 0.0622927 1.58371L 16.4815 1.58371C 16.5127 1.58371 16.5438 1.55783 16.5438 1.5216L 16.5438 0.062106C 16.5438 0.0258774 16.5179 0 16.4815 0Z"/>
				<path id="path3_fill" d="M 0.0622927 1.58371L 8.23816 1.58371C 8.26931 1.58371 8.30045 1.55783 8.30045 1.5216L 8.30045 0.062106C 8.30045 0.0310529 8.2745 -2.94194e-15 8.23816 -2.94194e-15L 0.0622927 -2.94194e-15C 0.0311465 -2.94194e-15 -3.16835e-07 0.0258774 -3.16835e-07 0.062106L -3.16835e-07 1.5216C -3.16835e-07 1.55783 0.0259555 1.58371 0.0622927 1.58371Z"/>
				<path id="path4_fill" d="M 16.4815 3.15888e-07L 0.0622927 3.15888e-07C 0.0311465 3.15888e-07 -3.16835e-07 0.0258769 -3.16835e-07 0.0621055L -3.16835e-07 1.5216C -3.16835e-07 1.55265 0.0259555 1.58371 0.0622927 1.58371L 16.4815 1.58371C 16.5127 1.58371 16.5438 1.55783 16.5438 1.5216L 16.5438 0.0621055C 16.5438 0.0258769 16.5179 3.15888e-07 16.4815 3.15888e-07Z"/>
				<path id="path5_fill" d="M 8.23816 6.31776e-07L 0.0622927 6.31776e-07C 0.0311465 6.31776e-07 -3.16835e-07 0.0258772 -3.16835e-07 0.0621058L -3.16835e-07 1.5216C -3.16835e-07 1.55265 0.0259555 1.58371 0.0622927 1.58371L 8.23816 1.58371C 8.26931 1.58371 8.30045 1.55783 8.30045 1.5216L 8.30045 0.0621058C 8.29526 0.0258772 8.26931 6.31776e-07 8.23816 6.31776e-07Z"/>
				<path id="path6_fill" d="M 2.69414 3.12601L 1.37562 1.80108L 0 3.16741L 1.31852 4.48717L 2.68895 5.85868L 4.06458 4.49752L 7.21034 1.37151L 5.8451 1.9743e-08L 2.69414 3.12601Z"/>
				<path id="path7_fill" d="M 2.69414 3.12601L 1.37562 1.80108L 0 3.16741L 1.31852 4.48717L 2.68895 5.85868L 4.06458 4.49752L 7.21034 1.37151L 5.8451 -1.57944e-07L 2.69414 3.12601Z"/>
				<path id="path8_fill" d="M 2.69414 3.12601L 1.37562 1.80108L 0 3.16741L 1.31852 4.48717L 2.68895 5.85868L 4.06458 4.49234L 7.21034 1.37151L 5.8451 -6.31776e-07L 2.69414 3.12601Z"/>
				</defs>
				</svg>
				<span>My Services</span>
			</div>
			<div id="profile_info"  class="profile_tab active">
				<svg width="23" height="23" viewBox="0 0 23 23" class="profile_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<path class="profile_icon_fill"  d="M 15.525 14.1833C 17.7292 12.8416 19.1666 10.4458 19.1666 7.66668C 19.1667 3.45 15.7166 0 11.5 0C 7.28336 0 3.83332 3.45 3.83332 7.66668C 3.83332 10.4458 5.2708 12.8417 7.47496 14.1833C 3.64164 15.6208 0.766637 18.975 0 23L 1.91668 23C 2.875 18.5917 6.8042 15.3333 11.5 15.3333C 16.1958 15.3333 20.125 18.5916 21.0833 23L 23 23C 22.2334 18.8792 19.3584 15.525 15.525 14.1833ZM 5.75 7.66668C 5.75 4.5042 8.33752 1.91668 11.5 1.91668C 14.6625 1.91668 17.25 4.5042 17.25 7.66668C 17.25 10.8292 14.6625 13.4167 11.5 13.4167C 8.33752 13.4167 5.75 10.8292 5.75 7.66668Z"/></svg>
				<span>Personal Information</span>
			</div>				
		</div>
		<div class="profile_tab_name_mobile">Personal Information</div>
		<hr class="profile_horizontal" />
		<div class="profile_detail_wrap">
			<div class="">							
			
			<?php
			global $wpdb;
			$curUser = get_current_user_id();

			// ================Update user meta
			
			$user_name = get_user_meta( $curUser, 'billing_first_name', true );
			$user_lastname = get_user_meta( $curUser, 'billing_last_name', true );
			$user_mail = get_user_meta( $curUser, 'billing_email', true );
			$user_phone = get_user_meta( $curUser, 'billing_phone', true );
			$user_country = get_user_meta( $curUser, 'billing_state', true );
			$user_address = get_user_meta( $curUser, 'billing_address_1', true );
			$user_city = get_user_meta( $curUser, 'billing_city', true );
			$user_sex = get_user_meta( $curUser, 'billing_sex', true );
			$user_birthday1 = get_user_meta( $curUser, 'billing_date_birthday', true );
			$user_birthday2 = get_user_meta( $curUser, 'billing_month_birthday', true );
			$user_birthday3 = get_user_meta( $curUser, 'billing_year_birthday', true );
			$user_company = get_user_meta( $curUser, 'billing_company', true );
			$user_zip = get_user_meta( $curUser, 'billing_postcode', true );
			?>
			<div class="prof_bookmarks">
						Save your favorite objects on Next Stop and share them with friends. Lists help to find the right place and plan a trip with others. Create a bookmark. Popular bookmarks.
				</div>
			<form id="user_data_profile" action="" onsubmit="return false;"}>
				<div class="profile_content_tab profile_info active">
					<div class="profile_personal_info">
						<div class="profile_personal_left">
							<div class="order_tour_slide2_block">
								<h4 class="order_persons_info_sec_info">First Name*</h4>
								<input class="order_persons_info_sec_input order__data_firstname" value="<?php echo $user_name; ?>" type="text" name="name" placeholder="Bengamin">
							</div>
							<div class="order_tour_slide2_block">
									<h4 class="order_persons_info_sec_info">Last Name*</h4>
									<input class="order_persons_info_sec_input order__data_lastname" value="<?php echo $user_lastname; ?>" type="text" name="last_name" placeholder="Jons">		
							</div>
							<div class="order_tour_slide2_block">
									<h4 class="order_persons_info_sec_info">Phone Number*</h4>
									<input class="order_persons_info_sec_input order__data_phone" value="<?php echo $user_phone; ?>" type="phone" name="phone_number" placeholder="0 800 9876543">	
							</div>
							<div class="order_tour_slide2_block">
									<h4 class="order_persons_info_sec_info">Email*</h4>
									<input class="order_persons_info_sec_input order__data_mail" value="<?php echo htmlspecialchars_decode($user_mail); ?>" type="mail" name="email" placeholder="bengamin@mail.com">
							</div>
							<div class="order_tour_slide2_block">
									<h4 class="order_persons_info_sec_info order_persons_info_birthday">Date of Birth*</h4>
									<input class="order_persons_info_sec_input order_persons_birthday_day" value="<?php echo $user_birthday1; ?>" type="text" name="birthday_day" placeholder="Date">
									<input class="order_persons_info_sec_input order_persons_birthday_mounth" value="<?php echo $user_birthday2; ?>" type="text" name="birthday_mounth" placeholder="Month">
									<input class="order_persons_info_sec_input order_persons_birthday_year" value="<?php echo $user_birthday3; ?>" type="text" name="birthday_year" placeholder="Year">				
							</div>
							<div class="order_tour_slide2_block">
									<h4 class="order_persons_info_sec_info">Sex</h4>
									<input id="order_tour_male" class="order_tour_mail_check" <?php if(strtolower($user_sex) == 'male'){echo 'checked';} ?> type="radio" value="male" name="male">
									<label class="order_tour_label_radio" for="order_tour_male">Male</label>
									<input id="order_tour_female" class="order_tour_mail_check" <?php if(strtolower($user_sex) != 'male'){echo 'checked';} ?> type="radio" value="female" name="male">	
									<label class="order_tour_label_radio" for="order_tour_female">Female</label>					
							</div>

						</div>
						<div class="profile_personal_right">
							<div class="order_tour_slide2_block">
									<h4 class="order_persons_info_sec_info">Country*</h4>
									<input class="order_persons_info_sec_input order__data_country" value="<?php echo $user_country; ?>" type="text" name="country" placeholder="Country">		
							</div>
							<div class="order_tour_slide2_block">
									<h4 class="order_persons_info_sec_info">City*</h4>
									<input class="order_persons_info_sec_input order__data_city" value="<?php echo $user_city; ?>" type="text" name="city" placeholder="City">			
							</div>
							<div class="order_tour_slide2_block">
									<h4 class="order_persons_info_sec_info">Company Name*</h4>
									<input class="order_persons_info_sec_input order__data_company" type="text" value="<?php echo $user_company; ?>" name="company" placeholder="Company Name">	
							</div>
							<div class="order_tour_slide2_block">
									<h4 class="order_persons_info_sec_info">Street Address*</h4>
									<input class="order_persons_info_sec_input order__data_company" type="text" name="street_address" value="<?php echo htmlspecialchars_decode($user_address);  ?>" placeholder="124 Cumberland Street">
							</div>
							<div class="order_tour_slide2_block">
									<h4 class="order_persons_info_sec_info">Zip Code*</h4>
									<input class="order_persons_info_sec_input order__data_company" type="text" value="<?php echo $user_zip; ?>" name="zip" placeholder="M5R 1A6">
							</div>
						</div>	
						<div class="save_button"><button id="save_personal_data">Save</button></div>
					</div>

				</div>
			</form>			

				<!-- ====================================================================== -->
				<!-- =========================== SERVICES ================================= -->
				<!-- ====================================================================== -->
				<div class="profile_content_tab profile_services">
					<div class="profile_services_wrap">
				
						<div  class="profile_content_tab_wrap">
										<!-- slider -->
										<div class="swiper-container swiper_services profile_tour_services">
										    <div class="swiper-wrapper">
										<?php
											$request_order = get_posts( array(
										        'numberposts' => -1,
										        'meta_key'    => '_customer_user',
										        'meta_value'  => get_current_user_id(),
										        'post_type'   => wc_get_order_types(),
										        'post_status' => 'wc-services',
										    ) );
										?>
										<?php
											//var_dump($request_order);
											$services_item = 1;
											$services_count = 1;
											
										    foreach ($request_order as $post) {
										    	if($services_item%4 ==1){echo '<div class="swiper-slide"  data-hash="slide'. $services_count.'">'; }
										    	$order_req = wc_get_order( $post->ID );
										    	$order_url = $order_req->get_view_order_url();
										    	
										    	echo '<div class="list_tour_content_item"><div class="list_tour_item_name">	<h3 class="list_tour_item_parent_name">'. get_the_title($post->ID) .'</h3><h4 class="list_tour_item_child_name">-</h4></div><div class="list_tour_item_city_day"><span>-</span><span> | </span><span>-</span></div><div class="list_tour_item_price"> --</div><div class="list_tour_item_view_order"><a href="">	View/Order</a></div>	</div>';												

										    	if($services_item%4 == 0){$services_count++; echo '</div>'; }
										    	$services_item++;												
										    }
										    $services_item--;									
										?>
										<?php if($services_item%4 > 0 || $services_item < 4){echo '</div>'; }?>
										 </div> <!--  End Swiper wraper  -->
										    <!-- Add Pagination -->
										    <div class="wrap_pagination_pro">
										    	<div class="pagination_pro_prev services_prev" style="color:#098;">
										    		<svg width="27" height="27" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
														<path fill="none" stroke-width="3px" stroke="#007aff" d="M20,3l-10,11l10,11"/>
													</svg>
												</div>
										    	<div class="swiper-pagination profile_pagination"></div>
										    	<div class="pagination_pro_next services_next" style="color:#098;">
										    		<svg width="27" height="27" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="none" stroke-width="3px" stroke="#007aff" d="M10,3l10,11l-10,11"/>
										    		</svg>
										    	</div>
										    </div>							    	
									  									    
										  </div><!--  End Swiper slider -->

									</div><!-- end list_requeste_quote -->			
						</div>
				</div>
				<!-- ====================================================================== -->
				<!-- ======================================= MY TOURS ===================== -->
				<!-- ====================================================================== -->
				<div class="profile_content_tab profile_tours">
												
					 <div class="my_tours_wrap_content">
					 		<div class="list_tours">	
								<div class="list_tours_filter">
									<p id="request_order" class="list_tours_filter_item list_active">Requested for Quote</p>
									<p id="advanced_order" class="list_tours_filter_item">Advanced Orders</p>
									<p id="paid_order" class="list_tours_filter_item">Paid Orders</p>
									<p id="history_order" class="list_tours_filter_item">Purchase History</p>				
								</div>
								<div class="list_tour_content">
									<div class="mobile_tab_orders">Requested for Quote <img class="mobile_tab_orders_arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrowup.svg"></div>
									<div  class="list_requeste_quote active_contant request_order list_order_item">
										<!-- slider -->
										  <div class="swiper-container swiper_prof profile_requested">
										    <div class="swiper-wrapper">
										<?php
											$request_order = get_posts( array(
										        'numberposts' => -1,
										        'meta_key'    => '_customer_user',
										        'meta_value'  => get_current_user_id(),
										        'post_type'   => wc_get_order_types(),
										        'post_status' => 'wc-request',
										    ) );
										?>
										<?php
											$request_item = 1;
											$request_count = 1;
											
										    foreach ($request_order as $post) {
										    	$order_req = wc_get_order( $post->ID );
												$items = $order_req->get_items();
												
												foreach ( $items as $item ) {
													if($request_item%4 == 1){echo '<div class="swiper-slide"  data-hash="slide'.$request_count.'">'; }
												    $product_name = $item->get_name();
												    $product_id = $item->get_product_id();
												    $product_variation_id = $item->get_variation_id();
												    $product = new WC_Product_Variation($product_variation_id);
												    $parent_id = $product->parent->id;							 
												    $parent_meta = get_post_meta($parent_id);
												
												echo '<div class="list_tour_content_item"><div class="list_tour_item_name">	<h3 class="list_tour_item_parent_name">'. get_the_title($parent_id) .'</h3><h4 class="list_tour_item_child_name">'.$product->attributes['date-of-the-tour'] .'</h4></div><div class="list_tour_item_city_day"><span>'.get_field( "tour_tags_days", $parent_id ).'</span><span> | </span><span>'.get_field( "tour_tags_city", $parent_id ).'</span></div><div class="list_tour_item_price">'.$product->get_regular_price().' USD	</div><div class="list_tour_item_view_order"><a href="'.get_permalink($parent_id).'">	View/Order</a></div>	</div>';
												if($request_item%4 == 0){$request_count++; echo '</div>'; }
														$request_item++;					    	
												    
												}
										    }
										    $request_item--;
										?>
										<?php if($request_item%4 > 0  || $request_item < 4){echo '</div>'; } ?>
										 </div> <!--  End Swiper wraper  -->
										    <!-- Add Pagination -->
										    <div class="wrap_pagination_pro">
										    	<div class="pagination_pro_prev request_pro_prev" style="color:#098;">
										    		<svg width="27" height="27" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
														<path fill="none" stroke-width="3px" stroke="#007aff" d="M20,3l-10,11l10,11"/>
													</svg>
												</div>
										    	<div class="swiper-pagination profile_pagination"></div>
										    	<div class="pagination_pro_next request_pro_next" style="color:#098;">
										    		<svg width="27" height="27" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="none" stroke-width="3px" stroke="#007aff" d="M10,3l10,11l-10,11"/>
										    		</svg>
										    	</div>
										    </div>							    	
									  									    
										  </div><!--  End Swiper slider -->

									</div><!-- end list_requeste_quote -->

									<div class="mobile_tab_orders">Advanced Orders <img class="mobile_tab_orders_arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrowup.svg"></div>
									<div class="list_advanced_orders advanced_order list_order_item">
										<!-- slider -->
										  <div class="swiper-container swiper_prof profile_advanced">
										    <div class="swiper-wrapper">
										<?php
											$paid_order = get_posts( array(
										        'numberposts' => -1,
										        'meta_key'    => '_customer_user',
										        'meta_value'  => get_current_user_id(),
										        'post_type'   => wc_get_order_types(),
										        'post_status' => array_keys( wc_get_order_statuses() )
										    ) );
										?>

										<?php
											$advance_item = 1;
											$advance_count = 1;
											
										    foreach ($paid_order as $post) {
										    	$advance_paid = wc_get_order( $post->ID );
										    	if($advance_paid->get_used_coupons()){
										    		$items = $advance_paid->get_items();
										    		
													foreach ( $items as $item ) {
														if($advance_item%4 == 1){echo '<div class="swiper-slide"  data-hash="slide'.$advance_count.'">'; }
													    $product_name = $item->get_name();
													    $product_id = $item->get_product_id();
													    $product_variation_id = $item->get_variation_id();
													    $product = new WC_Product_Variation($product_variation_id);
													    $parent_id = $product->parent->id;							 
													    $parent_meta = get_post_meta($parent_id);

													
													echo '<div class="list_tour_content_item"><div class="list_tour_item_name">	<h3 class="list_tour_item_parent_name">'. get_the_title($parent_id) .'</h3><h4 class="list_tour_item_child_name">'.$product->attributes['date-of-the-tour'] .'</h4></div><div class="list_tour_item_city_day"><span>'.get_field( "tour_tags_days", $parent_id ).'</span><span> | </span><span>'.get_field( "tour_tags_city", $parent_id ).'</span></div><div class="list_tour_item_price">'.($product->get_regular_price() * 0.1).' USD	</div><div class="list_tour_item_view_order"><a href="' . site_url( '/paused-order-tour/' ).'?tour_id=' . $product_variation_id .'">	View/Order</a></div>	</div>';
													if($advance_item%4 == 0){$advance_count++; echo '</div>'; }
														$advance_item++;				    	
													    
													}
										    	}												
										    }
										    $advance_item--;
										?>
										<?php if($advance_item%4 > 0 || $advance_item < 4){echo '</div>'; } ?>
										 </div> <!--  End Swiper wraper  -->
										    <!-- Add Pagination -->
										    <div class="wrap_pagination_pro">
										    	<div class="pagination_pro_prev advanced_pro_prev" style="color:#098;">
										    		<svg width="27" height="27" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
														<path fill="none" stroke-width="3px" stroke="#007aff" d="M20,3l-10,11l10,11"/>
													</svg>
												</div>
										    	<div class="swiper-pagination profile_pagination"></div>
										    	<div class="pagination_pro_next advanced_pro_next" style="color:#098;">
										    		<svg width="27" height="27" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="none" stroke-width="3px" stroke="#007aff" d="M10,3l10,11l-10,11"/>
										    		</svg>
										    	</div>
										    </div>							    	
									  									    
										  </div><!--  End Swiper slider -->
									</div>

									<div class="mobile_tab_orders">Paid Orders <img class="mobile_tab_orders_arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrowup.svg"></div>
									<div class="list_paid_order paid_order list_order_item">
										<!-- slider -->
										  <div class="swiper-container swiper_prof profile_paid">
										    <div class="swiper-wrapper">									
										<?php
											$paid_order = get_posts( array(
										        'numberposts' => -1,
										        'meta_key'    => '_customer_user',
										        'meta_value'  => get_current_user_id(),
										        'post_type'   => wc_get_order_types(),
										        'post_status' => array('wc-processing', 'wc-completed')
										    ) );
										?>

										<?php
											$paid_item = 1;
											$paid_count = 1;
											
										    foreach ($paid_order as $post) {
										    	$order_paid = wc_get_order( $post->ID );
												$items = $order_paid->get_items();
												 
												foreach ( $items as $item ) {
													if($paid_item%4 == 1){echo '<div class="swiper-slide"  data-hash="slide'.$paid_count.'">'; }
												    $product_name = $item->get_name();
												    $product_id = $item->get_product_id();
												    $product_variation_id = $item->get_variation_id();
												    $product = new WC_Product_Variation($product_variation_id);
												    $parent_id = $product->parent->id;							 
												    $parent_meta = get_post_meta($parent_id);
												
												echo '<div class="list_tour_content_item"><div class="list_tour_item_name">	<h3 class="list_tour_item_parent_name">'. get_the_title($parent_id) .'</h3><h4 class="list_tour_item_child_name">'.$product->attributes['date-of-the-tour'] .'</h4></div><div class="list_tour_item_city_day"><span>'.get_field( "tour_tags_days", $parent_id ).'</span><span> | </span><span>'.get_field( "tour_tags_city", $parent_id ).'</span></div><div class="list_tour_item_price">'.$product->get_regular_price().' USD	</div><div class="list_tour_item_view_order"><a href="'.get_permalink($parent_id).'">	View/Order</a></div>	</div>';	
												if($paid_item%4 == 0){$paid_count++; echo '</div>'; }
												$paid_item++;					    					    	
												   
												}
										    }
										    $paid_item--;
										?>	
											<?php if($paid_item%4 > 0 || $paid_item < 4){echo '</div>'; } ?>
																			 
										    </div> <!--  End Swiper wraper  -->
										    <!-- Add Pagination -->
										    <div class="wrap_pagination_pro">
										    	<div class="pagination_pro_prev paid_pro_prev" style="color:#098;">
										    		<svg width="27" height="27" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
														<path fill="none" stroke-width="3px" stroke="#007aff" d="M20,3l-10,11l10,11"/>
													</svg>
												</div>
										    	<div class="swiper-pagination profile_pagination"></div>
										    	<div class="pagination_pro_next paid_pro_next" style="color:#098;">
										    		<svg width="27" height="27" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="none" stroke-width="3px" stroke="#007aff" d="M10,3l10,11l-10,11"/>
										    		</svg>
										    	</div>
										    </div>							    	
									  									    
										  </div>						
									</div>

									<div class="mobile_tab_orders">Purchase History <img class="mobile_tab_orders_arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrowup.svg"></div>
									<div class="list_history_order history_order list_order_item">
										
										<!-- slider -->
										  <div class="swiper-container swiper_prof profile_history">
										    <div class="swiper-wrapper">
										    <?php
												$history_orders = get_posts( array(
											        'numberposts' => -1,
											        'meta_key'    => '_customer_user',
											        'meta_value'  => get_current_user_id(),
											        'post_type'   => wc_get_order_types(),
											        'post_status' => array_keys( wc_get_order_statuses() )//array('wc-processing', 'wc-completed')
											    ) );
											?> 										    
										<?php
											$history_item = 1;
											$slide_count = 1;
											
										    foreach ($history_orders as $post) {
										    	$order_hystory = wc_get_order( $post->ID );
												$items = $order_hystory->get_items();
												
												foreach ( $items as $item ) {
													if($history_item%4 == 1){echo '<div class="swiper-slide"  data-hash="slide'.$slide_count.'">'; }
												    $product_name = $item->get_name();
												    $product_id = $item->get_product_id();
												    $product_variation_id = $item->get_variation_id();
												    $product = new WC_Product_Variation($product_variation_id);
												    $parent_id = $product->parent->id;							 
												    $parent_meta = get_post_meta($parent_id);
												
												echo '<div class="list_tour_content_item"><div class="list_tour_item_name">	<h3 class="list_tour_item_parent_name">'. get_the_title($parent_id) .'</h3><h4 class="list_tour_item_child_name">'.$product->attributes['date-of-the-tour'] .'</h4></div><div class="list_tour_item_city_day"><span>'.get_field( "tour_tags_days", $parent_id ).'</span><span> | </span><span>'.get_field( "tour_tags_city", $parent_id ).'</span></div><div class="list_tour_item_price">'.$product->get_regular_price().' USD	</div><div class="list_tour_item_view_order"><a href="'.get_permalink($parent_id).'">	View/Order</a></div>	</div>';
												if($history_item%4 == 0){$slide_count++; echo '</div>'; }
												$history_item++;					    	
												    
												}
										    }
										    $history_item--;
										?>
											<?php if($history_item%4 > 0 || $history_item < 4){echo '</div>'; } ?>
																			 
										    </div> <!--  End Swiper wraper  -->
										    <!-- Add Pagination -->
										    <div class="wrap_pagination_pro">
										    	<div class="pagination_pro_prev history_pro_prev" style="color:#098;">
										    		<svg width="27" height="27" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
														<path fill="none" stroke-width="3px" stroke="#007aff" d="M20,3l-10,11l10,11"/>
													</svg>
												</div>
										    	<div class="swiper-pagination profile_pagination"></div>
										    	<div class="pagination_pro_next history_pro_next" style="color:#098;">
										    		<svg width="27" height="27" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="none" stroke-width="3px" stroke="#007aff" d="M10,3l10,11l-10,11"/>
										    		</svg>
										    	</div>
										    </div>							    	
									  									    
										  </div>							 						   
									</div>									
								</div> <!-- end list_tour_content -->
							</div>
						</div>		
				</div>
				<div class="profile_content_tab profile_paused">
					<!-- slider -->						
					<?php
						$customer_orders = get_posts( array(
					        'numberposts' => -1,
					        'meta_key'    => '_customer_user',
					        'meta_value'  => get_current_user_id(),
					        'post_type'   => wc_get_order_types(),
					        'post_status' => 'wc-paused',
					    ) );
					?>
					    <div class="profile_content_tab_wrap">
					    	<div class="swiper-container swiper_paused profile_slider_paused">
						  <div class="swiper-wrapper">			    
							<?php
								$pause_item = 1;
								$pause_count = 1;
								
							    foreach ($customer_orders as $post) {
							    	$order = wc_get_order( $post->ID );
									$items = $order->get_items();
									
									foreach ( $items as $item ) {
										if($pause_item%4 == 1){echo '<div class="swiper-slide"  data-hash="slide'.$pause_count.'">'; }
									    $product_name = $item->get_name();
									    $product_id = $item->get_product_id();
									    $product_variation_id = $item->get_variation_id();
									    $product = new WC_Product_Variation($product_variation_id);
									    $parent_id = $product->parent->id;							 
									    $parent_meta = get_post_meta($parent_id);

									
									echo '<div class="list_tour_content_item"><div class="list_tour_item_name">	<h3 class="list_tour_item_parent_name">'. get_the_title($parent_id) .'</h3><h4 class="list_tour_item_child_name">'.$product->attributes['date-of-the-tour'] .'</h4></div><div class="list_tour_item_city_day"><span>'.get_field( "tour_tags_days", $parent_id ).'</span><span> | </span><span>'.get_field( "tour_tags_city", $parent_id ).'</span></div><div class="list_tour_item_price">'.$product->get_regular_price().' USD	</div><div class="list_tour_item_view_order"><a href="'.home_url().'/order-tour/?tour_id='. $product_variation_id.'&order='.$post->ID .'">	View/Order</a></div>	</div>';
									if($pause_item%4 == 0){$pause_count++; echo '</div>'; }
										$pause_item++;
									}
							    }
							    $pause_item--;
							?>	
								<?php if($pause_item%4 > 0 || $pause_item < 4){echo '</div>'; } ?>
											   								 
										    </div> 
										    <!--  End Swiper wraper  -->
										    <!-- Add Pagination -->
										    <div class="wrap_pagination_pro">
										    	<div class="pagination_pro_prev paused_pro_prev" style="color:#098;">
										    		<svg width="27" height="27" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
														<path fill="none" stroke-width="3px" stroke="#007aff" d="M20,3l-10,11l10,11"/>
													</svg>
												</div>
										    	<div class="swiper-pagination profile_pagination"></div>
										    	<div class="pagination_pro_next paused_pro_next" style="color:#098;">
										    		<svg width="27" height="27" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="none" stroke-width="3px" stroke="#007aff" d="M10,3l10,11l-10,11"/>
										    		</svg>
										    	</div>
										    </div>	    							    
										  </div>
					
				</div>
			</div>
				<div class="profile_content_tab profile_wish">
					<div class="profile_content_tab_wrap">	
					
					<?php
						$favorite_post =  get_user_favorites();
					?>
					<div class="swiper-container swiper_favorite">
						  <div class="swiper-wrapper">	
					<?php
						$favorite_items = 1;
						$favorite_count = 1;
						
						foreach ($favorite_post as $key => $value) {
							if($favorite_items%4 == 1){echo '<div class="swiper-slide"  data-hash="slide'.$favorite_count.'">'; }
							$producte = new WC_Product_Variable( $value );
							$minPrice = $producte->get_variation_regular_price( 'min');
							$minPrice = explode('.', $minPrice)[0];
						
							echo '<div class="list_tour_content_item"><div class="list_tour_item_name">	<h3 class="list_tour_item_parent_name">'. get_the_title($value) .'</h3>												</div><div class="list_tour_item_city_day"><span>'.get_field( "tour_tags_days", $value ).'</span><span> | </span><span>'.get_field( "tour_tags_city", $value ).'</span>				</div>			<div class="list_tour_item_price">'.$minPrice.' USD											</div><div class="list_tour_item_view_order"><a href="'.get_permalink($value).'">	View/Order</a></div>										</div>';
						if($favorite_items%4 == 0){$favorite_count++; echo '</div>'; }
						$favorite_items++;							
						}
					?>
						<?php if($favorite_items%4 > 0 || $favorite_items < 4){echo '</div>'; } ?>
										   								 
								</div> 
								<!--  End Swiper wraper  -->
								<!-- Add Pagination -->
								<div class="wrap_pagination_pro">
									<div class="pagination_pro_prev favorite_pro_prev" style="color:#098;">
										<svg width="27" height="27" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
											<path fill="none" stroke-width="3px" stroke="#007aff" d="M20,3l-10,11l10,11"/>
										</svg>
									</div>
									<div class="swiper-pagination profile_pagination favor_pagination"></div>
									<div class="pagination_pro_next favorite_pro_next" style="color:#098;">
										<svg width="27" height="27" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="none" stroke-width="3px" stroke="#007aff" d="M10,3l10,11l-10,11"/>
										</svg>
									</div>
								</div>				    	  									    
							</div>







						
					</div>
				</div>		

			</div>
			
		</div>			
	</div>	
	
</section>
<?php
	if(isset($_GET['cabinet']) && $_GET['cabinet'] == 'open'){
?>


<?php
	}
?>
<?php get_footer(); ?>

