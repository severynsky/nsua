<?php
//register menus
register_nav_menus(array(
    'main_menu' => 'Main menu',
    'foot_menu' => 'Footer menu'
));

//Custom images sizes
add_image_size( 'advantage', '728', '652', true );
// add_image_size( 'home_link_cols', '1068', '700', true );
add_image_size( 'home_techniques', '1200', '675', true );
add_image_size( 'top_default', '1920', '302', true );

// add theme suport woocommerce
add_theme_support( 'woocommerce' );

// google api key ACF
function my_acf_init() {	
	acf_update_setting('google_api_key', 'AIzaSyALaAPhN1wW_BfTEP0HK-osPc-eSfXQWso');
}
add_action('acf/init', 'my_acf_init');

//register acf_options
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Theme Header Settings',
    //     'menu_title'    => 'Header',
    //     'parent_slug'   => 'theme-general-settings',
    // ));
    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Theme Footer Settings',
    //     'menu_title'    => 'Footer',
    //     'parent_slug'   => 'theme-general-settings',
    // ));
}

// allow svg upload
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

//***						***
//***		WOOCOMMERCE		***
//***						***
//==========================================
add_action( 'after_setup_theme', 'remove_pgz_theme_support', 100 );

function remove_pgz_theme_support() { 
	add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
}

function remove_product_description_heading() {
 return '';
}
function woocommerce_template_single_title(){;}
function woocommerce_output_product_data_tabs(){;}
function woocommerce_template_single_rating(){;}
function woocommerce_template_single_price(){;}
function woocommerce_template_single_excerpt(){;}
function woocommerce_template_single_meta(){;}
function woocommerce_template_single_sharing(){;}
function woocommerce_show_product_sale_flash(){;}
//function (){;}
//function (){;}

// ========================RETURN HOME URL from cart
function wc_empty_cart_redirect_url() {
	return home_url('/');
}
add_filter( 'woocommerce_return_to_shop_redirect', 'wc_empty_cart_redirect_url' );
//==========================
  

// ======================== Additional USER meta
/**
 * Add the field to the checkout page
 */
add_action('woocommerce_after_order_notes', 'customise_checkout_field');
 
function customise_checkout_field($checkout)
{
	echo '<div id="customise_checkout_field"><h2>' . __('Sex') . '</h2>';
	woocommerce_form_field('billing_sex', array(
		'type' => 'text',
		'class' => array(
			'my-field-class form-row-wide'
		) ,
		'label' => __('Sex') ,
		'placeholder' => __('Please fill') ,
		'required' => false,
	) , $checkout->get_value('billing_sex'));
	echo '</div>';

	echo '<div id="customise_checkout_field"><h2>' . __('Date Birthday') . '</h2>';
	woocommerce_form_field('billing_date_birthday', array(
		'type' => 'text',
		'class' => array(
			'my-field-class form-row-wide'
		) ,
		'label' => __('Data Birthday') ,
		'placeholder' => __('Please fill') ,
		'required' => false,
	) , $checkout->get_value('billing_date_birthday'));
	echo '</div>';

	echo '<div id="customise_checkout_field"><h2>' . __('Month Birthday') . '</h2>';
	woocommerce_form_field('billing_month_birthday', array(
		'type' => 'text',
		'class' => array(
			'my-field-class form-row-wide'
		) ,
		'label' => __('Month Birthday') ,
		'placeholder' => __('Please fill') ,
		'required' => false,
	) , $checkout->get_value('billing_month_birthday'));
	echo '</div>';


	echo '<div id="customise_checkout_field"><h2>' . __('Year Birthday') . '</h2>';
	woocommerce_form_field('billing_year_birthday', array(
		'type' => 'text',
		'class' => array(
			'my-field-class form-row-wide'
		) ,
		'label' => __('Year Birthday') ,
		'placeholder' => __('Please fill') ,
		'required' => false,
	) , $checkout->get_value('billing_year_birthday'));
	echo '</div>';

}
// =====================================

/**
 * Update value of field
 */

