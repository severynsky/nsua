<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// =============woocommerce variable===============================

		$product = new WC_Product_Variable( get_the_ID() );
		$product_variations = $product->get_available_variations();
		$product_variations = $product->get_variation_attributes();
		$product_variations = $product->get_children();
		$min_price = $product->get_variation_regular_price( 'min');
		$min_price = explode('.', $min_price)[0];


get_header(); ?>
<?php $link_fsavor = get_favorites_button(get_the_ID());  ?>
	<section class="single_tour">
	<!-- <img class="tour_main_img" src="img/tour/01_Image.png"> -->
	<div class="tour_main_img" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
	<div class="tour_info content_block">
	<div class="tour_info_block">
		<div class="arthide">
			<p class="category_tour_name"><?php the_field('tour_category');?></p>
			<h1 class="tour_name"><?php the_title(); ?></h1>
			<div class="single_tour_tag">
				<?php
				$prod_separ = 1;
				if ( !empty( $product_variations ) ) {
				    foreach($product_variations as $product_variation => $value) {
				    	$the_v_product = new WC_Product_Variation( $product_variation );
				    	$attributes = $the_v_product->get_variation_attributes();
				    	$post_meta = get_post_meta( $value, $key);

				    	if($prod_separ > 1){
				    		echo '|';
				    	}
				    	$prod_separ++;
				    	echo '<span>'.$post_meta['attribute_date-of-the-tour'][0].'</span>';
				    	//var_dump($post_meta['attribute_date-of-the-tour']);
					}
				}
			?>	

				<!-- <span>SPRING: MAY 16-21</span>|<span> july: 10-25  </span>|<span>fall: september 04-19 </span> -->

			</div>
			
			<h4 class="tour_highlight "><img src="<?php echo get_template_directory_uri(); ?>/img/tour/star icon_tour highlights.svg">  TOUR HIGHLIGHTS</h4>
				<div class="tour_highlight_list">
					<?php the_field('tour_highlights_item'); ?>
				</div>			 
			 <div class="tour_tooltip">

			 	<?php					
					if( have_rows('tour_tooltips') ):					 	
					    while ( have_rows('tour_tooltips') ) : the_row();
				?>
					       <span class="tour_tooltip_item"><span class="tooltip_word"><?php the_sub_field('tour_toultips_heading');?></span><span class="top_tooltip"><?php the_sub_field('tour_toultips_hint');?></span></span>
					    	
				<?php
						endwhile;
					else :
				?>
					    <span class="tour_tooltip_item"><span class="tooltip_word">nothing was found</span></span>
					<?php
					endif;
					?>
			 </div>
			 <div class="tour_mobile_reserve">
				<p class="tour_price_heading">tour price</p>
				<p class="tour_price"><?php echo $min_price; ?> USD</p>
				<p class="tour_price_detail">*per person</p>
				<button class="tour_resefve tour_reserve" href="#">Reserve Tour</button>
			<div class="tour_sharing_block">
				<span>
					<svg class="social_sharing_tour" version="1.1" id="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	 width="30px" height="36px" viewBox="-1 -1 32 38" xml:space="preserve">
						<circle class="share_circles" cx="24" cy="5.8" r="5" />
						<circle class="share_circles" cx="24" cy="30.5" r="5" />
						<circle class="share_circles" cx="6" cy="18" r="5" />
						<path d="M11,15l8,-6" fill="none" stroke="#2f80ed" stroke-width="2.5px" />
						<path d="M11,21l8,6" fill="none" stroke="#2f80ed" stroke-width="2.5px" />
					</svg>
				</span>
				<span>
					<?php echo $link_fsavor; ?>
					<!-- <svg version="1.1" class="heart_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 -2 40 40" style="enable-background:new 0 0 40 40;" xml:space="preserve"><path class="hearth_path" style="stroke:#2f80ed; stroke-width:2px;" d="M 5.01181 17.2188L 19.9999 32.7798L 34.9881 17.2187C 38.0718 13.923 38.0699 8.56631 34.9821 5.27317L 34.7397 5.01475C 33.2838 3.46188 31.3595 2.60686 29.3213 2.60686C 27.283 2.60686 25.3587 3.46188 23.9032 5.01423L 21.0043 8.10622C 20.7478 8.37986 20.3829 8.53597 20.0002 8.53597C 19.6175 8.53597 19.2525 8.37986 18.996 8.10622L 16.0969 5.01444C 14.6413 3.46198 12.7171 2.60697 10.6788 2.60697C 8.64052 2.60697 6.71623 3.46188 5.2607 5.01434L 5.01777 5.27337C 1.93003 8.56652 1.92797 13.9232 5.01181 17.2188Z"></path></svg> -->
				</span>
				<span><svg class="tour_mail_icon tour_mail_admin" width="44" height="32" viewBox="0 0 44 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<path class="mail_icon_back" d="M1,1h42v30h-42v-30" />
						<path class="mail_icon_lines" d="M 43 0L 1 0C 0.447 0 0 0.447 0 1L 0 31C 0 31.553 0.447 32 1 32L 43 32C 43.552 32 44 31.553 44 31L 44 1C 44 0.447 43.552 0 43 0ZM 42 27.581L 29.612 15.194L 28.198 16.608L 41.59 30L 2.41 30L 15.802 16.608L 14.388 15.194L 2 27.581L 2 2L 42 2L 42 27.581Z"/>
						<path class="mail_icon_lines"  transform="translate(2 2)" d="M 37.979 0L 20 17.979L 2.021 0L 0 0L 0 0.807L 19.293 20.1C 19.684 20.491 20.316 20.491 20.707 20.1L 40 0.807L 40 0L 37.979 0Z"/>
						</svg>
				</span>
			</div>
			</div>
			<div>
			 	<h3 class="tour_city_include">
			 		<?php
							if( have_rows('tour_stages_item') ):
								$slide_d = 1;
							    while ( have_rows('tour_stages_item') ) : the_row();
						?>
							<?php if($slide_d >1){echo " | ";} ?>
							<?php the_sub_field('stage_heading'); ?>
						<?php
							$slide_d++;
							    endwhile;
							else :
							endif
					?>
			 </h3>
			 </div>

			 <div class="tour_information_wrap">
			 	<?php					
					$tour_info = get_field('tour_info');	
					if( $tour_info ): ?>
							<h4 class="tour_information_heading"><img src="<?php echo get_template_directory_uri(); ?>/img/tour/text icon_tour information.svg"> TOUR INFO</h4>
							<p>
								<?php echo $tour_info['content']; ?>
							</p>						
				<?php endif; ?>
			 	
			 </div>
		</div>
	</div>

		<div class="tour_price_block">
			<div class="tour_desctop_reserve">
				<p class="tour_price_heading">tour price</p>
				<p class="tour_price"><?php echo $min_price; ?> USD</p>
				<p class="tour_price_detail">*per person</p>
				<button class="tour_resefve tour_reserve" href="#">Reserve Tour</button>
					
			<div class="tour_sharing_block">
				<span>
					<svg class="social_sharing_tour" version="1.1" id="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	 width="30px" height="36px" viewBox="-1 -1 32 38" xml:space="preserve">
						<circle class="share_circles" cx="24" cy="5.8" r="5" />
						<circle class="share_circles" cx="24" cy="30.5" r="5" />
						<circle class="share_circles" cx="6" cy="18" r="5" />
						<path d="M11,15l8,-6" fill="none" stroke="#fff" stroke-width="2.5px" />
						<path d="M11,21l8,6" fill="none" stroke="#fff" stroke-width="2.5px" />
					</svg>
				</span>
				<span class="white_favorite">
				<?php 
						echo $link_fsavor;
					?>
				</span>
				<span><svg class="tour_mail_icon tour_mail_admin" width="44" height="32" viewBox="0 0 44 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<path class="mail_icon_back" d="M1,1h42v30h-42v-30" />
						<path class="mail_icon_lines" d="M 43 0L 1 0C 0.447 0 0 0.447 0 1L 0 31C 0 31.553 0.447 32 1 32L 43 32C 43.552 32 44 31.553 44 31L 44 1C 44 0.447 43.552 0 43 0ZM 42 27.581L 29.612 15.194L 28.198 16.608L 41.59 30L 2.41 30L 15.802 16.608L 14.388 15.194L 2 27.581L 2 2L 42 2L 42 27.581Z"/>
						<path class="mail_icon_lines"  transform="translate(2 2)" d="M 37.979 0L 20 17.979L 2.021 0L 0 0L 0 0.807L 19.293 20.1C 19.684 20.491 20.316 20.491 20.707 20.1L 40 0.807L 40 0L 37.979 0Z"/>
						</svg>
				</span>
			</div>
			</div>	
			<h4 class="tour_time_length"><?php the_field('tour_tags_days'); ?><span>|</span><?php the_field('tour_tags_city'); ?></h4>


