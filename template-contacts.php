<?php
/*
Template Name: Contacts page
*/
?>
<?php get_header() ?>

<section class="contacts_page" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/tour/06_Image.png);">
	<div class="contacts_page_wrap content_block">
		<div class="contacts_page_form">
			<div class="contact_form_wraper">
				<h3 class="contacts_form_heading">Have a question or need some help with your booking? Contact us</h3>
					<div class="contact_form_item">
						<?php echo do_shortcode('[contact-form-7 id="149" title="CONTACT PAGE"]') ?>		
					</div>			
			</div>
			<div class="contact_contakt">
			<?php $contacts_images = get_field('contact_icons'); ?>
			<div class="contact_contakt_item contact_item_location"><a href="#"><img src="<?php echo $contacts_images['location_image']; ?>"><span><?php the_field('c_location_address'); ?></span></a></div>
			<div class="contact_contakt_item contact_item_mail"><a href="mailto:<?php the_field('c_mail_address'); ?>"><img src="<?php echo $contacts_images['mail_image']; ?>"><span><?php the_field('c_mail_address'); ?></span></a></div>
			<div class="contact_contakt_item contact_item_phone"><a href="tel:<?php the_field('c_phone_number'); ?>4"><img src="<?php echo $contacts_images['phone_image']; ?>"><span><?php the_field('c_phone_number'); ?></span></a></div>
			<div class="contact_contakt_item contact_item_viber"><a href="viber://chat?number=<?php the_field('c_viber_number'); ?>"><img src="<?php echo $contacts_images['viber_image']; ?>"><span><?php the_field('c_viber_number'); ?></span></a></div>
			<div class="contact_contakt_item contact_item_skype"><a href="skype:<?php the_field('c_skype_address'); ?>?call"><img src="<?php echo $contacts_images['skype_image']; ?>"><span><?php the_field('c_skype_address'); ?></span></a></div>
			<div class="contact_contakt_item contact_item_licens"><p><?php the_field('license_number'); ?></p></div>
						
		</div>
		</div>
		<div id="contact_map" class="contacts_page_map" ">			
			
		</div>
	</div>
	<script type="text/javascript">
		(function(){
			if(window.innerWidth > 960){
				var blockHeight = $('.contacts_page_form').css('height');
				$('.contacts_page_map').css('height', blockHeight+"px");
			} 	

		})();
	</script>
	<?php
		$contactMap = get_field('contact_map');
	 ?>
	<script>
	function myMap() {
		var mapProp= {
		    center:new google.maps.LatLng(<?php echo $contactMap['lat']; ?>,<?php echo $contactMap['lng'] ?>),
			    zoom:<?php the_field('google_map_zoom'); ?>,
		};
		var map=new google.maps.Map(document.getElementById("contact_map"),mapProp);
	}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALaAPhN1wW_BfTEP0HK-osPc-eSfXQWso&callback=myMap"></script>
</section>


<?php get_footer('contacts') ?>