add_action('woocommerce_checkout_update_order_meta', 'customise_checkout_field_update_order_meta');

function customise_checkout_field_update_order_meta($order_id)
{ 	$user = get_current_user_id();
	if (!empty($_POST['billing_sex'])) {		
		update_post_meta($order_id, 'billing_sex', sanitize_text_field($_POST['billing_sex']));
		update_user_meta( $user, 'billing_sex', sanitize_text_field($_POST['billing_sex']) );		
	}

	if (!empty($_POST['billing_sex'])) {		
		update_post_meta($order_id, 'billing_date_birthday', sanitize_text_field($_POST['billing_date_birthday']));		
		update_user_meta( $user, 'billing_date_birthday', sanitize_text_field($_POST['billing_date_birthday']) );		
	}

	if (!empty($_POST['billing_sex'])) {		
		update_post_meta($order_id, 'billing_month_birthday', sanitize_text_field($_POST['billing_month_birthday']));		
		update_user_meta( $user, 'billing_month_birthday', sanitize_text_field($_POST['billing_month_birthday']) );		
	}

	if (!empty($_POST['billing_sex'])) {		
		update_post_meta($order_id, 'billing_year_birthday', sanitize_text_field($_POST['billing_year_birthday']));
		update_user_meta( $user, 'billing_year_birthday', sanitize_text_field($_POST['billing_year_birthday']) );
	}
}

//=========================add coupon by URL


add_action( 'woocommerce_before_checkout_form', 'add_discout_to_checkout', 10, 0 );
function add_discout_to_checkout( ) {

    $coupon_code = WC()->session->get('coupon_code');
    if ( ! empty( $coupon_code ) && ! WC()->cart->has_discount( $coupon_code ) ){
        WC()->cart->add_discount( $coupon_code ); // apply the coupon discount
        WC()->session->__unset('coupon_code'); // remove coupon code from session
    }
}
//=========================Make order for REQUEST
add_action('wp_footer','create_coocies_tour');

function create_coocies_tour(){
	 $user = get_current_user_id();
	WC()->session->set('my_id', $user);
}