<!-- ========================== GET MAP DATA==============-->
<?php
		$marker_lat = [];
		$marker_lng = [];
			if( have_rows('tour_google_map') ):
			    while ( have_rows('tour_google_map') ) : the_row();
			       $map = get_sub_field('map_address');
			        array_push($marker_lat, $map['lat']);
			        array_push($marker_lng, $map['lng']);
			    endwhile;
			else :
			endif;
			$center_lat = array_sum($marker_lat)/count($marker_lat);
			$center_lng = array_sum($marker_lng)/count($marker_lng);
			?>

			<div id="tour_map_wrap" class="tour_map" style="height:500px;">							
			</div>		
	<script>
		var markers = [];
		<?php
			for($i = 0; $i< count($marker_lat); $i++){
			?>
			var mapObj = {
				lat:<?php echo $marker_lat[$i]; ?>,
				lng:<?php echo $marker_lng[$i]; ?>
			};
			markers.push(mapObj);
		<?php
		} ?> 	

	function myMap() {		

		var mapProp= {
		    center:new google.maps.LatLng(<?php echo $center_lat; ?>,<?php echo $center_lng; ?>),
			    zoom:<?php the_field('tour_zoom_map'); ?>,
		};
		var map=new google.maps.Map(document.getElementById("tour_map_wrap"),mapProp);
		markers.forEach(function(item) {
	           var marker = new google.maps.Marker({
	            position: new google.maps.LatLng(item.lat, item.lng),
	            map: map
	          });
	       });

		var flightPath = new google.maps.Polyline({
          path: markers,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });
        flightPath.setMap(map);		
	}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALaAPhN1wW_BfTEP0HK-osPc-eSfXQWso&callback=myMap"></script>



		</div>		
	</div>
	<div class="tour_include_info content_block">
		<div class="tour_include_in">
			<h4 class="tour_include_in_heading">WHAT’S INCLUDED:</h4>
			<div><?php the_field('included_item'); ?></div>			
		</div>
		<div class="tour_include_out">
			<h4 class="tour_include_out_heading">NOT INCLUDED:</h4>			
			<div><?php the_field('not_included'); ?></div>
		</div>
		
	</div>
	<div class="single_tour_galery arthide">
		<h5 class="galery_heading content_block"><img src="<?php echo get_template_directory_uri(); ?>/img/tour/gallery icon_tour gallery.svg"> tour gallery</h5>
		<div class="single_tour_galer_wrap">
			<div class="single_tour_galery_images swiper_resize_block">
				 <div class="swiper-container swiper_galery">
				    <div class="swiper-wrapper">				
								<?php
								    
								    $attachment_ids = $product->get_gallery_image_ids();
								    $slide_f = 1;
								    foreach( $attachment_ids as $attachment_id ) {
								?>
								<div class="swiper-slide slider_image_position" data-hash="slide<?php echo $slide_f; ?>" style="background-image:url(<?php echo  wp_get_attachment_image_src( $attachment_id, 'full')[0]; ?>)"></div>  
								<?php
								       $slide_f++;
								    }
								?>									
				    </div>
				    <img class="swiper_resize" src="<?php echo get_template_directory_uri(); ?>/img/tour/resize icon.svg">	
				    <div class="swiper-pagination"></div>				    
				  </div>
				   <!-- Add Arrows -->
					<div class="single_tour_galer_wrap_left swiper_next"><img src="<?php echo get_template_directory_uri(); ?>/img/tour/arrow left.svg"></div>
					<div class="single_tour_galer_wrap_right swiper_prev"><img src="<?php echo get_template_directory_uri(); ?>/img/tour/arrow right.svg"></div>			
			</div>
			
			<div class="single_tour_galery_info half_block">
				<div class="single_tour_addons">
					<h4 class="tour_addons_heading">OPTIONAL ADD-ONS:</h4>
					<div> 
						<?php the_field('add-ons_content'); ?>
					</div>				
				</div>
				<div class="tour_more_info">
					<h4 class="tour_addons_heading">MORE QUESTIONS</h4>
					<p>
						<?php the_field('more_questions_content'); ?>
					</p>
				</div>
				<hr class="galery_line">
				<div class="tour_description_service">
					<p>
						<?php the_field('tour_hint_content'); ?>
					</p>
				</div>
				
			</div>
		</div>		
	</div>
	<div class="tour_reserve_info tour_reserve_info_second content_block">
		<div class="tour_reserve_info_logo">
			<img class="tour_reserve_logo" src="<?php echo get_template_directory_uri(); ?>/img/Logo_black.svg">
		</div>		
		<div class="reserve_sharing_block">
				<span>
					<svg class="social_sharing_tour_black" version="1.1" id="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	 width="30px" height="36px" viewBox="-1 -1 32 38" xml:space="preserve">
						<circle class="share_circles_black" cx="24" cy="5.8" r="5" />
						<circle class="share_circles_black" cx="24" cy="30.5" r="5" />
						<circle class="share_circles_black" cx="6" cy="18" r="5" />
						<path class="share_circles_black" d="M11,15l8,-6" stroke-width="2.5px" />
						<path class="share_circles_black" d="M11,21l8,6" stroke-width="2.5px" />
					</svg>
				</span>
				<span class="black_favorite">
					<?php echo $link_fsavor; ?>
					<!-- <svg version="1.1" class="heart_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 -2 40 40" style="enable-background:new 0 0 40 40;" xml:space="preserve"><path class="hearth_path" style="stroke-width:2px;" d="M 5.01181 17.2188L 19.9999 32.7798L 34.9881 17.2187C 38.0718 13.923 38.0699 8.56631 34.9821 5.27317L 34.7397 5.01475C 33.2838 3.46188 31.3595 2.60686 29.3213 2.60686C 27.283 2.60686 25.3587 3.46188 23.9032 5.01423L 21.0043 8.10622C 20.7478 8.37986 20.3829 8.53597 20.0002 8.53597C 19.6175 8.53597 19.2525 8.37986 18.996 8.10622L 16.0969 5.01444C 14.6413 3.46198 12.7171 2.60697 10.6788 2.60697C 8.64052 2.60697 6.71623 3.46188 5.2607 5.01434L 5.01777 5.27337C 1.93003 8.56652 1.92797 13.9232 5.01181 17.2188Z"></path></svg> -->
				</span>
				<span>
					<svg class="tour_mail_icon_black tour_mail_admin" width="44" height="32" viewBox="0 0 44 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<path class="mail_icon_black_back" d="M1,1h42v30h-42v-30" />
						<path class="mail_icon_lines_black" d="M 43 0L 1 0C 0.447 0 0 0.447 0 1L 0 31C 0 31.553 0.447 32 1 32L 43 32C 43.552 32 44 31.553 44 31L 44 1C 44 0.447 43.552 0 43 0ZM 42 27.581L 29.612 15.194L 28.198 16.608L 41.59 30L 2.41 30L 15.802 16.608L 14.388 15.194L 2 27.581L 2 2L 42 2L 42 27.581Z"/>
						<path class="mail_icon_lines_black"  transform="translate(2 2)" d="M 37.979 0L 20 17.979L 2.021 0L 0 0L 0 0.807L 19.293 20.1C 19.684 20.491 20.316 20.491 20.707 20.1L 40 0.807L 40 0L 37.979 0Z"/>
						</svg>
				</span>
		</div>
		<div class="tour_reserve_price">
			<p class="reserve_price_heading">tour price</p>
			<p class="reserve_price"><?php echo $min_price; ?> USD</p>
			<p class="reserve_price_detail">*per person</p>			
		</div>		
			<button class="tour_resefve tour_reserve" href="#">Reserve Tour</button>	
		<div class="tour_sharing_block tour_mobile_show tour_bottom_sharing">
				<span>
					<svg class="social_sharing_tour" version="1.1" id="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	 width="30px" height="36px" viewBox="-1 -1 32 38" xml:space="preserve">
						<circle class="share_circles" cx="24" cy="5.8" r="5" />
						<circle class="share_circles" cx="24" cy="30.5" r="5" />
						<circle class="share_circles" cx="6" cy="18" r="5" />
						<path d="M11,15l8,-6" fill="none" stroke="#2f80ed" stroke-width="2.5px" />
						<path d="M11,21l8,6" fill="none" stroke="#2f80ed" stroke-width="2.5px" />
					</svg>
				</span>
				<span class="black_favorite">
					<?php echo $link_fsavor; ?>
					<!-- <svg version="1.1" class="heart_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 -2 40 40" style="enable-background:new 0 0 40 40;" xml:space="preserve"><path class="hearth_path" style="stroke:#2f80ed; stroke-width:2px;" d="M 5.01181 17.2188L 19.9999 32.7798L 34.9881 17.2187C 38.0718 13.923 38.0699 8.56631 34.9821 5.27317L 34.7397 5.01475C 33.2838 3.46188 31.3595 2.60686 29.3213 2.60686C 27.283 2.60686 25.3587 3.46188 23.9032 5.01423L 21.0043 8.10622C 20.7478 8.37986 20.3829 8.53597 20.0002 8.53597C 19.6175 8.53597 19.2525 8.37986 18.996 8.10622L 16.0969 5.01444C 14.6413 3.46198 12.7171 2.60697 10.6788 2.60697C 8.64052 2.60697 6.71623 3.46188 5.2607 5.01434L 5.01777 5.27337C 1.93003 8.56652 1.92797 13.9232 5.01181 17.2188Z"></path></svg> -->
				</span>
				<span><svg class="tour_mail_icon tour_mail_admin" width="44" height="32" viewBox="0 0 44 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<path class="mail_icon_back" d="M1,1h42v30h-42v-30" />
						<path class="mail_icon_lines" d="M 43 0L 1 0C 0.447 0 0 0.447 0 1L 0 31C 0 31.553 0.447 32 1 32L 43 32C 43.552 32 44 31.553 44 31L 44 1C 44 0.447 43.552 0 43 0ZM 42 27.581L 29.612 15.194L 28.198 16.608L 41.59 30L 2.41 30L 15.802 16.608L 14.388 15.194L 2 27.581L 2 2L 42 2L 42 27.581Z"/>
						<path class="mail_icon_lines"  transform="translate(2 2)" d="M 37.979 0L 20 17.979L 2.021 0L 0 0L 0 0.807L 19.293 20.1C 19.684 20.491 20.316 20.491 20.707 20.1L 40 0.807L 40 0L 37.979 0Z"/>
						</svg>
				</span>
			</div>	
	</div>

	
