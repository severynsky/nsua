	
	  jQuery(document).ready(function($) {

	  	//var flipUpElement = $("#flipUpMenuBox");

	  	function getReq() {

		  //var product_link = document.querySelector('input[name="tour_date"]:checked').attr("data-link");
		  var product_link = $('input[name="tour_date"]:checked').attr("data-link");
		  // console.log(product_link);
		  //alert(product_link);
		  //var xhttp = new XMLHttpRequest();

		  //xhttp.onreadystatechange = function() {
		   // if (this.readyState == 4 && this.status == 200) {
		      //document.getElementById("demo").innerHTML = this.responseText;
		       		  // var xhttp_2 = new XMLHttpRequest();
		       		  var end = product_link.indexOf('?', 8);
		       		  var base_url = product_link.substring(0, end);
		       		  var params = product_link.substring( end+1);
		      		  //alert(end + "!!!" + base_url);
		     //   		  xhttp_2.open("GET", base_url + "/cart", false);
					  // xhttp_2.send();
		    //}
		  //};
		  //xhttp.open("GET", product_link, false);
		  //xhttp.send();
		  $.get(base_url, 'clear-cart')
		  		.done(function( data ) {
				    //alert( "Data Loaded: " + data );
				    // console.log("cart is empty");
				    $.get( base_url, params).done( function(data){
				    	redirect();
				    });
				  });
		  //$.get( base_url, params);
		}
		function redirect(){
			var tour_id = $('input[name="tour_date"]:checked').attr("data-id");
			var base_url = $('input[name="base_url"]').attr("data-url");
			// console.log(base_url + 'order-tour/' + '?tour_id=' + tour_id);
			//alert(base_url);
			window.location.href = base_url + 'order-tour/' + '?tour_id=' + tour_id;
		}

	    $( "#buy_button" ).click(function(){
		  //getReq();
		  redirect();
		});
	  });