add_action('wp_ajax_tourrequest', 'create_order');
add_action('wp_ajax_nopriv_tourrequest', 'create_order');
function create_order(){
	$ses_id = WC()->session->get('my_id');
	//!empty($ses_id)
	    if( true ){
	    	$prod_id = intval( $_POST['prod_id']);
	    	if($prod_id != 0){

	    		$curent_name = sanitize_text_field($_POST['first_name']);
				$curent_lastn = sanitize_text_field($_POST['last_name']);
				$curent_phone = sanitize_text_field($_POST['phone_number']);
				$curent_email = sanitize_text_field($_POST['custom_email']);
				$curent_birthday_day = sanitize_text_field($_POST['birthday_day']);
				$curent_birthday_mounth = sanitize_text_field($_POST['birthday_mounth']);
				$curent_birthday_year = sanitize_text_field($_POST['birthday_year']);
				$curent_sex = sanitize_text_field($_POST['male']);
				$curent_country = sanitize_text_field($_POST['data_country']);
				$curent_city = sanitize_text_field($_POST['data_city']);
				$curent_company = sanitize_text_field($_POST['data_company']);
				$curent_street = sanitize_text_field($_POST['data_city']);
				$curent_zip = '';

				$groupleader = sanitize_text_field($_POST['groupleader']);
				$tour_configuration = sanitize_text_field($_POST['tour_configuration']);
				$size_group = sanitize_text_field($_POST['size_group']);
				$adult_value = sanitize_text_field($_POST['adult_value']);
				$children_value = sanitize_text_field($_POST['children_value']);
				$elderly_value = sanitize_text_field($_POST['elderly_value']);
				$single_value = sanitize_text_field($_POST['single_value']);
				$double_value = sanitize_text_field($_POST['double_value']);
				$twin_value = sanitize_text_field($_POST['twin']);
				$requirement = sanitize_text_field($_POST['requirement']);
				$method_buy = sanitize_text_field($_POST['method_buy']);
				

	    		$default_args = array(
					'status'        => 'wc-request',
				);
				$address = array(
					'first_name' => $curent_name,
			        'last_name'  => $curent_lastn,
			        'company'    => $curent_company,
			        'email'      => $curent_email,
			        'phone'      => $curent_phone,
			        'address_1'  => $curent_street,
			        'address_2'  => '', 
			        'city'       => $curent_city,
			        'state'      => '',
			        'postcode'   => $curent_zip,
			        'country'	 => $curent_country
				);
	    		
	    		$order = wc_create_order($default_args);
			    $order->set_created_via("subscription");
			    $product = wc_get_product($prod_id);
			    $order->add_product($product, 1);
			    $order->set_address( $address, 'billing' );
			    $order_id = $order->get_id();
			    // var_dump($order);
			    update_post_meta($order->get_id(), '_customer_user', $ses_id);

			    // additional order meta
			    wc_add_order_item_meta($order_id, 'curent_sex', $size_group);
			    wc_add_order_item_meta($order_id, 'curent_sex', $adult_value);
			    wc_add_order_item_meta($order_id, 'curent_sex', $children_value);
			    wc_add_order_item_meta($order_id, 'curent_sex', $elderly_value);
			    wc_add_order_item_meta($order_id, 'curent_sex', $single_value);
			    wc_add_order_item_meta($order_id, 'curent_sex', $double_value);
			    wc_add_order_item_meta($order_id, 'curent_sex', $requirement);
			    wc_add_order_item_meta($order_id, 'curent_sex', $method_buy);
			    wc_add_order_item_meta($order_id, 'curent_sex', $tour_configuration);
			    wc_add_order_item_meta($order_id, 'curent_sex', $groupleader);


			    $note = "Group size: " . $size_group . "\n";
			    $note .= $groupleader . "\n";
			    $note .= "Adult(s): " . $adult_value . "\n";
			    $note .= "Children(s): " . $children_value . "\n";
			    $note .= "Elderly: " . $elderly_value . "\n";
			    $note .= "Single : " . $single_value . "\n";
			    $note .= "Double : " . $double_value . "\n";
			    $note .= "Twin : " . $twin_value . "\n";
			    $note .= $tour_configuration . "\n";
			    $note .= "Requirement: " . $requirement . "\n";

			    $note .=  "Birthday: " .$curent_birthday_day . "/";
			    $note .= $curent_birthday_mounth . "/";
			    $note .= $curent_birthday_year . "\n";
			    $note .= "Sex: " . $curent_sex . "\n";

			    // $order->add_order_note( $note );
			    $order->set_customer_note($note);

				// Save the data
				$order->save();

			if($order_id){
			    	remove_all_filters( 'wp_mail_from' );
					remove_all_filters( 'wp_mail_from_name' );

					add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
			    	$admin_email = trim(get_option('admin_email'));
			    	$headers = 'From: Next Step Ukraine <'.$admin_email.'>' . "\r\n";
					$if_send = wp_mail($curent_email, 'Request order', '<div style="text-align:center;"><img style="width:100px; margin:0 auto;" src="'.home_url().'/wp-content/uploads/2018/03/Logo_black.svg"/></div><h1 style="text-align:center;">NEXT STEP UKRAINE</h1><div><table style="width: 100%;"><tr style="background-color:#989; color:#fff; border:solid 1px #456;">	<td><p style="text-align: center;">First name</p></td><td><p style="text-align: center;">Last name</p></td><td><p style="text-align: center;">Company</p></td><td><p style="text-align: center;">Phone</p></td>	<td><p style="text-align: center;">Address</p></td>	<td><p style="text-align: center;">Country</p></td></tr><tr style="border:solid 1px #456;">	<td style="border:1px solid #000;"><p style="text-align: center;">'.$curent_name.'</p></td>	<td style="border:1px solid #000;"><p style="text-align: center;">'.$curent_lastn.'</p></td><td style="border:1px solid #000;"><p style="text-align: center;">'.$curent_company.'</p></td>	<td style="border:1px solid #000;"><p style="text-align: center;">'.$curent_phone.'</p></td><td style="border:1px solid #000;"><p style="text-align: center;">City:'.$curent_city.'; Address:'.$curent_street.'</p></td><td style="border:1px solid #000;"><p style="text-align: center;">'.$curent_country.'</p></td></tr></table><div><p style="text-align: center;">ORDER DETAIL</p><div style="width:100%"><table>
						<tr style="width:100%;">
							<p>Configuration: '.$tour_configuration.'</p>
						</tr>
						<tr style="width:100%;">
							<p>Requirement: '.$requirement.'</p>
						</tr>
						<tr><td style="width:12%;">Group size</td><td style="width:12%;">Group leader</td><td style="width:12%;">Adult</td><td style="width:12%;">Children</td><td style="width:12%;">Elderly</td><td style="width:12%;">Single<br/>apartament</td><td style="width:12%;">Double<br/>apartament</td><td style="width:12%;">Twin<br/>apartament</td></tr>
						<tr><td style="width:12%;">'.$size_group.'</td><td style="width:12%;">'.$groupleader.'</td><td style="width:12%;">'.$adult_value.'</td><td style="width:12%;">'.$children_value.'</td><td style="width:12%;">'.$elderly_value.'</td><td style="width:12%;">'.$single_value.'</td><td style="width:12%;">'.$double_value.'</td><td style="width:12%;">'.$twin_value.'</td></tr>						</table></div></div></div>', $headers);
					
						 
					$headers2 = 'From: Next Step Ukraine <'.$curent_email.'>' . "\r\n";
						wp_mail($admin_email, 'Request order', '<div style="text-align:center;"><img style="width:100px; margin:0 auto;" src="'.home_url().'/wp-content/uploads/2018/03/Logo_black.svg"/></div><h1 style="text-align:center;">NEXT STEP UKRAINE</h1><div><table style="width: 100%;"><tr style="background-color:#989; color:#fff; border:solid 1px #456;">	<td><p style="text-align: center;">First name</p></td><td><p style="text-align: center;">Last name</p></td><td><p style="text-align: center;">Company</p></td><td><p style="text-align: center;">Phone</p></td>	<td><p style="text-align: center;">Address</p></td>	<td><p style="text-align: center;">Country</p></td></tr><tr style="border:solid 1px #456;">	<td style="border:1px solid #000;"><p style="text-align: center;">'.$curent_name.'</p></td>	<td style="border:1px solid #000;"><p style="text-align: center;">'.$curent_lastn.'</p></td><td style="border:1px solid #000;"><p style="text-align: center;">'.$curent_company.'</p></td>	<td style="border:1px solid #000;"><p style="text-align: center;">'.$curent_phone.'</p></td><td style="border:1px solid #000;"><p style="text-align: center;">City:'.$curent_city.'; Address:'.$curent_street.'</p></td><td style="border:1px solid #000;"><p style="text-align: center;">'.$curent_country.'</p></td></tr></table><div><p style="text-align: center;">ORDER DETAIL</p><div style="width:100%"><table>
						<tr style="width:100%;">
							<p>Configuration: '.$tour_configuration.'</p>
						</tr>
						<tr style="width:100%;">
							<p>Requirement: '.$requirement.'</p>
						</tr>
						<tr><td style="width:12%;">Group size</td><td style="width:12%;">Group leader</td><td style="width:12%;">Adult</td><td style="width:12%;">Children</td><td style="width:12%;">Elderly</td><td style="width:12%;">Single<br/>apartament</td><td style="width:12%;">Double<br/>apartament</td><td style="width:12%;">Twin<br/>apartament</td></tr>
						<tr><td style="width:12%;">'.$size_group.'</td><td style="width:12%;">'.$groupleader.'</td><td style="width:12%;">'.$adult_value.'</td><td style="width:12%;">'.$children_value.'</td><td style="width:12%;">'.$elderly_value.'</td><td style="width:12%;">'.$single_value.'</td><td style="width:12%;">'.$double_value.'</td><td style="width:12%;">'.$twin_value.'</td></tr>						</table></div></div></div>', $headers2);
			    }        
	    	}	       
	    }
    wp_die();
   
}
// ==================================SERVICE ORDER=======================
// ======================================================================


// ========================BUY Button JS 
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
function my_scripts_method(){

	wp_enqueue_style( 'Main-style', get_stylesheet_directory_uri().'/style.css' );
	wp_enqueue_style( 'swiper-style', get_stylesheet_directory_uri().'/css/swiper.min.css' );
	wp_enqueue_style( 'aditional-style', get_stylesheet_directory_uri().'/css/aditional.css' );
	wp_enqueue_style( 'swiper-style', get_stylesheet_directory_uri().'/css/swiper.min.css' );
	wp_enqueue_style( 'ui-style', get_stylesheet_directory_uri().'/css/jquery-ui.min.css' );
	wp_enqueue_style( 'wickedpicker', get_stylesheet_directory_uri().'/css/wickedpicker.css' );


	wp_enqueue_script( 'TweenMax', get_template_directory_uri() . '/js/TweenMax.min.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'AttrPlugin', get_template_directory_uri() . '/js/AttrPlugin.min.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'Swiper', get_template_directory_uri() . '/js/swiper.min.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'jquery_ui_script', get_template_directory_uri() . '/js/jquery-ui.min.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'Skrollmagic', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'Scroll_indicator', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'timepicker', '//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'wickedpicker', get_template_directory_uri() . '/js/wickedpicker.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'Main_script', get_template_directory_uri() . '/js/main.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'profile_slider', get_template_directory_uri() . '/js/profile-slider.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'tour_scroll', get_template_directory_uri() . '/js/tour-scroll.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'services', get_template_directory_uri() . '/js/services.js', array('jquery'), NULL, true );
  	wp_enqueue_script( 'my_buyButton', get_template_directory_uri() . '/js/buyButton.js', array('jquery'), NULL, true );
  	
  	// add Ajax url
  	wp_enqueue_script( 'my-ajax-request', get_template_directory_uri() . '/js/custom_script.js' );
	wp_localize_script( 'my-ajax-request', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'home_url' => home_url()) );
}

// ===========================================================================================
// ============================================SAVE ORDER ====================================
// ===========================================================================================
add_action('wp_ajax_saveorder', 'order_save');

function order_save(){

	$prodata = $_POST['orderData'];
	$postId = $_POST['postId'];	
	$curent_name = $_POST['first_name'];
	$curent_lastn = $_POST['last_name'];
	$curent_phone = $_POST['phone_number'];
	$curent_email = $_POST['custom_email'];
	$curent_birthday_day = $_POST['birthday_day'];
	$curent_birthday_mounth = $_POST['birthday_mounth'];
	$curent_birthday_year = $_POST['birthday_year'];
	$curent_sex = $_POST['male'];
	$curent_country = $_POST['data_country'];
	$curent_city = $_POST['data_city'];
	$curent_company = $_POST['data_company'];
	$curent_street = $_POST['data_city'];

	$group_size = $_POST['size_group'];
	$adult =  $_POST['adult_value'];
	$children =  $_POST['children_value'];

	$elderly =  $_POST['elderly_value'];
	$single =  $_POST['single_value'];
	$double =  $_POST['double_value'];
	$requirement =  $_POST['requirement'];
	$leader =  $_POST['group_leader'];
	$configure = $_POST['configuration'];	


	global $woocommerce;

	$curent = get_current_user_id();
	$ses_id = WC()->session->get('my_id');
	    if( !empty($ses_id)){
	    	//$prod_id = intval( $_POST['prod_id']);
	    	$prod_id = $postId;	    	
	    	if($prod_id != 0){

	    		$default_args = array(
					'status'        => 'wc-paused',
					'customer_id'   => $curent,
				);
				$address = array(
					'first_name' => $curent_name,
			        'last_name'  => $curent_lastn,
			        'company'    => $curent_company,
			        'email'      => $curent_email,
			        'phone'      => $curent_phone,
			        'address_1'  => $curent_street,
			        'address_2'  => '', 
			        'city'       => $curent_city,
			        'state'      => '',
			        'postcode'   => $curent_zip,
			        'country'	 => $curent_country
				);
//print_r($address);

	    		
	    		$order = wc_create_order($default_args);
			    $order->set_created_via("subscription");			   

    			// $order->set_address( $address, 'shipping' );
			    $product = wc_get_product($prod_id);
			    $order->add_product($product, 1);
			    $order_id = $order->get_id();
			    $order->set_address( $address, 'billing' );
			    $order->calculate_totals();

			    wc_add_order_item_meta($order_id, 'curent_birthday_day', $curent_birthday_day);
			    wc_add_order_item_meta($order_id, 'curent_birthday_mounth', $curent_birthday_mounth);
			    wc_add_order_item_meta($order_id, 'curent_birthday_year', $curent_birthday_year);
			    wc_add_order_item_meta($order_id, 'curent_sex', $curent_sex);
			   

			    $note =  "Birthday: " .$curent_birthday_day . "/";
			    $note .= $curent_birthday_mounth . "/";
			    $note .= $curent_birthday_year . ";\n";
			    $note .= "Sex: " . $curent_sex . ";\n";
			    $note .= "Group size: " . $group_size . ";\n";
			    $note .= "Adult: " . $adult . ";\n";
			    $note .= "Children: " . $children . ";\n";
			    $note .= "Elderly: " . $elderly . ";\n";
			    $note .= "Single: " . $single . ";\n";
			    $note .= "Double: " . $double . ";\n";
			    $note .= "Requirement: " . $requirement . ";\n";
			    $note .= "Leader: " . $leader . ";\n";
			    $note .= "Configuration: " . $configure . ";\n";			   
			   
			    $order->set_customer_note($note);
				// Save the data
				$order->save();			
	    	}
		}	
				
	wp_die();
}


//====================================================================================================================
//==========================================services CUSTOM POST TYPE====================================================
//====================================================================================================================

function add_faq_posts(){
	register_post_type(
					'faq',
					array(
						'labels' 		=> array(
												'name'					=> 'FAQ',
												'singular_name'			=> 'Post FAQ',
												'add_new'				=> 'Add new FAQ',
												'add_new_item'			=> 'Add new FAQ',
												'edit'					=> 'Edit',
												'edit_item'				=> 'Edit',
												'new_item'				=> 'New FAQ',
												'view'					=> 'Open FAQ',
												'view_item'				=> 'Open FAQ',
												'search_items'			=> 'Search',
												'not_found'				=> 'FAQ not found',
												'not_found_in_trash'	=> 'Basket is empty',
										),
						'public' 		=> true,
						'hierarchical' 	=> true, 
						'has_archive' 	=> true,
						'menu_icon'    => 'dashicons-search',
						'supports' 		=> array(
												'title',
												'editor',
												'thumbnail',
												//'post-formats',
												'faq_artical_category'
											),
						'can_export' => true,
					)
	);
}
add_action('init','add_faq_posts');

function my_taxonomies_faq_artical() {
	$labels = array(
		'name'              => _x( 'FAQ', 'taxonomy general name' ),
		'singular_name'     => _x( 'FAQ', 'taxonomy singular name' ),
		'search_items'      => __( 'Find FAQ' ),
		'all_items'         => __( 'All FAQ' ),
		'parent_item'       => __( 'Father category FAQ' ),
		'parent_item_colon' => __( 'Father category FAQ:' ),
		'edit_item'         => __( 'Edit FAQ' ), 
		'update_item'       => __( 'Update FAQ' ),
		'add_new_item'      => __( 'Add new category FAQ' ),
		'new_item_name'     => __( 'New FAQ' ),
		'menu_name'         => __( 'Category' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui'           => true,
		'show_admin_column' => true
	);
	register_taxonomy( 'faq_artical_category', 'faq', $args );
}
add_action( 'init', 'my_taxonomies_faq_artical', 0 );

// ================woocommerce password==========================
function iconic_remove_password_strength() {
    wp_dequeue_script( 'wc-password-strength-meter' );
}
add_action( 'wp_print_scripts', 'iconic_remove_password_strength', 10 );

// =====================update personal data 
add_action('wp_ajax_updatedata', 'metadata');

function metadata(){

	$prodata = urldecode($_POST['data']);
	
	$pieces = explode('&', $prodata);
	$curent_name = explode('=', $pieces[0])[1];
	$curent_lastn = explode('=', $pieces[1])[1];
	$curent_phone = explode('=', $pieces[2])[1];
	$curent_email = explode('=', $pieces[3])[1];
	$curent_birthday_day = explode('=', $pieces[4])[1];
	$curent_birthday_mounth = explode('=', $pieces[5])[1];
	$curent_birthday_year = explode('=', $pieces[6])[1];
	$curent_sex = explode('=', $pieces[7])[1];
	$curent_country = explode('=', $pieces[8])[1];
	$curent_city = explode('=', $pieces[9])[1];
	$curent_company = explode('=', $pieces[10])[1];
	$curent_street = explode('=', $pieces[11])[1];
	$curent_zip = explode('=', $pieces[12])[1];
	

	$curent = get_current_user_id();
	update_user_meta($curent, 'billing_first_name', $curent_name);
	update_user_meta($curent, 'billing_last_name', $curent_lastn);
	update_user_meta($curent, 'billing_email', $curent_email);
	update_user_meta($curent, 'billing_phone', $curent_phone);
	update_user_meta($curent, 'billing_state', $curent_country);
	update_user_meta($curent, 'billing_address_1', $curent_street);
	update_user_meta($curent, 'billing_city', $curent_city);
	update_user_meta($curent, 'billing_sex', $curent_sex);
	update_user_meta($curent, 'billing_date_birthday', $curent_birthday_day);
	update_user_meta($curent, 'billing_month_birthday', $curent_birthday_mounth);
	update_user_meta($curent, 'billing_year_birthday', $curent_birthday_year);
	update_user_meta($curent, 'billing_company', $curent_company);
	update_user_meta($curent, 'billing_postcode', $curent_zip);

				
	wp_die();
}
/**
 *   ORDER additional statuses
 **/

/** 
 * Register new status
 // * Tutorial: http://www.sellwithwp.com/woocommerce-custom-order-status-2/
**/
function register_paused_order_status() {
    register_post_status( 'wc-paused', array(
        'label'                     => 'Paused',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Paused <span class="count">(%s)</span>', 'Paused <span class="count">(%s)</span>' )
    ) );
    register_post_status( 'wc-request', array(
        'label'                     => 'Request for quoter',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Request for quote <span class="count">(%s)</span>', 'Request for quote <span class="count">(%s)</span>' )
    ) );

     register_post_status( 'wc-services', array(
        'label'                     => 'Services',
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Services <span class="count">(%s)</span>', 'Services <span class="count">(%s)</span>' )
    ) );
}
add_action( 'init', 'register_paused_order_status' );

// Add to list of WC Order statuses
function add_paused_to_order_statuses( $order_statuses ) {

    $new_order_statuses = array();

    // add new order status after processing
    foreach ( $order_statuses as $key => $status ) {

        $new_order_statuses[ $key ] = $status;

        if ( 'wc-processing' === $key ) {
            $new_order_statuses['wc-paused'] = 'Paused';
        }
        if ( 'wc-processing' === $key ) {
            $new_order_statuses['wc-request'] = 'Request';
        }
        if ( 'wc-processing' === $key ) {
            $new_order_statuses['wc-services'] = 'Services';
        }
    }

    return $new_order_statuses;
}
add_filter( 'wc_order_statuses', 'add_paused_to_order_statuses' );