</section>
<hr>
<!-- ===========================================DESCRIPTION TOUR DAYS and CITY=================================== -->
<section class="">
	<h2 class="tour_days-city_heading content_block tour_desctop_reserve"><?php the_field('city_days_heading'); ?></h2>
	<h4 class="tour_time_length tour_mobile_show"><?php the_field('tour_tags_days'); ?><span>|</span><?php the_field('tour_tags_city'); ?></h4>
<?php
if( have_rows('tour_stages_item') ): 	
    while ( have_rows('tour_stages_item') ) : the_row();
?>
<div class="arthide">
	<div class="tours_city_block">
		<div class="tours_city_block_left half_block">
			<div class="tours_city_block_left_wrap">
				<h2 class="tours_city_block_heading"><?php the_sub_field('stage_heading'); ?><img class="city_content_hide" src="<?php echo get_template_directory_uri(); ?>/img/tour/nobile_arrow_up.svg"></h2>
			</div>
			<div class="tour_city_below_heading">			
					<div class="tours_city_block_left_wrap">
						<h4 class="tours_city_block_subheading">
							<?php the_sub_field('new_tour_day_in_city'); ?>
						</h4>
					</div>
					<div class="tours_city_block_left_wrap">
						<img src="<?php echo get_template_directory_uri(); ?>/img/tour/residence icon.svg"><h4 class="tours_city_block_subheading"> RESIDENCE</h4>
						<div class="tours_city_block_content">
							<?php the_sub_field('stage_residence_description'); ?>
						</div>
						
					</div>
					<div class="tours_city_block_left_wrap">
						<img src="<?php echo get_template_directory_uri(); ?>/img/tour/transport icon.svg"><h4 class="tours_city_block_subheading"> TRANSPORT</h4>
						<div class="tours_city_block_content">
							<?php the_sub_field('stage_transport_description'); ?>
						</div>						
					</div>
					<div class="tours_city_block_left_wrap">
						<img src="<?php echo get_template_directory_uri(); ?>/img/tour/food icon.svg"><h4 class="tours_city_block_subheading"> FOOD</h4>
						<div class="tours_city_block_content">
							<?php the_sub_field('stage_food_description'); ?>
						</div>
						
					</div>
			</div>
		</div>
		<div class="tours_city_block_right swiper_resize_block">
				  <div class="swiper-container swiper_galery">
				    <div class="swiper-wrapper">

				    	<?php
							if( have_rows('stage_slider_image') ):
								$slide_i = 1;
							    while ( have_rows('stage_slider_image') ) : the_row();
						?>
							<div class="swiper-slide slider_image_position" data-hash="slide<?php echo $slide_i; ?>" style="background-image:url(<?php the_sub_field('stage_slider_image_item'); ?>)"></div>
						<?php
							$slide_i++;
							    endwhile;
							else :
							endif;
							?>				     
				    </div>
				    <div class="swiper-pagination"></div>
				    
				  </div>
				  	<img class="swiper_resize" src="<?php echo get_template_directory_uri(); ?>/img/tour/resize icon.svg">
				  	<div class="single_tour_galer_wrap_left swiper_next"><img src="<?php echo get_template_directory_uri(); ?>/img/tour/arrow left.svg"></div>
					<div class="single_tour_galer_wrap_right swiper_prev"><img src="<?php echo get_template_directory_uri(); ?>/img/tour/arrow right.svg"></div>
		</div>
					
	</div>
	
