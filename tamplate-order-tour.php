<?php
/*
*Template Name: Order tour
*/
?>
<?php get_header('order') ?>
<div class="woocommerce order_tour_woocommerce">
	<?php echo do_shortcode('[woocommerce_cart]'); ?>
	<?php echo do_shortcode('[woocommerce_checkout]'); ?>
</div>
<?php 
	global $product, $woocommerce;

	$tourID = $_GET['tour_id'];
	if(!$tourID){
		wp_redirect('/');
	} else {

		$prod_variation = wc_get_product($tourID);//concrete variation 
		if ($prod_variation == false) {
			//echo "<p>Hello!!! Invalid ID</p>";
			wp_redirect('/');
		}

		$par_prod = wp_get_post_parent_id( $tourID );
		$prodObj = new WC_Product_Variable( $par_prod );//parent
		//$prod_variation = new WC_Product_Variation($tourID);//concrete variation
		$regular_price = $prod_variation ->regular_price;
		$variation = wc_get_product($tourID);
		$tour_atr_name = $variation->get_variation_attributes();
	}


?>
<?php
 if ( isset( $_GET['tour_id'] ) ) {
		global $woocommerce;
		$woocommerce->cart->empty_cart();
		$woocommerce->cart->add_to_cart($_GET['tour_id']);
		$woocommerce->cart->add_discount( sanitize_text_field( 'book30' ));
	} 
	?>
	<?php
	$group_size = $adult_s = $children_s = $elderly_s = $single_s = $double_s = $requirement_s = $leader_s = $configure_s ="";
	if ( isset( $_GET['order'] ) ) {
		$pro_order = $_GET['order'];
		$order_s = wc_get_order( $pro_order );
		if(!$order_s){
			wp_redirect('/');
		}

		$order_s_data = $order_s->get_data();
		$saved_data = explode(';', $order_s_data['customer_note']);

		$group_size = explode(':', $saved_data[2]);
		$adult_s = explode(':', $saved_data[3]);
		$children_s = explode(':', $saved_data[4]);
		$elderly_s = explode(':', $saved_data[5]);
		$single_s = explode(':', $saved_data[6]);
		$double_s = explode(':', $saved_data[7]);
		$requirement_s = explode(':', $saved_data[8]);
		$leader_s = explode(':', $saved_data[9]);
		$configure_s = explode(':', $saved_data[10]);
		$group_size = $group_size[1];
		$adult_s = $adult_s[1];
		$children_s = $children_s[1];
		$elderly_s = $elderly_s[1];
		$single_s = $single_s[1];
		$double_s = $double_s[1];
		$requirement_s = $requirement_s[1];
		$leader_s = $leader_s[1];
		$configure_s = $configure_s[1];		

	}

	 ?>
<?php
	global $wpdb;
	$curUser = get_current_user_id();
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
<script type="text/javascript">
	var prodId = <?php echo $tourID; ?>
</script>
<div class="order_alert_message">
	
</div>



<div class="order_main_wrap">
<div class="order_tour">
<div class="order_tour_top_wraper">
	<h4 class="order_tour_tags">
		<span class="order_tour_time">
			<?php

			if (isset($tour_atr_name)){
				foreach ($tour_atr_name as $key => $value) {
					echo $value;
				}
			}	

			?>			
		</span>
		<span class="order_tour_duration"><?php the_field('tour_tags_days', $par_prod); ?> | <?php the_field('tour_tags_city', $par_prod); ?></span>				
	</h4>
	<h2 class="order_name_tour"><?php echo get_the_title( $par_prod ); ?></h2>
	<h4 class="order_tour_city">
			<?php
							if( have_rows('tour_stages_item', $par_prod) ):
								$slide_d = 1;
							    while ( have_rows('tour_stages_item', $par_prod) ) : the_row();
						?>
							<?php if($slide_d >1){echo " | ";} ?>
							<?php the_sub_field('stage_heading'); ?>
						<?php
							$slide_d++;
							    endwhile;
							else :
							endif
					?>

	</h4>
	<div class="order_tour_price">
		<p class="order_tour_price_heading">Tour price</p>
		<p class="order_tour_price_value">
			<?php echo $regular_price;	 ?> USD </p>
		<p class="order_tour_price_hint">*per person</p>				
	</div>
</div>	
<hr class="order_horisontal_line">


<div class="order_form_wrap">
	<div class="order_steps">
