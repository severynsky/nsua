(function(){
					var stageHour = 0;
					window.addEventListener('load', createPicker);



// =================================INIT DATA AND HOURS PICKER ==============================================

					function createPicker(){

						var allpick = [] = document.querySelectorAll('.service_tour_datepicker');
						var allHour = [] = document.querySelectorAll('.servisec_timepicker');
					    if(allpick){
					        for(var z = 0; z< allpick.length; z++){
					            var that = allpick[z];
					            that.classList = "";
					            that.classList.add( "service_tour_datepicker", "service_tour_datepicker"+z+"", "guide__label_select");
					            jQuery(".service_tour_datepicker"+z+"").datepicker();              
					        }
					      }

						if(allHour){
					        for(var g = 0; g< allHour.length; g++){
					            var thet = allHour[g];
					            thet.classList = "";
					            thet.classList.add("servisec_timepicker", "servisec_timepicker"+g+"", "guide__label_select");
					            jQuery(".servisec_timepicker"+g+"").wickedpicker();           
					        }
					    }								
					};
				
// ==========================================ALL TAB ON START POSITION=======================================
			if(jQuery('.tour_services')){
					function Sl(a){return document.querySelector(''+a+'');}	
			
					+function(){
						jQuery('.tour_body_tab').css('display','none');
						jQuery('.tour_body_tab.tour_body_tab_accomodation').css('display','block');
						jQuery('.tab_accomodation_head').removeClass('tab_accomodation_head_active');
						jQuery('.tab_accomodation_head_hotel').addClass('tab_accomodation_head_active');
						jQuery('.tab_accomodation_head_content_appartament, .tab_accomodation_head_content_other').css('display','none');
						jQuery('.tab_accomodation_head_content_hotel').css('display','block');
					}();


// ===================================SWITCH TAB=================================
					jQuery('.tour_services_tab').click(function(){
						var that = jQuery(this);
						var servId = that.attr('id');
						if(!that.hasClass('tour_services_tab_active')){
							jQuery('.tour_services_tab').removeClass('tour_services_tab_active');
							that.addClass('tour_services_tab_active');
						}
						if(servId == 'tour_tab_accomodation'){							
							jQuery('.tour_body_tab').css('display','none');
							jQuery('.tour_body_tab.tour_body_tab_accomodation').css('display','block');
							jQuery('.service_tab_name_mobile').text('Accomodation');
						}
						if(servId == 'tour_tab_transfer'){
								jQuery('.tour__tab_transfer_content_to').css('display','none');
								jQuery('.tour__tab_transfer_content_from').css('display','block');
								jQuery('.tab_transfer_from_to').removeClass('tab_transfer_from_to_active');
								jQuery('.tour__tab_transfer_from').addClass('tab_transfer_from_to_active');
								jQuery('.tour_body_tab').css('display','none');
								jQuery('.tour_body_tab.tour_body_tab_transfer').css('display','block');
								jQuery('.service_tab_name_mobile').text('Transfer');
						}
						if(servId == 'tour_tab_guide'){
								jQuery('.tour_body_tab').css('display','none');
								jQuery('.tour_body_tab.tour_body_tab_guide').css('display','block');
								jQuery('.service_tab_name_mobile').text('Interpreter/Guide');								
						}
						if(servId == 'tour_tab_special'){
								jQuery('.tour_body_tab').css('display','none');
								jQuery('.tour_body_tab.tour_body_tab_special').css('display','block');
								jQuery('.service_tab_name_mobile').text('Special');
						}
					});


// =========================SET SELECT VALUE =====================================

					selectDropdown();
					function selectDropdown(){
						jQuery('.service_select_wrap li').click(function(){
						var elText = jQuery(this).text();			
						var parentSelect = jQuery(this).closest('.service_select_wrap');
						parentSelect.find('.guide__label_select_text').text(elText);						
						parentSelect.find('.form_servise_select').val(elText)

						});
					}
// =========================CLEAR SELECT VALUE =====================================
					function setOldvalue(){
						var allSelect = jQuery('.form_servise_select');
						for(var s = 0; s < allSelect.length; s++){
							var prevValue = allSelect[s].value;
							// console.log(allSelect[s].parentElement.childNodes[3].childNodes[0]);
							allSelect[s].parentElement.childNodes[3].childNodes[0].innerText = prevValue;
						}								
					}
							

// ===============================GENERATE CONTENT==========================
// ====================================================================

					const guideContent = jQuery('.tab_guide_wrap').html();
					const transferContent = jQuery('.tour_tab_transfer_repeat').html();
					const acomoContent = jQuery('.tour_body_tab_accomodation').html();

					jQuery('.tour_services_button_add_more').click(function(){

						var parent_Id = jQuery('.tour_services_tab_active').attr('id');						
						var specAd = jQuery('.tab_special_wrap_message').length;
						var guideAd = jQuery('.tab_guide_wrap_heading').length;
						var transferAd = jQuery('.tour__tab_transfer_head').length;
						var accomoAd = jQuery('.tour_tab_accomodation_head').length;

						
						if(parent_Id == 'tour_tab_accomodation' && accomoAd < 3){
							// var oldAccomod = jQuery('.tour_body_tab_accomodation').html();
							//jQuery('.tour_body_tab_accomodation').html(oldAccomod + acomoContent);	
							jQuery('.tour_body_tab_accomodation').append(acomoContent);					
							accomodControl();
							createPicker();
							selectDropdown();
							setOldvalue();							
						}

						if(parent_Id == 'tour_tab_transfer' && transferAd < 3){
							// var oldTransfer = jQuery('.tour_tab_transfer_repeat').html();
							jQuery('.tour_tab_transfer_repeat').append(transferContent);
							transferControl();
							createPicker();
							selectDropdown();
							setOldvalue();
						}

						if(parent_Id == 'tour_tab_guide' && guideAd < 3){
							// var oldGuide = jQuery('.tab_guide_wrap').html();
							jQuery('.tab_guide_wrap').append(guideContent);
							createPicker();
							selectDropdown();				
							setOldvalue();
						}

						if(parent_Id == 'tour_tab_special' && specAd < 3){
							// var oldSpecial = jQuery('.tab_special_wrap').html(); 
							jQuery('.tab_special_wrap').append('<p class="tab_special_wrap_heading">Custom service request</p><textarea class="tab_special_wrap_message" rows="5" cols="45" name="special_request"></textarea>');
						}
					});


// ========================controll accomodation tab=================================
					accomodControl();
							function accomodControl(){
								jQuery('.tab_accomodation_head').click(function(){
									
									var parentAk = jQuery(this).closest('.tour_body_tab_accomodation_wrap');

									parentAk.find('.tab_accomodation_head').removeClass('tab_accomodation_head_active');
									jQuery(this).addClass('tab_accomodation_head_active');
									var acId = jQuery(this).attr('id');

									if(acId == 'tab_accomodation_head_hotel'){
										parentAk.find('.tab_accomodation_head_content_appartament, .tab_accomodation_head_content_other').css('display','none');
										parentAk.find('.tab_accomodation_head_content_hotel').css('display','block');
									}
									if(acId == 'tab_accomodation_head_appartments'){
										parentAk.find('.tab_accomodation_head_content_hotel, .tab_accomodation_head_content_other').css('display','none');
										parentAk.find('.tab_accomodation_head_content_appartament').css('display','block');
									}
									if(acId == 'tab_accomodation_head_other'){
										parentAk.find('.tab_accomodation_head_content_appartament, .tab_accomodation_head_content_hotel').css('display','none');
										parentAk.find('.tab_accomodation_head_content_other').css('display','block');
									}
								});
							}
							
// ========================controll transfer tab=================================
							transferControl();
							function transferControl(){
								jQuery('.tab_transfer_from_to').click(function(){
									var parEl = jQuery(this).closest('.tour_tab_transfer_repeat_wrap');
									parEl.find('.tab_transfer_from_to').removeClass('tab_transfer_from_to_active');
									jQuery(this).addClass('tab_transfer_from_to_active');
									var elId = jQuery(this).attr('id');
									if(elId == 'tour__tab_transfer_from'){
										parEl.find('.tour__tab_transfer_content_to').css('display','none');
										parEl.find('.tour__tab_transfer_content_from').css('display','block');
									}
									if(elId == 'tour__tab_transfer_to'){
										parEl.find('.tour__tab_transfer_content_to').css('display','block');
										parEl.find('.tour__tab_transfer_content_from').css('display','none');
									}
									
								});
							};

// =============================== Write data ===================================

		// =========SERVICE VARIABLE===========================








					var serviceStage = 1;
					jQuery('.service_order_button_next').click(function(){
						if(serviceStage < 2){
							serviceStage++;
							serviceStep();
						}						
					});

					jQuery('.service_order_button_back').click(function(){
						if(serviceStage > 0){
							serviceStage--;
							serviceStep();
						}						
					});
					jQuery('.services_information_edit').click(function(){
						serviceStage=1;
						serviceStep();
					});
					jQuery('.services_order_information_edit').click(function(){
						serviceStage=0;
						serviceStep();
					});

					jQuery('.tour_services_button_reserve').click(function(){
						serviceStage = 1;
						serviceStep();

						var shotel = jQuery('.tab_accomodation_head_content_hotel');
						var sapartament = jQuery('.tab_accomodation_head_content_appartament');
						var smessage = jQuery('.tab_guide_wrap_message[name="accomodation_other"]');
						var sfrom = jQuery('.tour__tab_transfer_content_from');
						var sto = jQuery('.tour__tab_transfer_content_to');
						var sguide = jQuery('.tab_guide_send');
						var sspecial = jQuery('.tab_special_wrap_message');
						jQuery('.service_order_guide_city, .service_order_guide_date, .service_order_guide_hours, .service_order_guide_message,  .service_transfer_from_city, .service_transfer_from_place, .service_transfer_from_date, .service_transfer_from_hour, .service_transfer_from_passengers,   .service_order_city, .service_order_hotel, .service_order_hotel_dates, .service_order_hotel_guest, .service_order_hotel_rooms').html('');
						
						for (var i = 0; i < shotel.length; i++){
							if(shotel[i].childNodes[1].childNodes[1].childNodes[1].value != 'Select your city'){
								Sl('.service_order_city').innerHTML += '<p class="service_order_value_item">Hotel: '+shotel[i].childNodes[1].childNodes[1].childNodes[1].value+'</p>';
								Sl('.service_order_hotel').innerHTML += '<p class="service_order_value_item">'+shotel[i].childNodes[1].childNodes[3].childNodes[1].value+'</p>';
								Sl('.service_order_hotel_dates').innerHTML += '<p class="service_order_value_item">'+shotel[i].childNodes[1].childNodes[5].childNodes[1].value+' - '+shotel[i].childNodes[1].childNodes[7].childNodes[1].value+'</p>';
								Sl('.service_order_hotel_guest').innerHTML += '<p class="service_order_value_item">'+shotel[i].childNodes[5].childNodes[7].childNodes[1].value+'</p>';
								Sl('.service_order_hotel_rooms').innerHTML += '<p class="service_order_value_item"><span>Single '+shotel[i].childNodes[5].childNodes[1].childNodes[3].value+'</span><span>Double '+shotel[i].childNodes[5].childNodes[3].childNodes[3].value+'</span><span>Tween '+shotel[i].childNodes[5].childNodes[5].childNodes[3].value+'</span></p>';
							}
							if(sapartament[i].childNodes[1].childNodes[1].childNodes[1].value != 'Select your city'){
								Sl('.service_order_city').innerHTML += '<p class="service_order_value_item">Appartaments: '+sapartament[i].childNodes[1].childNodes[1].childNodes[1].value+'</p>';
								Sl('.service_order_hotel').innerHTML += '<p class="service_order_value_item">-</p>';
								Sl('.service_order_hotel_dates').innerHTML += '<p class="service_order_value_item">'+sapartament[i].childNodes[1].childNodes[5].childNodes[1].value+' - '+sapartament[i].childNodes[1].childNodes[7].childNodes[1].value+'</p>';
								Sl('.service_order_hotel_guest').innerHTML += '<p class="service_order_value_item">'+sapartament[i].childNodes[1].childNodes[3].childNodes[1].value+'</p>';
								Sl('.service_order_hotel_rooms').innerHTML += '<p class="service_order_value_item"><span>Rooms '+sapartament[i].childNodes[5].childNodes[1].childNodes[3].value+'</span><span>Single '+sapartament[i].childNodes[5].childNodes[3].childNodes[3].value+'</span><span>Double '+sapartament[i].childNodes[5].childNodes[5].childNodes[3].value+'</span><span >Twin'+sapartament[i].childNodes[5].childNodes[7].childNodes[3].value+'</span></p>';
								console.log(sapartament[i].childNodes[5].childNodes[1].childNodes[1]);

							}
							if(smessage[i].value != ''){
								Sl('.service_order_accomod_wishes').innerHTML += '<p class="service_order_value_item">Special request: '+smessage[i].value+'</p>';
							}

						}

						for (var q = 0; q < sfrom.length; q++){
							if(sfrom[q].childNodes[1].childNodes[1].childNodes[1].value != 'Select your city'){
								Sl('.service_transfer_from_city').innerHTML += '<p class="service_order_value_item">From: '+sfrom[q].childNodes[1].childNodes[1].childNodes[1].value+'</p><p class="service_order_value_item">To: '+sto[q].childNodes[1].childNodes[1].childNodes[1].value+'</p>';
								Sl('.service_transfer_from_place').innerHTML += '<p class="service_order_value_item">'+sfrom[q].childNodes[1].childNodes[3].childNodes[1].value+'</p><p class="service_order_value_item">'+sto[q].childNodes[1].childNodes[3].childNodes[1].value+'</p>';
								Sl('.service_transfer_from_date').innerHTML += '<p class="service_order_value_item">'+sfrom[q].childNodes[1].childNodes[5].childNodes[1].value+'</p><p class="service_order_value_item">'+sto[q].childNodes[1].childNodes[5].childNodes[1].value+'</p>';
								Sl('.service_transfer_from_hour').innerHTML += '<p class="service_order_value_item">'+sfrom[q].childNodes[3].childNodes[1].value+'</p><p class="service_order_value_item">'+sto[q].childNodes[3].childNodes[1].value+'</p>';
								Sl('.service_transfer_from_passengers').innerHTML += '<p class="service_order_value_item">'+sfrom[q].childNodes[1].childNodes[7].childNodes[1].value+'</p><p class="service_order_value_item">'+sto[q].childNodes[1].childNodes[7].childNodes[1].value+'</p>';
							}
						}

						for (var j = 0; j < sguide.length; j++ ){
							if(sguide[j].childNodes[1].childNodes[1].childNodes[1].value != 'Select your city'){
								Sl('.service_order_guide_city').innerHTML += '<p class="service_order_value_item">'+sguide[j].childNodes[1].childNodes[1].childNodes[1].value+'</p>';
								Sl('.service_order_guide_date').innerHTML += '<p class="service_order_value_item">'+sguide[j].childNodes[1].childNodes[3].childNodes[1].value+'</p>';
								Sl('.service_order_guide_hours').innerHTML += '<p class="service_order_value_item">'+sguide[j].childNodes[1].childNodes[5].childNodes[1].value+' - '+sguide[j].childNodes[1].childNodes[7].childNodes[1].value+'</p>';
								Sl('.service_order_guide_message').innerHTML += '<p class="service_order_value_item">'+sguide[j].childNodes[5].childNodes[1].value+'</p>';
							}
						}

						for (var f = 0; f < sspecial.length; f++){
							Sl('.service_order_special_message').innerHTML += '<p class="service_order_value_item">'+sspecial[f].value+'</p>';
						}								


					});



					var phone, email;
					function serviceStep(){
						document.querySelector('.service_error_mesages').innerHTML = "";
						if(serviceStage == 0){
							jQuery('.service_order').css('display','none');
							jQuery('.tour_services, .footer, .header').css('display','block');
						}
						if(serviceStage == 1){
							jQuery('.service_order_button_next, .service_order, .service_order_block_personal, .service_order_heading_step1').css('display','block');
							jQuery('.service_order_button_submit, .tour_services, .service_order_block_step2, .service_order_heading_step2, .footer, .header').css('display','none');
						}
						if(serviceStage == 2){
							
															

				if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(jQuery('.order__data_mail').val())){
					email = true;
				} 
 
			    var regex = new RegExp("^[0-9\+]{1,}[0-9\- ]{3,15}$");
			     phone = regex.test(jQuery('.order__data_phone').val()); 

			    if(jQuery('.order__data_firstname').val() == ""){
			    	serviceStage = 1;
					document.querySelector('.service_error_mesages').innerHTML += '<p class="order_warning_message order_warning_firstn">You have entered invalid First Name!</p>';
			    }
			    if(jQuery('.order__data_lastname').val() == ""){
			    	serviceStage = 1;
					document.querySelector('.service_error_mesages').innerHTML += '<p class="order_warning_message order_warning_lastn">You have entered invalid Last Name!</p>';
			    }
				if(!email){
					serviceStage = 1;
					document.querySelector('.service_error_mesages').innerHTML += '<p class="order_warning_message order_warning_mail">You have entered invalid email address!</p>'; 
				}
				if(!phone){
					serviceStage = 1;
					document.querySelector('.service_error_mesages').innerHTML += '<p class="order_warning_message order_warning_phone">You have entered invalid phone number!</p>'; 
				} 
				if(jQuery('.order__data_firstname').val() == "" || jQuery('.order__data_lastname').val() == "" || !email || !phone){
					return;
				}



							var Sfirstname = jQuery('.order__data_firstname').val();
							var Slastname = jQuery('.order__data_lastname').val();
							var SphoneNumber = jQuery('.order__data_phone').val();
							var ScustEmail = jQuery('.order__data_mail').val();
							var ScustBirthday = jQuery('.order_persons_birthday_day').val()+" "+jQuery('.order_persons_birthday_mounth').val()+" "+jQuery('.order_persons_birthday_year').val();
							var Scountry = jQuery('.order__data_country').val();
							var Scity = jQuery('.order__data_city').val();				
							var Scompany = jQuery('.order__data_company').val();
							if(document.getElementById("order_tour_male").checked){								
								Sl('.order_customer__sex').innerText = 'Male';								
							}
							if(document.getElementById("order_tour_female").checked){								
								Sl('.order_customer__sex').innerText = 'Female';								
							}
								Sl('.order_customer__firstname').innerText = Sfirstname;
								Sl('.order_customer__lastname').innerText = Slastname;
								Sl('.order_customer__phone').innerText = SphoneNumber;
								Sl('.order_customer__mailname').innerText = ScustEmail;
								Sl('.order_customer__birthday').innerText = ScustBirthday;
								Sl('.order_customer__country').innerText = Scountry;
								Sl('.order_customer__city').innerText = Scity;
								Sl('.order_customer__company').innerText = Scompany;


							jQuery('.service_order_button_submit, .service_order_block_step2, .service_order_heading_step2').css('display','block');
							jQuery('.service_order_button_next, .service_order_block_personal, .service_order_heading_step1').css('display','none');
						}


					}

					jQuery('.service_order_button_submit').click(function(){
						jQuery('.order_wraper_spiner').css('display', 'flex');
								var accomodation_row = jQuery('.tab_accomodation_head_content_hotel');
								var accomodation_apart = jQuery('.tab_accomodation_head_content_appartament');
								var accomodation_message = jQuery('.tab_guide_wrap_message[name="accomodation_other"]');
								var accomodation_hotel = '';
								var accomodation_apartament = '';
								var accomodation_other = '';
								var transfer_from = jQuery('.tour__tab_transfer_content_from');
								var transfer_from_content = "";
								var transfer_to = jQuery('.tour__tab_transfer_content_to');
								var transfer_to_content = "";

								var guide_wrap = jQuery('.tab_guide_send');
								var guide_content = "";
								var special_message = jQuery('.tab_special_wrap_message');
								var special_message_content = "";

								

								for (var h = 0; h < accomodation_row.length; h++){
									if(accomodation_row[h].childNodes[1].childNodes[1].childNodes[1].value != 'Select your city'){								
										accomodation_hotel += ""+(h+1)+") Hotel:";
										accomodation_hotel += "City:"+accomodation_row[h].childNodes[1].childNodes[1].childNodes[1].value+"; Level:"+accomodation_row[h].childNodes[1].childNodes[3].childNodes[1].value+"; Check in Date:"+accomodation_row[h].childNodes[1].childNodes[5].childNodes[1].value+"; Check out Date:"+accomodation_row[h].childNodes[1].childNodes[7].childNodes[1].value+"; Single:"+accomodation_row[h].childNodes[5].childNodes[1].childNodes[3].value+"; Double:"+accomodation_row[h].childNodes[5].childNodes[3].childNodes[3].value+ "; Twin:"+accomodation_row[h].childNodes[5].childNodes[5].childNodes[3].value+"; Guest:"+accomodation_row[h].childNodes[5].childNodes[7].childNodes[1].value+"! \n    ";
									}
								}
								for (var q = 0; q < accomodation_apart.length; q++) {
									if(accomodation_apart[q].childNodes[1].childNodes[1].childNodes[1].value != 'Select your city'){
										accomodation_apartament +=""+(q+1)+") Apartament:";
										accomodation_apartament += "City:"+accomodation_apart[q].childNodes[1].childNodes[1].childNodes[1].value+"; Guest:"+accomodation_apart[q].childNodes[1].childNodes[3].childNodes[1].value+"; Check in Date:"+accomodation_apart[q].childNodes[1].childNodes[5].childNodes[1].value+"; Check out Date:"+accomodation_apart[q].childNodes[1].childNodes[7].childNodes[1].value+"; Rooms:"+accomodation_apart[q].childNodes[5].childNodes[1].childNodes[3].value+"Single"+accomodation_apart[q].childNodes[5].childNodes[3].childNodes[3].value+"; Double "+accomodation_apart[q].childNodes[5].childNodes[5].childNodes[3].value+"; Twin"+accomodation_apart[q].childNodes[5].childNodes[7].childNodes[3].value+"!\n ";
									}
								}

								for (var j = 0; j < accomodation_message.length; j++) {
									if(accomodation_message[j].value != ''){
										accomodation_other += ""+(j+1)+") Message:"+accomodation_message[j].value+";!  \n  ";
									}		
								}

								for(var b = 0; b < transfer_from.length; b++){
									if(transfer_from[b].childNodes[1].childNodes[1].childNodes[1].value != 'Select your city'){
										transfer_from_content += ""+(b+1)+") Transfer From: City:"+transfer_from[b].childNodes[1].childNodes[1].childNodes[1].value+"; From place:"+transfer_from[b].childNodes[1].childNodes[3].childNodes[1].value+"; Departure date:"+transfer_from[b].childNodes[1].childNodes[5].childNodes[1].value+";  Passengers:"+transfer_from[b].childNodes[1].childNodes[7].childNodes[1].value+"; Transfer time:"+transfer_from[b].childNodes[3].childNodes[1].value+";!  \n ";	
									}
								}

								for(var c = 0; c < transfer_to.length; c++){
									if(transfer_to[c].childNodes[1].childNodes[1].childNodes[1].value != 'Select your city'){
										transfer_to_content += ""+(c+1)+") Transfer To: City:"+transfer_to[c].childNodes[1].childNodes[1].childNodes[1].value+"; To place:"+transfer_to[c].childNodes[1].childNodes[3].childNodes[1].value+"; To date:"+transfer_to[c].childNodes[1].childNodes[5].childNodes[1].value+";  Passengers:"+transfer_from[c].childNodes[1].childNodes[7].childNodes[1].value+"; To time:"+transfer_to[c].childNodes[3].childNodes[1].value+";! \n";
									}
								}
								

								for(var f = 0; f < guide_wrap.length; f++){
									if(guide_wrap[f].childNodes[1].childNodes[1].childNodes[1].value != 'Select your city'){
										guide_content += ""+(f+1)+")Interpreter/Guide: City:"+guide_wrap[f].childNodes[1].childNodes[1].childNodes[1].value+"; Date:"+guide_wrap[f].childNodes[1].childNodes[3].childNodes[1].value+"; Hour from:"+guide_wrap[f].childNodes[1].childNodes[5].childNodes[1].value+"; Hour to:"+guide_wrap[f].childNodes[1].childNodes[7].childNodes[1].value+"; Note:"+guide_wrap[f].childNodes[5].childNodes[1].value+";!\n "					
									}
								}
								for (var r = 0; r< special_message.length; r++) {
									if(special_message[r].value != ''){
										special_message_content += ""+(r+1)+") Special message:" +special_message[r].value+";! \n";	
									}				
								}

								var sex = '';
								var firstname = jQuery('.order__data_firstname').val();
								var lastname = jQuery('.order__data_lastname').val();
								var phoneNumber = jQuery('.order__data_phone').val();
								var custEmail = jQuery('.order__data_mail').val();
								var custBirthday_day = jQuery('.order_persons_birthday_day').val();
								var custBirthday_month = jQuery('.order_persons_birthday_mounth').val()
								var custBirthday_day_year = jQuery('.order_persons_birthday_year').val();
								var country = jQuery('.order__data_country').val();
								var city = jQuery('.order__data_city').val();				
								var company = jQuery('.order__data_company').val();

								if(document.getElementById("order_tour_male").checked){ 	Ssex = 'Male';	}
								if(document.getElementById("order_tour_female").checked){	Ssex = 'Female';	}


								var servicedata = {
												action: 		'service',
												hotel: 			accomodation_hotel,
												apartament: 	accomodation_apartament,
												other_accomo : 	accomodation_other,
												transfer_from: 	transfer_from_content,
												transfer_to: 	transfer_to_content,
												guide: 			guide_content,
												special_message: 	special_message_content,
												
												Sfirstname: 	firstname,
												Slastname: 		lastname,
												SphoneNumber: 	phoneNumber,
												ScustEmail: 	custEmail,
												Scountry: 		country,
												Scity: 			city,
												Scompany: 		company,

												birthday_day: 	custBirthday_day,
												birthday_mounth: custBirthday_month,
												birthday_year: 	custBirthday_day_year,
												Ssex: 			sex,
											};
											// console.log(servicedata);
											jQuery.post({ url:MyAjax.ajaxurl, data:servicedata, success:function(response) {
													 //console.log("+" + response + "+");						
													window.location.href = window.location.href = MyAjax.home_url+'/register/';

												}, error:function(jqXHR, exception){
													// console.log("Error:" + exception + "+");
													window.location.href = window.location.href = MyAjax.home_url+'/register/'; 
												},
											});
					});
					}

					window.addEventListener('DOMContentLoaded', function(){
						if(document.querySelector('.review_hide_description_serv')){
								jQuery('.review_hide_description_serv').click(function(){
									var el = jQuery(this).parent( ".list_tour_content_item" );
									var clasEl = el.next('.profile_service_block_desc').hasClass('profile_service_block_desc_hide');
									if(clasEl){
										el.next('.profile_service_block_desc').removeClass('profile_service_block_desc_hide');
										// el.next('.profile_service_block_desc').css('display','none');
										el.find('.list_tour_service_review').css('display','none');
										el.find('.list_tour_service_hide').css('display','inline-block');
										el.find('.review_hide_description_serv img').css('transform','rotate(180deg)');
									} else {
										el.next('.profile_service_block_desc').addClass('profile_service_block_desc_hide');
										el.find('.list_tour_service_review').css('display','inline-block');
										el.find('.list_tour_service_hide').css('display','none');
										el.find('.review_hide_description_serv img').css('transform','rotate(0deg)');
									}
									

								});
						}
					});
				})();