<!-- ==============================================SHORT CITY DESCRIPTION ==================================== -->
	<div class="short_city_description content_block">
		<div class="short_city_description_slider">
			<span class="short_city_description_line tour_mobile_hide"></span>
			<div class="short_city_description_content">
				<?php the_sub_field('stage_short_description'); ?>
			</div>
			<!-- ============================================================================================== -->
			<div id="tour_day_slider" class="short_city_slider">
				<div class="swiper-container swiper-content">
				    <div class="swiper-wrapper">
						<?php				    		
							if( have_rows('stage_slider_content') ):								
								$slide_f = 0;
							    while ( have_rows('stage_slider_content') ) : the_row();						
									$slide_f++;
							    endwhile;
							else :
							endif;
							?>
				    	<?php				    		
							if( have_rows('stage_slider_content') ):								
								$slide_j = 1;
								$day_item = 1;
							    while ( have_rows('stage_slider_content') ) : the_row();
						?>						
						<div class="swiper-slide slider_image_position" data-hash="slide<?php echo $slide_j; ?>"><div class="day_describe_icon"><img src="<?php echo get_template_directory_uri(); ?>/img/tour/sun icon.svg"><span>DAY<?php  echo " ".$day_item."/".$slide_f; ?></span></div>
							<div class="swiper-slide_day-description">
								<p>
									<?php the_sub_field('stage_slider_content_item'); ?>
								</p>
							</div>
						</div>
						<?php
							$slide_j++;
							$day_item++;
							    endwhile;
							else :
							endif;
							?>				  
				    </div>
				  </div>	
				  	<div class="city_tour-button-next swiper_content_next">next day<img src="<?php echo get_template_directory_uri(); ?>/img/tour/arrow right.svg"></div>
   					<div class="city_tour-button-prev swiper_content_prev"> <img src="<?php echo get_template_directory_uri(); ?>/img/tour/arrow left.svg">previous day</div>
			</div>
		</div>

		<div class="short_city_description_includ">
			<div class="short_city_includ_wraper">
				<h4 class="short_city_includ_wraper_heading">HIGHLIGHTS:</h4>				
					<div class="short_city_includ_list"><?php the_sub_field('stage_include'); ?></div>
								
			</div>			
		</div>		
	</div>
