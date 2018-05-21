(function(){
	window.addEventListener("load", function() {
    		jQuery(".pleloader_screen").fadeOut(300);
	});
	function el(a){
		return document.querySelector(a);
	}
	if(el('#close_modal_button')){
		el('#close_modal_button').addEventListener('click', function(){
			el('.header_modal').style.display = 'none';
		});
	}
	
	var navClose = true;
	jQuery('.mobile_nav_icon').click( function(){
		jQuery(".mobile_nav").slideToggle();
		if(navClose){
				TweenMax.to(".nav_top_line",.4,{rotation:42, svgOrigin:"5 5"});
				TweenMax.to(".nav_middle_line",.4,{autoAlpha:0});
				TweenMax.to(".nav_bottom_line",.4,{rotation:-42, svgOrigin:"5 45"});
        jQuery('body').css('overflow-y', 'hidden');
			navClose = false;
		}else{
			TweenMax.to(".nav_top_line",.4,{rotation:0, svgOrigin:"5 5"});
			TweenMax.to(".nav_middle_line",.4,{autoAlpha:1});
			TweenMax.to(".nav_bottom_line",.4,{rotation:0, svgOrigin:"5 45"});
      jQuery('body').css('overflow-y', 'scroll');
			navClose = true;
		}
	});
	//  =============================single tour image galery slider =========================================
				if(document.querySelector(".single_tour_galery_images_wrap")){
							var sliderImage = 1;
							var images = jQuery(".single_tour_galery_images_item");	
							
							jQuery(".single_tour_galer_wrap_left").click(leftSlide);
							function leftSlide(){
								sliderImage--;
								if(sliderImage < 1){sliderImage = images.length;}
									jQuery(".single_tour_galery_images_item").animate({'opacity':'0'},".5");
									jQuery(".single_tour_galery_images_item:nth-child("+sliderImage+")").animate({'opacity':'1'},".5");
							}
							jQuery(".single_tour_galer_wrap_right").click(rightSlide);
							function rightSlide(){
								sliderImage++;
								if(sliderImage > images.length){sliderImage = 1}
									jQuery(".single_tour_galery_images_item").animate({'opacity':'0'},".5");
									jQuery(".single_tour_galery_images_item:nth-child("+sliderImage+")").animate({'opacity':'1'},".5");
									
							}
				}

				jQuery('.city_content_hide').click(function(){
					var that = this;
					var elParent = jQuery(that).closest("div.tours_city_block");
					if(this.classList.contains('city_content_hide_rotated')){
						this.classList.remove('city_content_hide_rotated');
						elParent.find('div.tour_city_below_heading').slideUp();
						elParent.next().slideUp();
						 initSlider();
					} else {
						this.classList.add('city_content_hide_rotated');
						elParent.find('div.tour_city_below_heading').slideDown();
						elParent.next().slideDown();
						 initSlider();
					}


				});

jQuery('.swiper_resize').click(function(){
  if(window.innerWidth > 960){
    if(!jQuery(this).hasClass('resized_galery')){
    jQuery(this).addClass('resized_galery');
      var elParent = jQuery(this).closest("div.swiper_resize_block");
      elParent.css({'position':'fixed', 'width':'90vw','z-index':'999', 'height':'90vh', 'top':'5vh', 'left':'5vw'});
      elParent.find('div.swiper-slide.slider_image_position').css('height','90vh');
      elParent.find('div.swiper-wrapper').css('transform','translate3d(0px, 0px, 0px)');
      initSlider();
    } else {
      jQuery(this).removeClass('resized_galery');
      var elParent = jQuery(this).closest("div.swiper_resize_block");
      elParent.css({'position':'relative', 'width':'50%','z-index':'1', 'height':'450px', 'top':'0vh', 'left':'0vw'});
      elParent.find('div.swiper-slide.slider_image_position').css('height','450px');
       elParent.find('div.swiper-wrapper').css('transform','translate3d(0px, 0px, 0px)');
      initSlider();
    }
  }
});
// ==========================================SWIPER SLIDER INIT============================
				 initSlider();
  function initSlider(){
var sliders = [] = document.querySelectorAll('.swiper_galery');
      if(sliders){
            for(var i = 0; i< sliders.length; i++){
                var slidern = [];
                var that = sliders[i];
                that.classList.add("swiper_galery"+i+"");              
                  slidern.push(
                          new Swiper(".swiper_galery"+i+"", {
                            spaceBetween: 10,
                            // loop:true,
                            pagination: {
                              el: '.swiper-pagination',
                              clickable: true,
                            },
                            navigation: {
                              nextEl: jQuery(that).parent().find("div.swiper_prev"),
                              prevEl: jQuery(that).parent().find("div.swiper_next"),
                            },
                          })
                  );
            }
      }
}


 contentSlider();
  function contentSlider(){
var sliderc = [] = document.querySelectorAll('.swiper-content');
      if(jQuery('.swiper-content')){
            for(var i = 0; i< sliderc.length; i++){
                var slider = [];
                var that = sliderc[i];
                that.classList.add("swiper-content"+i+"");
              
                  slider.push(
                          new Swiper(".swiper-content"+i+"", {
                            spaceBetween: 10,
                            effect: 'fade',
                            autoHeight: true,
                            fadeEffect: { crossFade: true },                            
                            navigation: {
                              nextEl: jQuery(that).parent().find("div.swiper_content_next"),
                              prevEl: jQuery(that).parent().find("div.swiper_content_prev"),
                            },
                          })
                  );
            }
      }
}

 reviewSlider();
  function reviewSlider(){
var sliderr = [] = document.querySelectorAll('.swiper-review');
      if(jQuery('.swiper-review')){
            for(var i = 0; i< sliderr.length; i++){
                var slider = [];
                var that = sliderr[i];
                that.classList.add("swiper-review"+i+"");
              
                  slider.push(
                          new Swiper(".swiper-review"+i+"", {
                            spaceBetween: 10,
                            pagination: {
                              el: '.swiper-pagination',
                              clickable: true,
                            },                        
                            navigation: {
                              nextEl: jQuery(that).parent().find("div.swiper-button-next"),
                              prevEl: jQuery(that).parent().find("div.swiper-button-prev"),
                            },
                          })
                  );
            }
      }
}

jQuery(".tour_back_to_detail").click(function() {
   jQuery('html, body').animate({ scrollTop: 0 }, 700);
});
    if(jQuery('.recommended_swiper')){
    var recommendSwiper = new Swiper ('.recommended_swiper', {
                slidesPerView               : 4,
                spaceBetween                : 40,
                observer                    : true,
            // If we need pagination
            pagination: {
              el: '.swiper-pagination',
            },
            // Navigation arrows
            navigation: {
              nextEl: '.recomm_next',
              prevEl: '.recomm_prev',
            }
          });
    }
    if(jQuery('.company_page_tab_heading')){
    	jQuery('.company_page_tab_heading').click(function(){
    		var elId = this.getAttribute('id');
    		if(this.classList.contains('tab_active')){
    		} else{
    			jQuery('.company_page_tab_heading').removeClass('tab_active');
    			this.classList.add('tab_active');
    			jQuery('.company_page_tabcontent').css('display', 'none');
    			jQuery('.'+elId+'').css('display','block');    			
    		}
    	})
    }
    if (jQuery('.company_content_hide')) {
    	jQuery('.company_content_hide').click(function(){
    		if(this.classList.contains('city_content_hide_rotated')){
    			this.classList.remove('city_content_hide_rotated');
    			jQuery(this).closest('h4').next().slideUp();
    		} else {
    			this.classList.add('city_content_hide_rotated');
    			jQuery(this).closest('h4').next().slideDown();
    		}
    		
    	});
    }
    if(jQuery('.faq_page')){
    	jQuery('.faq_page_qustion').click(function () {
    		var that  = jQuery(this).find('span.faq_page_line2');
    		if(that.hasClass('faq_page_minus')){
    			that.removeClass('faq_page_minus');
    			jQuery(this).next().slideUp();

    		} else {
    			that.addClass('faq_page_minus');
    			jQuery(this).next().slideDown();
    		}


    	});

    }

  // ================================== SCROLL HEADER ===============================================
  // header_fixed_active    header_fixed
  window.addEventListener('scroll', bodyScroll);
var bodyTop = 0;
var fixedHeader = true;
var blackLogo = jQuery('.find_black_logo').attr('data-black');
var whiteLogo = jQuery('.find_black_logo').attr('src');
  function bodyScroll(){
   bodyTop = document.querySelector('body').getBoundingClientRect().top;
   if(bodyTop < -300 && fixedHeader){
          fixedHeader = false;    
         
          jQuery('.header_fixed').addClass('header_fixed_active');
          jQuery('.header_fixed_active').css('opacity',1);
          jQuery('.find_black_logo').attr('src',blackLogo);     
   }
   if(bodyTop > -300 && !fixedHeader){ 
      fixedHeader = true;        
        jQuery('.find_black_logo').attr('src',whiteLogo);
        jQuery('.header_fixed').removeClass('header_fixed_active'); 
                 
         
           
     
   }

  }

    // ================================= press buttons event ==========================================
    jQuery('.tour_reserve').click(function(){
        jQuery('.tour_modal_layer').css('display', 'flex');
        jQuery('.tour_modal_reserve_wrap').css('display', 'inline-block');
        jQuery('body').css('overflow-y', 'hidden');
        
    })
    jQuery('.tour_modal_reserve_close').click(function(){
         jQuery('.tour_modal_layer').css('display', 'none');
        jQuery('.tour_modal_reserve_wrap').css('display', 'none');
        jQuery('body').css('overflow-y', 'scroll');
    });


    jQuery('.tour_mail_admin').click(function(){
        jQuery('.tour_email_wrap').css('display', 'flex'); 
        jQuery('body').css('overflow-y', 'hidden');       
    })
    jQuery('.tour_modal_email_close').click(function(){
         jQuery('.tour_email_wrap').css('display', 'none');
         jQuery('body').css('overflow-y', 'scroll');
    });

    // ============================  register login ==============================
    jQuery('.register_show_login').click(function(){
      jQuery('.tour_login').css('display','block');
      jQuery('.tour_register').css('display','none');
    });
    jQuery('.link_to_register_block').click(function(){     
      jQuery('.tour_login').css('display','none');
      jQuery('.tour_register').css('display','block');
    });
})(); 