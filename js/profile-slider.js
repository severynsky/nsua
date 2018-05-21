; window.addEventListener('DOMContentLoaded', profileSlider);
function profileSlider(){
		function deleteHtml(a) {
			setTimeout(function(){jQuery(a).fadeOut('500');},2000);
		}
					
		jQuery('#save_personal_data').click(function(){
			var formData = jQuery('#user_data_profile').serialize();
			var data = {
				action: 'updatedata',
				data: formData ,
			}; 
			jQuery.post({ url:MyAjax.ajaxurl, data:data, success:function(response) { jQuery('.profile_messages').html('<p class="green_message" style="color:green; font-size: 22px; padding:25px 0 10px 0; background-color:#fff; text-align: center; display:block;">Your data is successfully updated!</p>'); deleteHtml('.green_message');
				}, error:function(jqXHR, exception){  }, 
			});
						
		});
					

	proSlider();
	jQuery('.list_tours_filter_item').click(function(){
		jQuery('.list_tours_filter_item').removeClass('list_active');
		jQuery(this).addClass('list_active');
		var tab_id = jQuery(this).attr('id');
		jQuery('.list_order_item').css('display','none');
		jQuery('.'+tab_id+'').css('display','block');
		proSlider();

	});
	jQuery('.profile_tab').click(function(){
			jQuery('.profile_tab').removeClass('active');
			jQuery('.profile_tab_name_mobile').text(jQuery(this).find('span').text());
			jQuery(this).addClass('active');
			var proId = jQuery(this).attr('id');
			jQuery('.profile_content_tab').removeClass('active');
			jQuery('.'+proId+'').addClass('active');
			proSlider();
		});

	jQuery('.mobile_tab_orders').click(function(){

		if(jQuery(this).hasClass('mobile_tab_orders_active')){

			jQuery(this).removeClass('mobile_tab_orders_active');
			jQuery(this).next().slideUp();
		} else {
			jQuery(this).addClass('mobile_tab_orders_active');
			jQuery(this).next().slideDown();
		}
		proSlider();
	});


  function proSlider(){



  		var favor = new Swiper(".swiper_favorite", {
                            spaceBetween: 90,
                            pagination: {
						        el: '.swiper-pagination',
						        clickable: true,
						        renderBullet: function (index, className) {
						          return '<span class="' + className + '">' + (index + 1) + '</span>';
						        },
						      },
                            navigation: {
                              nextEl: '.favorite_pro_next',
                              prevEl: '.favorite_pro_prev',
                            },
                        });
var requested = new Swiper(".profile_requested", {
                            spaceBetween: 90,
                            pagination: {
						        el: '.swiper-pagination',
						        clickable: true,
						        renderBullet: function (index, className) {
						          return '<span class="' + className + '">' + (index + 1) + '</span>';
						        },
						      },
                            navigation: {
                              nextEl: '.request_pro_next',
                              prevEl: '.request_pro_prev',
                            },
                        });

var services = new Swiper(".profile_tour_services", {
                            spaceBetween: 90,
                            pagination: {
						        el: '.swiper-pagination',
						        clickable: true,
						        renderBullet: function (index, className) {
						          return '<span class="' + className + '">' + (index + 1) + '</span>';
						        },
						      },
                            navigation: {
                              nextEl: '.services_next',
                              prevEl: '.services_prev',
                            },
                        });

var advanced = new Swiper(".profile_advanced", {
                            spaceBetween: 90,
                            pagination: {
						        el: '.swiper-pagination',
						        clickable: true,
						        renderBullet: function (index, className) {
						          return '<span class="' + className + '">' + (index + 1) + '</span>';
						        },
						      },
                            navigation: {
                              nextEl: '.advanced_pro_next',
                              prevEl: '.advanced_pro_prev',
                            },
                        });
var paid = new Swiper(".profile_paid", {
                            spaceBetween: 90,
                            pagination: {
						        el: '.swiper-pagination',
						        clickable: true,
						        renderBullet: function (index, className) {
						          return '<span class="' + className + '">' + (index + 1) + '</span>';
						        },
						      },
                            navigation: {
                              nextEl: '.paid_pro_next',
                              prevEl: '.paid_pro_prev',
                            },
                        });
var history = new Swiper(".profile_history", {
                            spaceBetween: 90,
                            pagination: {
						        el: '.swiper-pagination',
						        clickable: true,
						        renderBullet: function (index, className) {
						          return '<span class="' + className + '">' + (index + 1) + '</span>';
						        },
						      },
                            navigation: {
                              nextEl: '.history_pro_next',
                              prevEl: '.history_pro_prev',
                            },
                        });
var slider_paused = new Swiper(".profile_slider_paused", {
                            spaceBetween: 90,
                            pagination: {
						        el: '.swiper-pagination',
						        clickable: true,
						        renderBullet: function (index, className) {
						          return '<span class="' + className + '">' + (index + 1) + '</span>';
						        },
						      },
                            navigation: {
                              nextEl: '.paused_pro_next',
                              prevEl: '.paused_pro_prev',
                            },
                        });
}
}