		<?php
/*
*Template Name: Paused Order tour
*/
?>
<?php 
	global $product, $woocommerce;

	$tourID = $_GET['tour_id'];
	$par_prod = wp_get_post_parent_id( $tourID );
	if(!$tourID || ($par_prod == NULL || !$par_prod)){
		wp_redirect('/');
	} else {
		
		$prodObj = new WC_Product_Variable( $par_prod );
		$prod_variation = new WC_Product_Variation($tourID);
		$regular_price = $prod_variation ->regular_price;
		$variation = wc_get_product($tourID);
		$tour_atr_name = $variation->get_variation_attributes();
	}
?>
<?php get_header('order') ?>
<div class="woocommerce order_tour_woocommerce">
	<?php echo do_shortcode('[woocommerce_cart]'); ?>
	<?php echo do_shortcode('[woocommerce_checkout]'); ?>
</div>




<?php
 if ( isset( $_GET['tour_id'] ) ) {
		global $woocommerce;
		$woocommerce->cart->empty_cart();
		$woocommerce->cart->add_to_cart($_GET['tour_id']);
		$woocommerce->cart->add_discount( sanitize_text_field( 'booknext10' ));
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

		<!-- end slide 1 -->
		<!-- START SLIDE 2 -->

		<!-- END SLIDE 2 -->
		<!-- SLIDE 3 -->

</form>
		<!-- END SLIDE 3 -->

		<!-- buttons block -->
		<div class="order_buttons">
			<!-- <div class="order_buttons_quit order_buttons_quit_quit" onclick="window.history.back();">Quit</div>
			<div class="order_buttons_quit order_buttons_back">Cancel</div>
			<div class="order_buttons_save">Save</div> -->
			<div class="order_buttons_separator"></div>
			<div class="order_buttons_next_step order__make_next">Cancel</div>
			<div  class="order_buttons_next_step order__make_order">Make Order</div>
		</div>
		<!-- =========spiner=========== -->
		
		<div class="order_wraper_spiner"><div class="order_spiner_item"></div></div>
			<script type="text/javascript">


						jQuery('.order_buttons_next_step.order__make_order').click(function(){
						jQuery('#place_order').trigger('click');
						jQuery('.order_wraper_spiner').css('display','flex');
					});
			
			
			</script>
		
		<p class="order_buttons_save_hint">*Data will be saved to your acount</p>
	</div>
</div>	<!-- order_form_wrap -->
</div> <!-- order_tour -->
</div>
<script type="text/javascript">
	
	// ==================================
	// Put this in a document ready event
	jQuery( document ).ajaxComplete(function( event, xhr, settings ) {

	  console.log( settings.url );
	  
	  // settings.url tells us what event this is, so we can choose what code we need to run
	  if( settings.url.indexOf('update_order_review') > -1 ) {

	  	// update order form
	  	doTotalUpdates();

	  } else if( settings.url.indexOf('wc-ajax=checkout') > -1 ) {
	  	// Add messages after checkout here
	        doAfterCheckout();
	  }

	});
</script>

<?php get_footer('order') ?>