<form class="order_tour_form">
		<!-- start slide 1  -->
			<div class="order_tour_slide1">				
				<h4 class="order_step_heading">Step 1 of 4<span class="order_step_heading_hint">Order information</span></h4>
					<div class="order_group_info">
						<h5 class="order_group_info_heading">Group size</h5>
						<div class="order_group_info_size">
							<input class="order_group_info_size_input" type="number" name="size_group" placeholder="00" value="<?php echo trim($group_size); ?>">
						</div>
						<div class="group_leader_checkbox">
							<input id="group_leader" type="checkbox" value="Group leader" name="groupleader" <?php if($leader_s){echo 'checked';} ?>>
							<label class="order_group_leader_check" for="group_leader">I'm group leader</label>
						</div>
					</div>
					<div class="order_persons_info">
						<h4 class="order_persons_info_heading">Age numbers of participants</h4>
						<div class="order_persons_info_wrap">
							<div class="order_persons_info_adults">
								<h5 class="order_persons_info_name">Adults</h5>
								<input class="order_persons_info_quantity order_adults_quantity" type="number" name="adult_value" placeholder="00" value="<?php echo trim($adult_s); ?>">
							</div>
							<div class="order_persons_info_children">
								<h5 class="order_persons_info_name">Children</h5>
								<input class="order_persons_info_quantity order_children_quantity" type="number" name="children_value" placeholder="00" value="<?php echo trim($children_s); ?>">
							</div>
							<div class="order_persons_info_elderly">
								<h5 class="order_persons_info_name">Elderly</h5>
								<input class="order_persons_info_quantity order_elderly_quantity" type="number" name="elderly_value" placeholder="00" value="<?php echo trim($elderly_s); ?>">
							</div>
							
						</div>
						
					</div>
					<!-- order room reserve -->
					<div class="order_rooms_info">
						<h4 class="order_rooms_info_heading">Amount of rooms by capacity</h4>
						<div class="order_rooms_info_wrap">
							<div class="order_rooms_info_single">
								<h5 class="order_rooms_info_name">Single</h5>
								<input class="order_rooms_info_quantity order_single_quantity" type="number" name="single_value" placeholder="00" value="<?php echo trim($single_s); ?>">
							</div>
							<div class="order_rooms_info_double">
								<h5 class="order_rooms_info_name">Double</h5>
								<input class="order_rooms_info_quantity order_double_quantity" type="number" name="double_value" placeholder="00" value="<?php echo trim($double_s); ?>">
							</div>
							<div class="order_rooms_info_double">
								<h5 class="order_rooms_info_name">Twin</h5>
								<input class="order_rooms_info_quantity order_twin_quantity" type="number" name="twin_value" placeholder="00" value="">
							</div>						
						</div>					
					</div>
					<!-- Interested in tour configuring? -->
					<div class="order_tour_configuring">
						<input id="order_tour_configuring_info" type="checkbox" value="Interested in tour configuring!" name="tour_configuration" <?php if($configure_s){echo 'checked';} ?>>
						<label class="order_tour_configuring_label" for="order_tour_configuring_info">Interested in tour configuring?</label>
					</div>
					<!-- spacial requairment -->
					<div class="order_special_requirements">
						<h4 class="order_special_requirements_heading">Special requirements</h4>
						<div class="order_special_requirements_desc">
							<textarea class="order_special_requirements_area" rows="7" cols="45" name="requirement" ><?php echo $requirement_s; ?></textarea>							
							<?php //the_field('special_requirements'); ?>							
						</div>					
					</div>
				</div>
		<!-- end slide 1 -->
		<!-- START SLIDE 2 -->
				<div class="order_tour_slide2">
					<h4 class="order_step_heading order_step2_heading">Step 2 of 4<span class="order_step_heading_hint">Order information</span></h4>
					<div class="order_tour_slide2_block">
						<h4 class="order_persons_info_sec_info">First Name*</h4>
						<input class="order_persons_info_sec_input order__data_firstname" type="text" name="first_name" value="<?php echo $user_name; ?>" placeholder="Bengamin">						
					</div>
					<div class="order_tour_slide2_block">
						<h4 class="order_persons_info_sec_info">Last Name*</h4>
						<input class="order_persons_info_sec_input order__data_lastname" type="text" value="<?php echo $user_lastname; ?>" name="last_name" placeholder="Jons">						
					</div>
					<div class="order_tour_slide2_block">
						<h4 class="order_persons_info_sec_info">Phone Number*</h4>
						<input class="order_persons_info_sec_input order__data_phone" type="phone" value="<?php echo $user_phone; ?>" name="phone_number" placeholder="0 800 9876543">						
					</div>
					<div class="order_tour_slide2_block">
						<h4 class="order_persons_info_sec_info">Email*</h4>
						<input class="order_persons_info_sec_input order__data_mail" type="mail" name="email" value="<?php echo $user_mail; ?>" placeholder="bengamin@mail.com">						
					</div>
					<div class="order_tour_slide2_block">
						<h4 class="order_persons_info_sec_info">Date of Birth*</h4>
						<input class="order_persons_info_sec_input order_persons_birthday_day" value="<?php echo $user_birthday1;  ?>"  type="text" name="birthday_day"   placeholder="Date">
						<input class="order_persons_info_sec_input order_persons_birthday_mounth" value="<?php echo $user_birthday2;  ?>" type="text" name="birthday_mounth"  placeholder="Month">
						<input class="order_persons_info_sec_input order_persons_birthday_year" value="<?php echo $user_birthday3;  ?>"  type="text" name="birthday_year" placeholder="Year">
					
					</div>
					<div class="order_tour_slide2_block">
						<h4 class="order_persons_info_sec_info">Sex</h4>
						<input id="order_tour_male" class="order_tour_mail_check" <?php if(strtolower($user_sex) == 'male'){echo 'checked';} ?> type="radio" name="Sex" value="Male">
						<label class="order_tour_label_radio" for="order_tour_male">Male</label>
						<input id="order_tour_female" class="order_tour_mail_check" <?php if(strtolower($user_sex) != 'male'){echo 'checked';} ?> type="radio" name="Sex" value="Female">	
						<label class="order_tour_label_radio" for="order_tour_female">Female</label>					
					</div>
					<div class="order_tour_slide2_block">
						<h4 class="order_persons_info_sec_info">Country*</h4>
						<input class="order_persons_info_sec_input order__data_country" type="text" value="<?php echo $user_country; ?>" name="data_country" placeholder="Country">						
					</div>
					<div class="order_tour_slide2_block">
						<h4 class="order_persons_info_sec_info">City*</h4>
						<input class="order_persons_info_sec_input order__data_city" type="text" value="<?php echo $user_city; ?>" name="data_city" placeholder="City">						
					</div>
					<div class="order_tour_slide2_block">
						<h4 class="order_persons_info_sec_info">Company Name*</h4>
						<input class="order_persons_info_sec_input order__data_company" type="text" name="data_company" value="<?php echo $user_company; ?>" placeholder="Company Name">						
					</div>
				</div>
		<!-- END SLIDE 2 -->
		<!-- SLIDE 3 -->
				<div class="order_tour_slide3">
					<h4 class="order_step_heading order_step2_heading">Step 3 of 4<span class="order_step_heading_hint">check information</span></h4>
					<h4 class="order_information">order information<span class="order_information_edit">Edit <img class="order_edit_image" src="<?php echo get_template_directory_uri(); ?>/img/order/edit icon_tour order steps.svg"></span></h4>
					<div class="order_information_block">
						<div class="order_information_block_item">
							<span class="">Group size</span>
							<span class="order_information_number order__group_size">0</span>
						</div>
						<div class="order_information_block_item">
							<input id="order_information_group_leader" class="order_information_group_leader" type="checkbox" name="">
							<label class="order_information_leader_label" for="order_information_group_leader">I'm group leader</label>
						</div>
												
					</div>
					<div class="order_information_block">
						<h5 class="order_partipiant_info_heading">Age numbers of participants</h5>
						<div class="order_information_block_item">
							<span class="">Adults</span>
							<span class="order_information_number oder_adult_info">3</span>
						</div>
						<div class="order_information_block_item">
							<span class="">Children</span>
							<span class="order_information_number oder_kids_info">2</span>
						</div>
						<div class="order_information_block_item">
							<span class="">Elderly</span>
							<span class="order_information_number oder_elderly_info">4</span>
						</div>										
					</div>

					<div class="order_information_block">
						<h5 class="order_partipiant_info_heading order__rooms_heading">Amount of rooms by capacity</h5>
						<div class="order_information_block_item">
							<span class="">Single</span>
							<span class="order_information_number order_single_room"></span>
						</div>
						<div class="order_information_block_item">
							<span class="">Double</span>
							<span class="order_information_number order_double_room"></span>
						</div>	
						<div class="order_information_block_item">
							<span class="">Twin</span>
							<span class="order_information_number order_twin_room"></span>
						</div>												
					</div>

					<div class="order_information_block order_configuration_check">
						<input class="order_configuration_checkbox" id="order_configuration_checkbox" type="checkbox" name="">
						<label class="order_configuration_check_label" for="order_configuration_checkbox">Interested in tour configuring?</label>																	
					</div>

					<div class="order_information_block order_spec_require">
							<h5 class="order_partipiant_info_heading order_spec_require_heading">Special requirements</h5>
							<div class="order_spec_require_description">
								<?php //the_field('special_requirements_second'); ?>	
							</div>															
					</div>
					<h4 class="order_customer_information">Customer information<span class="order_customer_information_edit">Edit <img class="order_edit_image" src="<?php echo get_template_directory_uri(); ?>/img/order/edit icon_tour order steps.svg"></span></h4>
					<div class="order_customer_block_item">
						<span class="order_customer_block_name order_customer_block_firstname">First Name*</span>
						<span class="order_customer_block_desc order_customer__firstname"></span>
					</div>
					<div class="order_customer_block_item">
						<span class="order_customer_block_name order_customer_block_lastname">Last Name*</span>
						<span class="order_customer_block_desc order_customer__lastname"></span>
					</div>
					<div class="order_customer_block_item">
						<span class="order_customer_block_name order_customer_block_phone">Phone Number*</span>
						<span class="order_customer_block_desc order_customer__phone"></span>
					</div>
					<div class="order_customer_block_item">
						<span class="order_customer_block_name order_customer_block_lastname">Email*</span>
						<span class="order_customer_block_desc order_customer__mailname"></span>
					</div>
					<div class="order_customer_block_item">
						<span class="order_customer_block_name order_customer_block_birthday">Date of Birth*</span>
						<span class="order_customer_block_desc order_customer__birthday"></span>
					</div>
					<div class="order_customer_block_item">
						<span class="order_customer_block_name order_customer_block_sex">Sex</span>
						<span class="order_customer_block_desc order_customer__sex">Male</span>
					</div>
					<div class="order_customer_block_item">
						<span class="order_customer_block_name order_customer_block_country">Country*</span>
						<span class="order_customer_block_desc order_customer__country"></span>
					</div>
					<div class="order_customer_block_item">
						<span class="order_customer_block_name order_customer_block_city">City*</span>
						<span class="order_customer_block_desc order_customer__city"></span>
					</div>
					<div class="order_customer_block_item">
						<span class="order_customer_block_name order_customer_block_company">Company Name*</span>
						<span class="order_customer_block_desc order_customer__company"></span>
					</div>

					<div class="order_ready_buy_block">
						<div class="order_ready_buy_block_top_desc">
							From the East to the West of Ukraine, from the glorious Kiev to
 							the powerful Carpathians, from the magical city of Lviv Ukrainian people.
						</div>
						<div class="order_ready__make_step">
							<input id="order_ready__buy" type="radio" name="method_buy" value="" checked="checked">
							<label class="order_ready__buy" for="order_ready__buy">I'm ready to buy a tour<span>* You will pay 100% of tour price</span></label>
							<input id="order_ready__book" type="radio" name="method_buy" value="BOOK30">
							<label class="order_ready__book" for="order_ready__book">I'm ready to book a tour<span>* You will pay 10% of tour price</span></label>
							<input id="order_ready__request" type="radio" name="method_buy" value="REQUEST">
							<label class="order_ready__request" for="order_ready__request">I'm not sure, I want to "Request for Quote"<span>* After passing order steps, you’ll be able to submit order</span></label>
						</div>
						<div class="order_ready__buy_agreement">
							<input id="order_ready__agreement_box" type="checkbox" name="" checked="checked">
							<label class="order_ready__agreement_label" for="order_ready__agreement_box">I have read this Agreement and agree to the <a href="">terms and conditions</a></label>
							
						</div>
						<div class="order_ready_buy_block_bottom_desc">
							 <?php the_field('buy_block_description'); ?>
						</div>
						
					</div>


				</div>
			</form>
		<!-- END SLIDE 3 -->

		<!-- buttons block -->
		<div class="order_buttons">
			<div class="order_buttons_quit order_buttons_quit_quit" onclick="window.history.back();">Quit</div>
			<div class="order_buttons_quit order_buttons_back">Back</div>
			<div class="order_buttons_save">Save</div>
			<div class="order_buttons_separator"></div>
			<div class="order_buttons_next_step order__make_next">Next Step</div>
			<div  class="order_buttons_next_step order__make_order">Make Order</div>
		</div>
		<!-- =========spiner=========== -->
		
		<div class="order_wraper_spiner"><div class="order_spiner_item"></div></div>
			<script type="text/javascript">