</div>      
<?php
    endwhile;
else :
endif;
?>
</section>

<section class="">		
<!--        ================================================ RESERVE TOUR ================================== -->
<!-- ========================================================================================================= -->
	<div class="tour_reserve_info tour_reserve_info_second content_block">
		<div class="tour_reserve_info_logo">
			<img class="tour_reserve_logo" src="<?php echo get_template_directory_uri(); ?>/img/Logo_black.svg">
		</div>		
		<div class="reserve_sharing_block">
				<span>
					<svg class="social_sharing_tour_black" version="1.1" id="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	 width="30px" height="36px" viewBox="-1 -1 32 38" xml:space="preserve">
						<circle class="share_circles_black" cx="24" cy="5.8" r="5" />
						<circle class="share_circles_black" cx="24" cy="30.5" r="5" />
						<circle class="share_circles_black" cx="6" cy="18" r="5" />
						<path class="share_circles_black" d="M11,15l8,-6" stroke-width="2.5px" />
						<path class="share_circles_black" d="M11,21l8,6" stroke-width="2.5px" />
					</svg>
				</span>
				<span class="black_favorite">
					<?php echo $link_fsavor; ?>
					<!-- <svg version="1.1" class="heart_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 -2 40 40" style="enable-background:new 0 0 40 40;" xml:space="preserve"><path class="hearth_path" style="stroke-width:2px;" d="M 5.01181 17.2188L 19.9999 32.7798L 34.9881 17.2187C 38.0718 13.923 38.0699 8.56631 34.9821 5.27317L 34.7397 5.01475C 33.2838 3.46188 31.3595 2.60686 29.3213 2.60686C 27.283 2.60686 25.3587 3.46188 23.9032 5.01423L 21.0043 8.10622C 20.7478 8.37986 20.3829 8.53597 20.0002 8.53597C 19.6175 8.53597 19.2525 8.37986 18.996 8.10622L 16.0969 5.01444C 14.6413 3.46198 12.7171 2.60697 10.6788 2.60697C 8.64052 2.60697 6.71623 3.46188 5.2607 5.01434L 5.01777 5.27337C 1.93003 8.56652 1.92797 13.9232 5.01181 17.2188Z"></path></svg> -->
				</span>
				<span>
					<svg class="tour_mail_icon_black tour_mail_admin" width="44" height="32" viewBox="0 0 44 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<path class="mail_icon_black_back" d="M1,1h42v30h-42v-30" />
						<path class="mail_icon_lines_black" d="M 43 0L 1 0C 0.447 0 0 0.447 0 1L 0 31C 0 31.553 0.447 32 1 32L 43 32C 43.552 32 44 31.553 44 31L 44 1C 44 0.447 43.552 0 43 0ZM 42 27.581L 29.612 15.194L 28.198 16.608L 41.59 30L 2.41 30L 15.802 16.608L 14.388 15.194L 2 27.581L 2 2L 42 2L 42 27.581Z"/>
						<path class="mail_icon_lines_black"  transform="translate(2 2)" d="M 37.979 0L 20 17.979L 2.021 0L 0 0L 0 0.807L 19.293 20.1C 19.684 20.491 20.316 20.491 20.707 20.1L 40 0.807L 40 0L 37.979 0Z"/>
						</svg>
				</span>
		</div>
		<div class="tour_reserve_price">
			<p class="reserve_price_heading">tour price</p>
			<p class="reserve_price"><?php echo $min_price; ?> USD</p>
			<p class="reserve_price_detail">*per person</p>			
		</div>		
			<button class="tour_resefve tour_reserve" href="#">Reserve Tour</button>	
		<div class="tour_sharing_block tour_mobile_show tour_bottom_sharing">
				<span>
					<svg class="social_sharing_tour" version="1.1" id="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	 width="30px" height="36px" viewBox="-1 -1 32 38" xml:space="preserve">
						<circle class="share_circles" cx="24" cy="5.8" r="5" />
						<circle class="share_circles" cx="24" cy="30.5" r="5" />
						<circle class="share_circles" cx="6" cy="18" r="5" />
						<path d="M11,15l8,-6" fill="none" stroke="#2f80ed" stroke-width="2.5px" />
						<path d="M11,21l8,6" fill="none" stroke="#2f80ed" stroke-width="2.5px" />
					</svg>
				</span>
				<span class="black_favorite">
					<?php echo $link_fsavor; ?>
				</span>
				<span><svg class="tour_mail_icon tour_mail_admin" width="44" height="32" viewBox="0 0 44 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<path class="mail_icon_back" d="M1,1h42v30h-42v-30" />
						<path class="mail_icon_lines" d="M 43 0L 1 0C 0.447 0 0 0.447 0 1L 0 31C 0 31.553 0.447 32 1 32L 43 32C 43.552 32 44 31.553 44 31L 44 1C 44 0.447 43.552 0 43 0ZM 42 27.581L 29.612 15.194L 28.198 16.608L 41.59 30L 2.41 30L 15.802 16.608L 14.388 15.194L 2 27.581L 2 2L 42 2L 42 27.581Z"/>
						<path class="mail_icon_lines"  transform="translate(2 2)" d="M 37.979 0L 20 17.979L 2.021 0L 0 0L 0 0.807L 19.293 20.1C 19.684 20.491 20.316 20.491 20.707 20.1L 40 0.807L 40 0L 37.979 0Z"/>
						</svg>
				</span>
			</div>	






	</div>
