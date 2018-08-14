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
			$tour_limit = 8;
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
												
											
											$services_item = 1;
											$services_count = 1;
											
										    foreach ($request_order as $post) {
										    	if($services_item%8 ==1){echo '<div class="swiper-slide"  data-hash="slide'. $services_count.'">'; }
										    	$order_req = wc_get_order( $post->ID );
										    	$order_url = $order_req->get_view_order_url();

										    	
										    	
										    	
										    	echo '<div class="list_tour_content_item"><div class="list_tour_item_name services_tour_item_name">	<h3 class="list_tour_item_parent_name" style="text-transform:uppercase;">service request </h3><h4 class="list_tour_item_child_name">'.$order_req->order_date.'</h4></div><div class="services_tour_tag" >accomodation/transfer/guide/special</div><div class="list_tour_item_view_order review_hide_description_serv"><span class="list_tour_service_review">Review</span><span class="list_tour_service_hide">Hide</span><img style="width:16px; height:13px;margin-left:7px;" src="'.get_template_directory_uri().'/img/arrow-bottom.svg"/></div>	</div>';

?>
													<?php $serv_data = explode("!", $order_req->customer_message); //print_r($serv_data); 
														$hotels_arr=$appart_arr=$special_arr=$trans_from_arr=$trans_to_arr=$guide_arr=$custom_request_arr = [];
														for($i = 0; $i < count($serv_data); $i++){
															if(preg_match('/Hotel/i', $serv_data[$i])) array_push($hotels_arr, $serv_data[$i]);
															if(preg_match('/Apartament/', $serv_data[$i])) array_push($appart_arr, $serv_data[$i]);
															if(preg_match('/ Message:/', $serv_data[$i])) array_push($special_arr, $serv_data[$i]);


															if(preg_match('/Transfer From/', $serv_data[$i])) array_push($trans_from_arr, $serv_data[$i]);
															if(preg_match('/Transfer To/', $serv_data[$i])) array_push($trans_to_arr, $serv_data[$i]);
															if(preg_match('/Interpreter/', $serv_data[$i])) array_push($guide_arr, $serv_data[$i]);
															if(preg_match('/Special message/', $serv_data[$i])) array_push($custom_request_arr, $serv_data[$i]);

														}
														$acomo_city = $acomo_hotel = $acomo_date = $acomo_guest = $acomo_rooms = "";
														for($ii = 0; $ii < count($hotels_arr); $ii++){
															$line = explode(";", $hotels_arr[$ii]);
															$line11 = explode(":", $line[0]);
															$line12 = explode(":", $line[1]);
															$line13 = explode(":", $line[2]);
															$line14 = explode(":", $line[3]);
															$line15 = explode(":", $line[7]);
															$line16 = explode(":", $line[4]);
															$line17 = explode(":", $line[5]);
															$line18 = explode(":", $line[6]);

															if($line11[1] == "" || !$line11[1]) $line11[1] = "-";
															if($line12[1] == "" || !$line12[1]) $line12[1] = "-";
															if($line13[1] == "" || !$line13[1]) $line13[1] = "-";
															if($line14[1] == "" || !$line14[1]) $line14[1] = "-";
															
															

															$acomo_city .= '<div class="service_order_city"><p class="service_order_value_item">Hotel: '.$line11[2].'</p></div>';
															if(preg_match('/Select your hotel/i', $line12[1])) $line12[1] = "-";
															$acomo_hotel .='<div class="service_order_city"><p class="service_order_value_item">'.$line12[1].'</p></div>';
															$acomo_date .='<div class="service_order_city"><p class="service_order_value_item">'.$line13[1].' - '.$line14[1].'</p></div>'; 
															if($line15[1] == "" || !$line15[1]) $line15[1] = "-";
															$acomo_guest .= '<div class="service_order_city"><p class="service_order_value_item">'.$line15[1].'</p></div>';
															if($line16[1] == "" || !$line16[1]) $line16[1] = "-";
															if($line17[1] == "" || !$line17[1]) $line17[1] = "-";
															if($line18[1] == "" || !$line18[1]) $line18[1] = "-";
															$acomo_rooms .= '<div class="service_order_city"><p class="service_order_value_item">Single '.$line16[1].'; Double '.$line17[1].'; Twin '.$line18[1].';</p></div>';															
														}

														for($ij = 0; $ij < count($appart_arr); $ij++){
															$line1 = explode(";", $appart_arr[$ij]);
															$line21 = explode(":", $line1[0]);
															$line22 = explode(":", $line1[1]);
															$line23 = explode(":", $line1[2]);
															$line24 = explode(":", $line1[3]);
															$line25 = explode(":", $line1[4]);
															$line26 = explode(":", $line1[5]);
															$line27 = explode(":", $line1[6]);
															$line28 = explode(":", $line1[7]);

															if($line21[1] == "" || !$line21[1]) $line21[1] = "-";
															if($line23[1] == "" || !$line23[1]) $line23[1] = "-";
															
															$acomo_city .= '<div class="service_order_city"><p class="service_order_value_item">Appartaments: '.$line21[2].'</p></div>';
															
															$acomo_hotel .='<div class="service_order_city"><p class="service_order_value_item">-</p></div>';
															$acomo_date .='<div class="service_order_city"><p class="service_order_value_item">'.$line23[1].' - '.$line24[1].'</p></div>'; 
															if($line22[1] == "") $line22[1] = "-";
															$acomo_guest .= '<div class="service_order_city"><p class="service_order_value_item">'.$line22[1].'</p></div>';
															if($line25[1] == "" || !$line25[1]) $line25[1] = "-";
															if($line26[1] == "" || !$line26[1]) $line26[1] = "-";
															if($line27[1] == "" || !$line27[1]) $line27[1] = "-";
															if($line28[1] == "" || !$line28[1]) $line28[1] = "-";
															$acomo_rooms .= '<div class="service_order_city"><p class="service_order_value_item">Rooms '.$line25[1].';Single '.$line26[1].'; Double '.$line27[1].'; Twin '.$line28[1].';</p></div>';															
														}

														$acomo_mes = "";
														for($iy = 0; $iy < count($special_arr); $iy++){
															$line2 = explode(":", $special_arr[$iy]);
															$acomo_mes .= '<div class="service_order_accomod_wishes" style="width:100%;"><p class="service_order_value_item" style="width:100%;">'.$line2[1].'</p></div>';

														}

// 														

														$trans_city = $trans_place = $trans_date = $trans_time = $trans_pasen = "";
														for($iz = 0; $iz < count($trans_from_arr); $iz++){
															$trans = explode(";", $trans_from_arr[$iz]);
															$trans_to = explode(";", $trans_to_arr[$iz]);
															// print_r($trans);
															$trans1 = explode(":", $trans[0]);
															$trans2 = explode(":", $trans[1]);
															$trans3 = explode(":", $trans[2]);
															$trans4 = explode(":", $trans[4]);
															$trans5 = explode(":", $trans[3]);

															$trans11 = explode(":", $trans_to[0]);
															$trans12 = explode(":", $trans_to[1]);
															$trans13 = explode(":", $trans_to[2]);
															$trans14 = explode(":", $trans_to[4]);
															$trans15 = explode(":", $trans_to[3]);

															if($trans2[1] == "" || !$trans2[1]) $trans2[1] = "-";
															if($trans12[1] == "" || !$trans12[1]) $trans12[1] = "-";
															if($trans3[1] == "" || !$trans3[1]) $trans3[1] = "-";
															if($trans13[1] == "" || !$trans13[1]) $trans13[1] = "-";
															if($trans4[1] == "" || !$trans4[1]) $trans4[1] = "-";
															if($trans14[1] == "" || !$trans14[1]) $trans14[1] = "-";
															if($trans5[1] == "" || !$trans5[1]) $trans5[1] = "-";
															if($trans15[1] == "" || !$trans15[1]) $trans15[1] = "-";


															$trans_city .='<div class="service_order_accomod_wishes" style="width:100%;"><p class="service_order_value_item" style="width:100%;">'.($iz+1).' From: '.$trans1[2].'</p></div><div class="service_order_accomod_wishes" style="width:100%;"><p class="service_order_value_item" style="width:100%;">'.($iz+1).' To: '.$trans11[2].'</p></div>';
															$trans_place .= '<div class="service_order_accomod_wishes" style="width:100%;"><p class="service_order_value_item" style="width:100%;">'.$trans2[1].'</p></div><div class="service_order_accomod_wishes" style="width:100%;"><p class="service_order_value_item" style="width:100%;">'.$trans12[1].'</p></div>';

															$trans_date .= '<div class="service_order_accomod_wishes" style="width:100%;"><p class="service_order_value_item" style="width:100%;">'.$trans3[1].'</p></div><div class="service_order_accomod_wishes" style="width:100%;"><p class="service_order_value_item" style="width:100%;">'.$trans13[1].'</p></div>';
															$trans_pasen .= '<div class="service_order_accomod_wishes" style="width:100%;"><p class="service_order_value_item" style="width:100%;">'.$trans5[1].'</p></div><div class="service_order_accomod_wishes" style="width:100%;"><p class="service_order_value_item" style="width:100%;">'.$trans15[1].'</p></div>';
															$trans_time .= '<div class="service_order_accomod_wishes" style="width:100%;"><p class="service_order_value_item" style="width:100%;">'.$trans4[1].':'.$trans4[2].'</p></div><div class="service_order_accomod_wishes" style="width:100%;"><p class="service_order_value_item" style="width:100%;">'.$trans14[1].':'.$trans14[2].'</p></div>';
															
														}

														$guide_city = $guide_date = $guide_hour = $guide_wishes = "";
														for ($iq=0; $iq < count($guide_arr); $iq++) { 

															$guide_line =  explode(";", $guide_arr[$iq]);															
															$guide_line1 = explode(":", $guide_line[0]);
															$guide_line2 = explode(":", $guide_line[1]);
															$guide_line3 = explode(":", $guide_line[2]);
															$guide_line4 = explode(":", $guide_line[3]);

															if($guide_line1[2] == "" || !$guide_line1[1]) $guide_line1[2] = "-";
															if($guide_line2[1] == "" || !$guide_line2[1]) $guide_line2[1] = "-";
															if($guide_line3[1] == "" || !$guide_line3[1]) $guide_line3[1] = "-";
															if($guide_line4[1] == "" || !$guide_line4[1]) $guide_line2[1] = "-";


															if($guide_line5[1] == "" || !$guide_line5[1]) $guide_line5[1] = "-";												

															$guide_city .= '<div class="service_order_city"><p class="service_order_value_item">'.$guide_line1[2].'</p></div>';
															$guide_date .= '<div class="service_order_city"><p class="service_order_value_item">'.$guide_line2[1].'</p></div>';
															$guide_hour .= '<div class="service_order_city"><p class="service_order_value_item">'.$guide_line3[1].' : '.$guide_line3[2].' - '.$guide_line4[1].' : '.$guide_line4[2].'</p></div>';
															$guide_wishes .= '<div class="service_order_city"><p class="service_order_value_item">'.$guide_line5[1].'</p></div>';
															
														}

														$special_message = "";
														for ($is=0; $is < count($custom_request_arr); $is++) { 
															$spec_message =  explode(";", $custom_request_arr[$is]);
															$spec_line1 = explode(":", $spec_message[0]);													

															$special_message .= '<div class="service_order_special_message"><p class="service_order_value_item">'.$spec_line1[1].'</p></div>';															
															
														}

// print_r($custom_request_arr);



													 ?>
														<div class="profile_order_block profile_service_block_desc profile_service_block_desc_hide">
															<div class="service_order_block_wrap">
																<div class="service_order_block_item_wrap">					 
																	<p class="services_order_row">
																		<img style="width:23px; height: 23px;" src="<?php echo get_template_directory_uri(); ?>/img/account/byild_icon.svg"/>				
																		<span class="services_order_name_row">Accomodation</span>
																	</p>
																	<div class="service_order_block_accomodation profile_service_accomodation_row1">
																		<div class="service_order_block_info">
																			<p class="service_order_name_value">City</p>
																			<?php echo $acomo_city; ?>																
																		</div>
																		<div class="service_order_block_info">
																			<p class="service_order_name_value">Hotel</p>
																			<?php echo $acomo_hotel; ?>																				
																		</div>
																		<div class="service_order_block_info">
																			<p class="service_order_name_value">Dates</p>
																			<?php echo $acomo_date; ?>													
																		</div>

																		<div class="service_order_block_info">
																			<p class="service_order_name_value">Guests Amount</p>
																			<?php echo $acomo_guest; ?>														
																		</div>
																		<div class="service_order_block_info">
																			<p class="service_order_name_value">Amount of rooms by capacity</p>
																			<?php echo $acomo_rooms; ?>															
																		</div>	
																		<div class="service_order_block_accomodation " style="width:100%;">
																			<div class="service_order_block_info" style="width:100%;">
																				<p class="service_order_name_value" style="width:100%;"><!--Wishes--></p>
																				<?php echo $acomo_mes; ?>				
																			</div>
																		</div>						
																	</div>
																	<div class="service_order_block_accomodation">
																		<div class="service_order_block_info">
																			<p class="service_order_name_value"><!--Wishes--></p>
																			<div class="service_order_accomod_wishes"></div>				
																		</div>
																	</div>
																
																	<div class="service_order_horizontal"></div>
																</div>

																<div class="service_order_block_item_wrap">					 
																	<p class="services_order_row">
																		<svg class="services_icon" width="26" height="22" viewBox="0 0 26 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#2F80ED" id="path0_fill" d="M 15.1667 14.3L 19.5 14.3L 19.5 16.5L 15.1667 16.5L 15.1667 14.3ZM 0 4.39998L 2.16668 4.39998L 2.16668 9.89999L 0 9.89999L 0 4.39998ZM 23.8333 4.39998L 26 4.39998L 26 9.89999L 23.8333 9.89999L 23.8333 4.39998ZM 20.5833 5.02245e-08L 5.41668 5.02245e-08C 4.22503 5.02245e-08 3.25 0.989974 3.25 2.20002L 3.25 19.8L 5.41668 19.8L 5.41668 22L 7.58337 22L 7.58337 19.8L 18.4167 19.8L 18.4167 22L 20.5834 22L 20.5834 19.8L 22.75 19.8L 22.75 2.20002C 22.75 0.990025 21.775 5.14801e-05 20.5833 5.02245e-08ZM 20.5833 17.6L 5.41668 17.6L 5.41668 13.2L 20.5834 13.2L 20.5834 17.6L 20.5833 17.6ZM 20.5833 11L 5.41663 11L 5.41663 5.50001L 11.9166 5.50001L 11.9166 8.80001L 14.0833 8.80001L 14.0833 5.50001L 20.5833 5.50001L 20.5833 11L 20.5833 11ZM 20.5832 3.30005L 5.41658 3.30005L 5.41658 2.20002L 20.5833 2.20002L 20.5833 3.30005L 20.5832 3.30005ZM 6.5 14.3L 10.8333 14.3L 10.8333 16.5L 6.5 16.5L 6.5 14.3Z"></path></svg>
																		<span class="services_order_name_row">Transfer</span>
																	</p>
																	
																	<div class="service_order_block_accomodation profile_service_accomodation_row2">
																		<div class="service_order_block_info">
																			<p class="service_order_name_value">City</p>
																			<?php echo $trans_city; ?>
																								
																		</div>
																		<div class="service_order_block_info">
																			<p class="service_order_name_value">Place</p>
																			<div class="service_transfer_from_place"></div>	
																			<?php echo $trans_place; ?>			
																		</div>
																		<div class="service_order_block_info">
																			<p class="service_order_name_value">Departure Date</p>
																			<?php echo $trans_date; ?>
																			<!-- <div class="service_transfer_from_date"></div>	 -->					
																		</div>
																		<div class="service_order_block_info">
																			<p class="service_order_name_value">Time</p>
																			<?php echo $trans_time; ?>						
																		</div>
																		<div class="service_order_block_info">
																			<p class="service_order_name_value">Passengers Amount</p>
																			<?php echo $trans_pasen; ?>								
																		</div>					
																	</div>					
																
																	<div class="service_order_horizontal"></div>
																</div>
																<div class="service_order_block_item_wrap">					 
																	<p class="services_order_row">
																		<svg class="services_icon" width="25" height="22" viewBox="0 0 25 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#2F80ED" d="M 10.2022 14.6875L 10.7819 16.1455C 10.2205 16.3712 9.66049 16.5431 9.11418 16.658L 8.79519 15.1206C 9.25304 15.0236 9.72603 14.878 10.2022 14.6875ZM 5.55274 16.5707C 6.12491 16.7363 6.72779 16.8254 7.34412 16.8345L 7.36865 15.2633C 6.88943 15.2554 6.42406 15.1881 5.98466 15.0609L 5.55274 16.5707ZM 17.8557 13.8282C 18.3061 13.9175 18.7455 14.0724 19.162 14.2887L 19.8795 12.8923C 19.33 12.6084 18.7517 12.4043 18.158 12.2875L 17.8557 13.8282ZM 14.5964 12.5392L 15.0637 14.0369C 15.541 13.8865 16.0128 13.7914 16.4672 13.7546L 16.3424 12.1893C 15.7716 12.2354 15.1841 12.3537 14.5964 12.5392ZM 12.0881 13.7209C 11.9127 13.8314 11.7402 13.9324 11.5707 14.0277L 12.3307 15.3999C 12.5214 15.292 12.7167 15.1789 12.9119 15.056C 13.1806 14.8887 13.4431 14.7397 13.7009 14.6076L 12.9913 13.2083C 12.6984 13.3588 12.3962 13.5291 12.0881 13.7209ZM 16.4064 3.92857C 16.4064 4.57003 16.2535 5.17775 15.982 5.7119L 12.5001 12.5713C 12.5001 12.5713 8.99057 5.6549 8.97687 5.62593C 8.7311 5.11334 8.59394 4.53629 8.59394 3.92857C 8.59394 1.75867 10.3425 1.10696e-08 12.5001 1.10696e-08C 14.6575 1.10696e-08 16.4064 1.75867 16.4064 3.92857ZM 14.8439 3.92857C 14.8439 2.6272 13.794 1.57134 12.5001 1.57134C 11.2061 1.57134 10.1563 2.6272 10.1563 3.92857C 10.1563 5.22978 11.2061 6.28563 12.5001 6.28563C 13.794 6.28563 14.8439 5.22978 14.8439 3.92857ZM 20.3126 7.85713L 16.6476 7.85713L 15.8492 9.42863L 19.1864 9.42863L 20.8726 14.5175L 20.334 15.116C 20.9078 15.6374 21.2052 16.118 21.2069 16.1196L 21.3716 16.02L 22.8319 20.4285L 2.16674 20.4285L 3.7324 15.7098C 3.78732 15.7482 3.82993 15.7849 3.89099 15.8231L 4.72119 14.4942C 4.53499 14.3759 4.38237 14.2594 4.24805 14.1505L 5.81376 9.42858L 9.15226 9.42858C 8.82111 8.77779 8.56019 8.26385 8.35425 7.85708L 4.68755 7.85708L 0 22L 25 22L 20.3126 7.85713Z"></path></svg>
																		<span class="services_order_name_row">Guide</span>
																	</p>
																	<div class="service_order_block_guide profile_service_accomodation_row3">
																		<div class="service_order_block_info">
																			<p class="service_order_name_value">City</p>
																			<?php echo $guide_city; ?>												
																		</div>
																		<div class="service_order_block_info">
																			<p class="service_order_name_value">Date</p>
																			<?php echo $guide_date; ?>												
																		</div>
																		<div class="service_order_block_info">
																			<p class="service_order_name_value">Hours</p>
																			<?php echo $guide_hour; ?>												
																		</div>							
																		<div class="service_order_block_info">
																			<p class="service_order_name_value">Subject/wishes</p>
																			<?php echo $guide_wishes; ?>							
																		</div>					
																	</div>
																
																	<div class="service_order_horizontal"></div>
																</div>
																<div class="service_order_block_item_wrap">					 
																	<p class="services_order_row">
																		<svg class="services_icon" width="23" height="23" viewBox="0 0 23 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																	
																	<path fill="#2F80ED" transform="translate(3.8 0)" d="M 15.4529 7.67522C 15.4252 3.43836 11.9698 0 7.72656 0C 3.48329 0 0.0279413 3.43836 0.000179589 7.67522L 0 7.72656L 8.97944e-05 7.72656C 0.01433 10.8121 1.31203 12.5197 2.45768 14.0273C 3.4159 15.2883 4.1727 16.2843 4.1727 17.9423L 4.1727 20.3047C 4.1727 21.7909 5.38182 23 6.86802 23L 8.58506 23C 10.0713 23 11.2804 21.7909 11.2804 20.3047L 11.2804 17.9424C 11.2804 16.2843 12.0372 15.2883 12.9954 14.0274C 14.1411 12.5197 15.4388 10.8121 15.453 7.72656L 15.4531 7.67522L 15.4529 7.67522ZM 9.4835 20.3047C 9.4835 20.8001 9.08046 21.2031 8.58506 21.2031L 6.86802 21.2031C 6.37262 21.2031 5.96958 20.8001 5.96958 20.3047L 5.96958 18.5527L 9.4835 18.5527L 9.4835 20.3047ZM 11.5647 12.9402C 10.7334 14.0343 9.87895 15.1586 9.58786 16.7559L 5.86522 16.7559C 5.57413 15.1586 4.71972 14.0343 3.88835 12.9402C 2.81683 11.5301 1.80456 10.198 1.79688 7.7037C 1.80923 4.44448 4.46452 1.79688 7.72656 1.79688C 10.9886 1.79688 13.6439 4.44448 13.6562 7.7037C 13.6486 10.198 12.6363 11.5301 11.5647 12.9402Z"></path>
																	<path fill="transparent" d="M3,3l-2,-1" stroke-width="2px" stroke="#2F80ED"></path>
																	<path fill="transparent" d="M2,8l-2,0" stroke-width="2px" stroke="#2F80ED"></path>
																	<path fill="transparent" d="M3,13l-2,1" stroke-width="2px" stroke="#2F80ED"></path>
																	<path fill="transparent" d="M20,3l2,-1" stroke-width="2px" stroke="#2F80ED"></path>
																	<path fill="transparent" d="M21,8l2,0" stroke-width="2px" stroke="#2F80ED"></path>
																	<path fill="transparent" d="M20,13l2,1" stroke-width="2px" stroke="#2F80ED"></path>
																	</svg>
																		<span class="services_order_name_row">Special</span>
																	</p>
																	<div class="service_order_block_guide profile_service_accomodation_row4">						
																		<div class="service_order_block_info">
																			<p class="service_order_name_value">Custom service request</p>
																			<?php echo $special_message; ?>
																		</div>					
																	</div>
																
																	<div class="service_order_horizontal"></div>
																</div>
														
															</div>
														</div>



<?php
										    	// echo $order_req->customer_message;
										   

										    	if($services_item%8 == 0){$services_count++; echo '</div>'; }
										    	$services_item++;												
										    }
										    $services_item--;									
										?>
										<?php if($services_item%8 > 0 || $services_item < 8){echo '</div>'; }?>
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
													if($request_item % $tour_limit == 1){echo '<div class="swiper-slide"  data-hash="slide'.$request_count.'">'; }
												    $product_name = $item->get_name();
												    $product_id = $item->get_product_id();
												    $product_variation_id = $item->get_variation_id();
												    $product = new WC_Product_Variation($product_variation_id);
												    $parent_id = $product->parent->id;							 
												    $parent_meta = get_post_meta($parent_id);
												
												echo '<div class="list_tour_content_item"><div class="list_tour_item_name">	<h3 class="list_tour_item_parent_name">'. get_the_title($parent_id) .'</h3><h4 class="list_tour_item_child_name">'.$product->attributes['date-of-the-tour'] .'</h4></div><div class="list_tour_item_city_day"><span>'.get_field( "tour_tags_days", $parent_id ).'</span><span> | </span><span>'.get_field( "tour_tags_city", $parent_id ).'</span></div><div class="list_tour_item_price"> - </div><div class="list_tour_item_view_order"><a href="'.get_permalink($parent_id).'">	View/Order</a></div>	</div>';												
												if($request_item% $tour_limit == 0){$request_count++; echo '</div>'; }
													$request_item++;						    	
												    
												}
										    }
										    $request_item--;
										?>
										<?php if($request_item % $tour_limit > 0  || $request_item < $tour_limit){echo '</div>'; } ?>
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
														if($advance_item % $tour_limit == 1){echo '<div class="swiper-slide"  data-hash="slide'.$advance_count.'">'; }
													    $product_name = $item->get_name();
													    $product_id = $item->get_product_id();
													    $product_variation_id = $item->get_variation_id();
													    $product = new WC_Product_Variation($product_variation_id);
													    $parent_id = $product->parent->id;							 
													    $parent_meta = get_post_meta($parent_id);

													
													echo '<div class="list_tour_content_item"><div class="list_tour_item_name">	<h3 class="list_tour_item_parent_name">'. get_the_title($parent_id) .'</h3><h4 class="list_tour_item_child_name">'.$product->attributes['date-of-the-tour'] .'</h4></div><div class="list_tour_item_city_day"><span>'.get_field( "tour_tags_days", $parent_id ).'</span><span> | </span><span>'.get_field( "tour_tags_city", $parent_id ).'</span></div><div class="list_tour_item_price">'.($product->get_regular_price() * 0.1).' USD	</div><div class="list_tour_item_view_order"><a href="' . site_url( '/paused-order-tour/' ).'?tour_id=' . $product_variation_id .'">	View/Order</a></div>	</div>';														
													if($advance_item% $tour_limit == 0){$advance_count++; echo '</div>'; }
														$advance_item++;			    	
													    
													}
										    	}												
										    }
										    $advance_item--;
										?>
										<?php if($advance_item% $tour_limit > 0 || $advance_item < $tour_limit){echo '</div>'; } ?>
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
													if($paid_item%$tour_limit == 1){echo '<div class="swiper-slide"  data-hash="slide'.$paid_count.'">'; }
												    $product_name = $item->get_name();
												    $product_id = $item->get_product_id();
												    $product_variation_id = $item->get_variation_id();
												    $product = new WC_Product_Variation($product_variation_id);
												    $parent_id = $product->parent->id;							 
												    $parent_meta = get_post_meta($parent_id);
												
												echo '<div class="list_tour_content_item"><div class="list_tour_item_name">	<h3 class="list_tour_item_parent_name">'. get_the_title($parent_id) .'</h3><h4 class="list_tour_item_child_name">'.$product->attributes['date-of-the-tour'] .'</h4></div><div class="list_tour_item_city_day"><span>'.get_field( "tour_tags_days", $parent_id ).'</span><span> | </span><span>'.get_field( "tour_tags_city", $parent_id ).'</span></div><div class="list_tour_item_price">'.$product->get_regular_price().' USD	</div><div class="list_tour_item_view_order"><a href="'.get_permalink($parent_id).'">	View/Order</a></div>	</div>';
														
												if($paid_item%$tour_limit == 0){$paid_count++; echo '</div>'; }
													$paid_item++;			    					    	
												   
												}
										    }
										    $paid_item--;
										?>	
											<?php if($paid_item% $tour_limit > 0 || $paid_item < $tour_limit){echo '</div>'; } ?>
																			 
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
													if($history_item% $tour_limit == 1){echo '<div class="swiper-slide"  data-hash="slide'.$slide_count.'">'; }
												    $product_name = $item->get_name();
												    $product_id = $item->get_product_id();
												    $product_variation_id = $item->get_variation_id();
												    $product = new WC_Product_Variation($product_variation_id);
												    $parent_id = $product->parent->id;							 
												    $parent_meta = get_post_meta($parent_id);
												
												echo '<div class="list_tour_content_item"><div class="list_tour_item_name">	<h3 class="list_tour_item_parent_name">'. get_the_title($parent_id) .'</h3><h4 class="list_tour_item_child_name">'.$product->attributes['date-of-the-tour'] .'</h4></div><div class="list_tour_item_city_day"><span>'.get_field( "tour_tags_days", $parent_id ).'</span><span> | </span><span>'.get_field( "tour_tags_city", $parent_id ).'</span></div><div class="list_tour_item_price">'.$product->get_regular_price().' USD	</div><div class="list_tour_item_view_order"><a href="'.get_permalink($parent_id).'">	View/Order</a></div>	</div>';
													
												if($history_item % $tour_limit == 0){$slide_count++; echo '</div>'; }
													$history_item++;			    	
												    
												}
										    }
										    $history_item--;
										?>
											<?php if($history_item% $tour_limit > 0 || $history_item < $tour_limit){echo '</div>'; } ?>
																			 
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
										if($pause_item% $tour_limit == 1){echo '<div class="swiper-slide"  data-hash="slide'.$pause_count.'">'; }
									    $product_name = $item->get_name();
									    $product_id = $item->get_product_id();
									    $product_variation_id = $item->get_variation_id();
									    $product = new WC_Product_Variation($product_variation_id);
									    $parent_id = $product->parent->id;							 
									    $parent_meta = get_post_meta($parent_id);

									
									echo '<div class="list_tour_content_item"><div class="list_tour_item_name">	<h3 class="list_tour_item_parent_name">'. get_the_title($parent_id) .'</h3><h4 class="list_tour_item_child_name">'.$product->attributes['date-of-the-tour'] .'</h4></div><div class="list_tour_item_city_day"><span>'.get_field( "tour_tags_days", $parent_id ).'</span><span> | </span><span>'.get_field( "tour_tags_city", $parent_id ).'</span></div><div class="list_tour_item_price">'.$product->get_regular_price().' USD	</div><div class="list_tour_item_view_order"><a href="'.home_url().'/order-tour/?tour_id='. $product_variation_id.'&order='.$post->ID .'">	View/Order</a></div>	</div>';
									if($pause_item% $tour_limit == 0){$pause_count++; echo '</div>'; }
										$pause_item++;
									}
							    }
							    $pause_item--;
							?>	
								<?php if($pause_item % $tour_limit > 0 || $pause_item < $tour_limit){echo '</div>'; } ?>
											   								 
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
							if($favorite_items% $tour_limit == 1){echo '<div class="swiper-slide"  data-hash="slide'.$favorite_count.'">'; }
							$producte = new WC_Product_Variable( $value );
							$minPrice = $producte->get_variation_regular_price( 'min');
							$minPrice = explode('.', $minPrice)[0];
						
							echo '<div class="list_tour_content_item"><div class="list_tour_item_name">	<h3 class="list_tour_item_parent_name">'. get_the_title($value) .'</h3>												</div><div class="list_tour_item_city_day"><span>'.get_field( "tour_tags_days", $value ).'</span><span> | </span><span>'.get_field( "tour_tags_city", $value ).'</span>				</div>			<div class="list_tour_item_price">'.$minPrice.' USD											</div><div class="list_tour_item_view_order"><a href="'.get_permalink($value).'">	View/Order</a></div>										</div>';
						if($favorite_items% $tour_limit == 0){$favorite_count++; echo '</div>'; }
						$favorite_items++;							
						}
					?>
						<?php
							$favorite_items--;	
						 if($favorite_items% $tour_limit > 0 || $favorite_items < $tour_limit){echo '</div>'; } ?>
										   								 
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