(function(){
	// =========================Create REQUEST order====================
				jQuery('.order__make_order').click(function(){
					// debugger;
					var chId = jQuery('.order_ready__make_step input[name="method_buy"]:checked').attr('id');
					jQuery('.order_wraper_spiner').css('display','flex');
					if(chId == 'order_ready__buy'){						
							jQuery.get(''+ MyAjax.home_url+'/order-tour/?remove_coupon=book30').done(function(){
								jQuery('#place_order').trigger('click');
							});
					
					} else if(chId == 'order_ready__book'){
						jQuery('#place_order').trigger('click');
					} else {
							var data = {
								action: 'tourrequest',
								prod_id: '<?php echo $tourID; ?>',
								size_group: 	document.querySelector('[name="size_group"]').value,
								groupleader: 	document.querySelector('[name="groupleader"]:checked').value,
								adult_value: 	document.querySelector('[name="adult_value"]').value,
								children_value: document.querySelector('[name="children_value"]').value,
								elderly_value: 	document.querySelector('[name="elderly_value"]').value,
								single_value: 	document.querySelector('[name="single_value"]').value,
								double_value: 	document.querySelector('[name="double_value"]').value,
								tour_configuration: document.querySelector('[name="tour_configuration"]:checked').value,
								requirement: 	document.querySelector('[name="requirement"]').value,

								first_name: 	document.querySelector('[name="first_name"]').value,
								last_name: 		document.querySelector('[name="last_name"]').value,
								phone_number: 	document.querySelector('[name="phone_number"]').value,
								custom_email: 	document.querySelector('[name="email"]').value,
								birthday_day: 	document.querySelector('[name="birthday_day"]').value,
								birthday_mounth: document.querySelector('[name="birthday_mounth"]').value,
								birthday_year: 	document.querySelector('[name="birthday_year"]').value,
								male: 			document.querySelector('[name="Sex"]:checked').value,
								data_country: 	document.querySelector('[name="data_country"]').value,
								data_city: 		document.querySelector('[name="data_city"]').value,
								data_company: 	document.querySelector('[name="data_company"]').value,
								method_buy: 	document.querySelector('[name="method_buy"]').value,
								twin: document.querySelector('.order_twin_quantity[name="twin_value"]').value,

							}; 
							jQuery.post({ url:MyAjax.ajaxurl, data:data, success:function(response) {						
									window.location.href = window.location.href = MyAjax.home_url+'/register/';

								}, error:function(jqXHR, exception){
								 window.location.href = window.location.href = MyAjax.home_url+'/register/'; },
							});
					}
				});

/*
 * =====================COMENT AS NOT USED
 */

				// =========================Create SAVE order====================
				jQuery('.order_buttons_save').click(function(){
					jQuery('.order_wraper_spiner').css('display','flex');
					var savedata = {
							action: 'saveorder',
							postId: '<?php echo $tourID ?>',
							size_group: 	document.querySelector('[name="size_group"]').value,
							adult_value: 	document.querySelector('[name="adult_value"]').value,
							children_value: document.querySelector('[name="children_value"]').value,
							elderly_value: 	document.querySelector('[name="elderly_value"]').value,
							single_value: 	document.querySelector('[name="single_value"]').value,
							double_value: 	document.querySelector('[name="double_value"]').value,
							group_leader: 	document.querySelector('[name="groupleader"]:checked').value,
							requirement: 	document.querySelector('[name="requirement"]').value,
							configuration: document.querySelector('[name="tour_configuration"]:checked').value,
							first_name: 	document.querySelector('[name="first_name"]').value,
							last_name: 		document.querySelector('[name="last_name"]').value,
							phone_number: 	document.querySelector('[name="phone_number"]').value,
							custom_email: 	document.querySelector('[name="email"]').value,
							birthday_day: 	document.querySelector('[name="birthday_day"]').value,
							birthday_mounth: document.querySelector('[name="birthday_mounth"]').value,
							birthday_year: 	document.querySelector('[name="birthday_year"]').value,
							male: 			document.querySelector('[name="Sex"]:checked').value,
							data_country: 	document.querySelector('[name="data_country"]').value,
							data_city: 		document.querySelector('[name="data_city"]').value,
							data_company: 	document.querySelector('[name="data_company"]').value,
							method_buy: 	document.querySelector('[name="method_buy"]').value,
							twin: document.querySelector('.order_twin_quantity[name="twin_value"]').value,
							//orderData: jQuery('.order_tour_form').serialize(),
						};

						 console.log(savedata);
						jQuery.post({ url:MyAjax.ajaxurl, data:savedata, success:function(response) {
							window.location.href = MyAjax.home_url+'/register/';
							}, error:function(jqXHR, exception){ 
								window.location.href = MyAjax.home_url+'/register/';
							},
						});
				});

		})();
					
			</script>
		
		<p class="order_buttons_save_hint">*Data will be saved to your acount</p>
	</div>