</section>
<hr class="tour_mobile_hide">
<div class="tour_back_to_detail_wraper">
	<div class="tour_back_to_detail">Back To Details <img src="<?php echo get_template_directory_uri(); ?>/img/tour/arrow up.svg"></div>
</div>
<!-- ==========================================RECOMMENDED TOURS======================================== -->
<div class="tour_recomended content_block">
	<h3 class="tour_recomended_heading">view recommended tours</h3>
	<div class="tour_recomended_wraper">

			<div class="swiper-container recommended_swiper">
				    <div class="swiper-wrapper">				<?php 
					$posts = get_field('tour_relaited_products');
					$rel_post = 1;
					if( $posts ): ?>
					    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php setup_postdata($post); ?>			
									      <div class="swiper-slide slider_image_position" data-hash="slide<?php echo $rel_post; ?>" >
									      	<a href="<?php the_permalink( ); ?>">
									      		<div class="tour_recomended_item" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
													<h5 class="recomended_item_recommend">RECOMMENDED</h5>
													<div class="tour_recomended_name">
														<h4 class="tour_recomended_name_heading"><?php the_title(); ?></h4>
														<p class="tour_recomended_name_tag">
															<?php
																if( have_rows('tags_on_main_page') ):								
																	while ( have_rows('tags_on_main_page') ) : the_row();				
																?>
																	<span ><?php the_sub_field('main_tags_item'); ?></span>	
																<?php											
																	endwhile;
																	else :
																endif;
															?>	
														</p>
													</div>
												</div>
											</a>
									      </div>
					            <?php $rel_post++; ?>
					    <?php endforeach; ?>
					    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>

				    </div>
				    <!-- Add Pagination -->
				    <div class="swiper-pagination"></div>	
				    <div class="swiper-button-prev recomm_prev"></div>
   						<div class="swiper-button-next recomm_next"></div>				    
				   </div> 
	</div>	