</div>	<!-- order_form_wrap -->
</div> <!-- order_tour -->
</div>
<script type="text/javascript">
	
	// ==================================
	// Put this in a document ready event
	// jQuery( document ).ajaxComplete(function( event, xhr, settings ) {

	//   // console.log( settings.url );
	  
	//   // settings.url tells us what event this is, so we can choose what code we need to run
	//   if( settings.url.indexOf('update_order_review') > -1 ) {

	//   	// update order form
	//   	doTotalUpdates();

	//   } else if( settings.url.indexOf('wc-ajax=checkout') > -1 ) {
	//   	// Add messages after checkout here
	//         doAfterCheckout();
	//   }

	// });
</script>

<script type="text/javascript">
	;(function(){
		var startPoint = 1;
		showOrderstep();
		jQuery('.order_buttons_next_step').click(function(){
			if(startPoint<=3){startPoint++;}
			// ==========================ORDER FORM VAlIDATION ==================================
			var email = false;
			var phone = false;
			var firstN = false;
			var lastN = false;
			var warningWraper = document.querySelector('.order_alert_message');


			if(startPoint == 3){
				document.querySelector('.order_alert_message').innerHTML = "";
				if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(jQuery('.order__data_mail').val())){
					email = true;
				} 
 
			    var regex = new RegExp("^[0-9\+]{1,}[0-9\- ]{3,15}$");
			    phone = regex.test(jQuery('.order__data_phone').val()); 

			    if(jQuery('.order__data_firstname').val() == ""){
			    	startPoint = 2;
					warningWraper.innerHTML += '<p class="order_warning_message order_warning_firstn">You have entered invalid First Name!</p>';
			    } else {
			    	firstN = true;
			    	
			    } 
			    if(jQuery('.order__data_lastname').val() == ""){
			    	startPoint = 2;
					warningWraper.innerHTML += '<p class="order_warning_message order_warning_lastn">You have entered invalid Last Name!</p>';
			    }else {
			    	lastN = true;			    	
			    } 
				if(!email){
					startPoint = 2;
					warningWraper.innerHTML += '<p class="order_warning_message order_warning_mail">You have entered invalid email address!</p>'; 
				}
				if(!phone){
					startPoint = 2;
					warningWraper.innerHTML += '<p class="order_warning_message order_warning_phone">You have entered invalid phone number!</p>'; 
				} 
			} 
			
			showOrderstep();    
	});
		jQuery('.order_buttons_back').click(function(){
			if(startPoint>1){startPoint--;} 
			showOrderstep();    
	});
	document.querySelector('.order_customer_information_edit').addEventListener('click', function(){ startPoint = 2; showOrderstep();});
	document.querySelector('.order_information_edit').addEventListener('click', function(){ startPoint = 1; showOrderstep();});
	
	function showOrderstep(){
		function El(a){return document.querySelector(''+a+'');}	

		function repEl(a, b){return document.querySelector(''+a+'').innerText = document.querySelector(''+b+'').value;}		

		// ==============================WRITE DATA FROM FORM ===========================================
			
			if(startPoint == 1){
				jQuery('.order_tour_slide1, .order_buttons_quit_quit, .order__make_next').css('display', 'block');
				jQuery('.order_tour_slide2, .order_tour_slide3, .order_buttons_back, .order__make_order').css('display', 'none');
			} else if(startPoint == 2){
				jQuery('.order_tour_slide2, .order_buttons_back, .order__make_next').css('display', 'block');
				jQuery('.order_tour_slide1, .order_tour_slide3, .order_buttons_quit_quit, .order__make_order').css('display', 'none');
			}else if(startPoint == 3){

				var firstname = jQuery('.order__data_firstname').val();
				var lastname = jQuery('.order__data_lastname').val();
				var phoneNumber = jQuery('.order__data_phone').val();
				var custEmail = jQuery('.order__data_mail').val();
				var custBirthday = jQuery('.order_persons_birthday_day').val()+" "+jQuery('.order_persons_birthday_mounth').val()+" "+jQuery('.order_persons_birthday_year').val();
				var country = jQuery('.order__data_country').val();
				var city = jQuery('.order__data_city').val();				
				var company = jQuery('.order__data_company').val();
				var groupSize = jQuery('.order_group_info_size_input').val();
				var adult = jQuery('.order_adults_quantity').val();
				var kids = jQuery('.order_children_quantity').val();
				var elderly = jQuery('.order_elderly_quantity').val();
				var single = jQuery('.order_single_quantity').val();
				var double = jQuery('.order_double_quantity').val();
				var requiremen = jQuery('.order_special_requirements_area').val();
				var leader = jQuery('#group_leader').val();
				var configuration = jQuery('#order_tour_configuring_info').val();
				var twin = document.querySelector('.order_twin_quantity[name="twin_value"]').value;

				if(document.querySelector('#group_leader').checked){
					El('#order_information_group_leader').checked = true;
				}

				if(El('#order_tour_configuring_info').checked){
					El('#order_configuration_checkbox').checked = true;
				}

				if(groupSize){
					El('.order__group_size').innerText = groupSize;
				} else{
					El('.order__group_size').innerText = 0;
				}
				
				repEl('.oder_kids_info', '.order_children_quantity');
				repEl('.oder_elderly_info', '.order_elderly_quantity');
				repEl('.order_single_room', '.order_single_quantity');
				repEl('.order_double_room', '.order_double_quantity');
				repEl('.order_twin_room', '.order_twin_quantity');
				
				// repEl('.order_special_requirements_desc', '.order_special_requirements_area');			


				El('.oder_adult_info').innerText = adult;
				El('.order_customer__firstname').innerText = firstname;
				El('.order_customer__lastname').innerText = lastname;
				El('.order_customer__phone').innerText = phoneNumber;
				El('.order_customer__mailname').innerText = custEmail;
				El('.order_customer__birthday').innerText = custBirthday;
				El('.order_customer__country').innerText = country;
				El('.order_customer__city').innerText = city;
				El('.order_customer__company').innerText = company;
				// El('.order_customer__sex').innerText = "";

				var tour_s = '';
				if(document.getElementById("order_tour_male").checked){
					tour_s = 'Male';
					El('.order_customer__sex').innerText = 'Male';
					jQuery('#billing_sex').val('Male');
				}
				if(document.getElementById("order_tour_female").checked){
					tour_s = 'Female';
					El('.order_customer__sex').innerText = 'Female';
					jQuery('#billing_sex').val('Female');
				}

				jQuery('#billing_first_name').val(firstname);
				jQuery('#billing_last_name').val(lastname);
				jQuery('#billing_company').val(company);
				jQuery('#billing_phone').val(phoneNumber);
				jQuery('#billing_city').val(city);
				jQuery('#billing_email').val(custEmail);
				jQuery('#billing_state').val(country);
				
				jQuery('#billing_date_birthday').val(jQuery('.order_persons_birthday_day').val());
				jQuery('#billing_month_birthday').val(jQuery('.order_persons_birthday_mounth').val());
				jQuery('#billing_year_birthday').val(jQuery('.order_persons_birthday_year').val());

				jQuery('#order_comments').val(''+leader+'; '+configuration+'; Birthday:'+custBirthday+';  Sex:'+tour_s+';  Group size:'+groupSize+'; Adults:'+adult+'; Children:'+kids+'; Elderly:'+elderly+'; Single:'+single+'; Double:'+double+'; Twin:'+twin+'; Special requirements:'+requiremen+'');

				jQuery('.order_tour_slide3, .order_buttons_back, .order__make_order').css('display', 'block');
				jQuery('.order_tour_slide2, .order_tour_slide1, .order_buttons_quit_quit, .order__make_next').css('display', 'none');
			}
		}
	})();
</script>
<?php get_footer('order') ?>