</div>
<hr>
				<?php					
						if( have_rows('tour_review_slider') ):	
								?>
<div class="tour_reviews_block content_block">

	<h2 class="tour_reviews_block_heading">reviews</h2>
	<div class="tour_reviews_block_wraper">
		<div class="swiper-container swiper-review">
				    <div class="swiper-wrapper">

				    	<?php					
							//if( have_rows('tour_review_slider') ):	
							$slide_n = 1;				 	
							    while ( have_rows('tour_review_slider') ) : the_row();
						?>
							<div class="swiper-slide slider_image_position" data-hash="slide<?php echo $slide_n; ?>">

					      		<div class="tour_reviews_block_item">
									<p class="tour_reviews_block_content">
										<?php the_sub_field('review_slider_content');?> 
									</p>
									<div class="tour_reviews_block_detail">
										<div class="tour_reviews_block_foto" style="background-image: url('<?php the_sub_field('review_slider_image');?>');"></div>
										<div class="tour_reviews_block_detail_info">
											<p class="tour_reviews_block_detail_name"><?php the_sub_field('review_slider_name');?></p>
											<p class="tour_reviews_block_detail_date"><?php the_sub_field('review_slider_date');?></p>
										</div>
									</div>
									
								</div>
					      </div>							     
							    	
						<?php
							$slide_n++;
								endwhile;
						?>

				     
				    </div>
				    <!-- Add Pagination -->
				    <div class="swiper-pagination review-pagination-custom"></div>
					
				      				    
				   </div> 
				<div class="swiper-button-prev swiper_prev review_navigation_prev"></div>
   				<div class="swiper-button-next swiper_next review_navigation_next"></div>
	</div>
	
</div>
						<?php
							else :						
							endif;
						?>	
<!-- =================================================MODAL windows =============================================== -->
<div class="tour_modal_layer" style="display:none;">
	<div class="tour_modal_reserve_wrap">
		<div class="tour_modal_reserve_close">x</div>
		<p class="tour_modal_reserve_heading">Please select the tour period:</p>
		<div class="tour_modal_reserve">
			<?php 	//do_action( 'woocommerce_before_main_content' );// from single product 
			//		do_action( 'woocommerce_before_single_product' );// from content-single-product 

			?>


			<form>

			<input type="" hidden="true" name="base_url" data-url="<?php echo home_url('/'); ?>">
			
			<?php

				if ( !empty( $product_variations ) ) {
				    foreach($product_variations as $product_variation) {

				    	$the_v_product = new WC_Product_Variation( $product_variation );
				    	$attributes = $the_v_product->get_variation_attributes();

			?>					        
				        <input id="reserve<?php echo $product_variation ?>" type="radio" name="tour_date" data-link="<?php echo $the_v_product->add_to_cart_url(); ?>" data-id="<?php echo $product_variation ?>">
						<label for="reserve<?php echo $product_variation ?>"><?php echo $attributes['attribute_date-of-the-tour'] ?></label>

			<?php
				    }
				}
			?>
			</form>
					<div class="tour_reserve_price">
						<p class="reserve_price_heading">tour price</p>
						<p class="reserve_price"><?php echo $min_price; ?> USD</p>
						<p class="reserve_price_detail">*per person</p>
						<button id="buy_button" type="" name="reserve_tour" class="tour_button_resefve single_add_to_cart_button button alt" name="checkout_now"> Reserve Now </button>			
					</div>
			
					
		</div>
	</div>

	
	
</div>
<div class="tour_email_wrap">
	<div class="tour_modal_email_wrap">
		<div class="tour_modal_email_close">x</div>
		<?php echo do_shortcode('[contact-form-7 id="127" title="Product page form"]'); ?>
	</div>
</div>

	
	<div class="product_share_wrap">
		<?php echo do_shortcode( '[woocommerce_social_media_share_buttons]' ); ?>
	</div>
	<div class="close_share">X</div>
	<script type="text/javascript">
		(function(){
			jQuery('.close_share').click(function(){
				jQuery('.product_share_wrap, .close_share').css('display', 'none');
			});
			jQuery('.social_sharing_tour, .social_sharing_tour_black').click(function(){
				jQuery('.product_share_wrap, .close_share').css('display', 'flex');
			});
			
		})();
	</script>
<?php get_footer(); ?>
