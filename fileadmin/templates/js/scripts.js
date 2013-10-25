var address;

	//Login redirect hack
	var state = History.getState();

	if (state.url.search(/logintype/) !== -1 ){
		$('.tx-felogin-pi1').hide();
		$('.tx-dixeasylogin-pi1').hide();
		window.location.replace("http://www.kitecom.net");		
	}
	// end Login redirect hack


	//Direktaufruf Preview abfangen //TODO Seite SEarch laden und preview window öffnen
	if (state.url.search(/preview/) !== -1 ){
			var id = '1143';
			var show = 'schule';		
			window.location.replace("http://www.kitecom.net/kite/search");
			//goPreview(id,show);						
	}
	
	//Direktaufruf Detail abfangen //TODO Seite Search laden und detail Window öffnen
	if (state.url.search(/detail/) !== -1 ){
			var id = '1143';
			var show = 'schule';		
			//window.location.replace("http://www.kitecom.net/kite/search");
			//goDetail(id,show);						
	}
	
	
	var historyHandler = function (){
		var state = History.getState();
	}

//http://www.kitecom.net/kite/search/ajax/detail_spot?tx_t3dkitecom_spot[spot]=27

	/*
	if (state.url.search(/p/) !== -1 ){
		console.log('preview');
	}
	if (state.url.search(/d/) !== -1 ){
		console.log('detail');
	}		
	*/



$(document).ready(function() {

		History.Adapter.bind(window, 'statechange', historyHandler);


	  //Autocomplete start
	  
	  
	  	$('#sp_search .sp_submit').click(function(){
		  	if (address)
			$('#sp_search #where').val(address);
		});
	  
	  
		$('#where').click(function(){
			$(this).val('');
			address='';
			return false;
		});
	  
	  
	  var input = document.getElementById('where');

	  if (input) {
		  var autocomplete = new google.maps.places.Autocomplete(input);
		  //console.log(autocomplete.setTypes(['geocode']));
		  
		  google.maps.event.addListener(autocomplete, 'place_changed', function() {
		          address = '';
		          var place = autocomplete.getPlace();
				  place.setTypes = ['geocode'];	          
		          if (place.geometry.viewport) {
		            	//map.fitBounds(place.geometry.viewport);
		            	//map.setZoom(15);  // Why 17? Because it looks good.	            	
		          } else {
			            //map.setCenter(place.geometry.location);
		            	//map.setZoom(15);  // Why 17? Because it looks good.
		          }
		          
	
		          if (place.address_components) {
		            address = [
		              (place.address_components[0] && place.address_components[0].short_name || ''),
		              (place.address_components[1] && place.address_components[1].short_name || ''),
		              (place.address_components[2] && place.address_components[2].short_name || '')
		            ];
		          }
				  console.log(address[0]);
				  //console.log(address[1]);
				  //console.log(address[2]);			  			  
				  address = address[0];
				  //console.log(address);
				  //$('#search_list input.btn').trigger('click');
		  });
		  //Autocomplete end	
	  }

		//Navigation Mover
		$('#mainnav li a').hover(function() {
		  $(this).next().stop().animate({ height: '4px' }, 200);
		}, function() {
		  $(this).next().stop().animate({ height: '0px' }, 200);
		});
		    
		    
/*
	$('.goBottom').click(function() {
		var go = $('#bottom').position().top;

		window.scrollTo(0, go);
		return false;
	});
*/


	/* Registrieren FORM AJAX */


	$('body').on('click','#login_window #datamints_feuser_12_submit', function(e){
		e.preventDefault();
		$('#login_window #datamints_feuser_12_form').submit();
	});
	
	$('body').on('submit','#login_window #datamints_feuser_12_form', function(){
	//decodeURIComponent()
	  //Serialize the form and post it to the server
	  $.post("index.php?id=13&type=101", $(this).serialize(), function(data){
	    var delay = 4000;
	    setTimeout(function(){
	      //window.location.href = 'index.php';
	    }, delay);
	    // Hide the modal
			$(".ajax_reg").html(data);		
	  });
		  return false;
	});

	/* Registrieren FORM AJAX END */


	/* LOGIN FORM AJAX */

	$('body').on('click','.forgot_pw', function(e){
	
	  $.post("index.php?id=12&tx_felogin_pi1%5Bforgot%5D=1&type=101", $(this).serialize(), function(data){
	    var delay = 4000;
	    setTimeout(function(){
	      //window.location.href = 'index.php';
	    }, delay);
			$(".ajax_login").html(data);		
			$(".bg_anmelden > h3:first").hide();
			$(".login_social").hide();
	  });
	
		return false;
	});
				
	
	$('body').on('click','#login_submit', function(e){
		e.preventDefault();
		$('#login_form').submit();
	});
	
	$('body').on('submit','#login_form', function(){
	
	  //Serialize the form and post it to the server
	  $.post("index.php?id=12&type=101", $(this).serialize(), function(data){
	    var delay = 4000;
	    setTimeout(function(){
	      //window.location.href = 'index.php';
	    }, delay);
	    // Hide the modal
		if (data.indexOf("login_form") < 0){
			$("#login_window").modal('hide');
			location.reload();
		}else{
			$(".ajax_login").html(data);		
			$(".ajax_login .controls input").addClass('f3-form-error');		
		}
	  });
	      return false;
	});


	$('body').on('click','#send_pw', function(e){
		e.preventDefault();
		$('#forgot_pw_form').submit();
	});
	
	$('body').on('submit','#forgot_pw_form', function(){
	
	  //Serialize the form and post it to the server
	  $.post("index.php?id=12&tx_felogin_pi1%5Bforgot%5D=1&type=101", $(this).serialize(), function(data){
	    var delay = 4000;
	    setTimeout(function(){
	      //window.location.href = 'index.php';
	    }, delay);
	    // Hide the modal
		//if (data.indexOf("login_form") < 0){
		//	$("#login_window").modal('hide');
		//	location.reload();
		//}else{
			$(".ajax_login").html(data);		
			$("#forgot_pw_form input#tx_felogin_pi1-forgot-email").addClass('f3-form-error');		
		//}
	  });
	      return false;
	});
	
	
	$('body').on('submit','.google input', function(){
	
	  //Serialize the form and post it to the server
	  $.post("index.php?id=12&type=101", $(this).serialize(), function(data){
	    var delay = 4000;
	    setTimeout(function(){
	      //window.location.href = 'index.php';
	    }, delay);
	    // Hide the modal
		//if (data.indexOf("login_form") < 0){
		//	$("#login_window").modal('hide');
		//	location.reload();
		//}else{
			$(".ajax_login").html(data);		
			$("#forgot_pw_form input#tx_felogin_pi1-forgot-email").addClass('f3-form-error');		
		//}
	  });
	      return false;
	});	
	
	
	$('body').on('click','#back_to_form', function(e){

				// Login Formular laden
				$.ajax({
					type: "GET",
					url: "/index.php?id=12&type=101",
					data: "",
					success: function(data){
						$(".ajax_login").html(data);
						$(".bg_anmelden > h3:first").show();
						$(".login_social").show();
					}
				});
	      return false;
				
	});

	/* LOGIN FORM AJAX END */


	/* Formulare Login Registrieren nachladen */

	$('body').on('click','a.usernav', function(e){
		if ($(this).parent().hasClass('dropdown')) {
			return false;
		}else{
			/*
			var url = $(this).attr("href");
			try {
				History.pushState(null, 'anmelden', url+'/anmelden/');
			}catch (e){}							
			*/
			// Login Formular laden
			$.ajax({
				type: "GET",
				url: "/index.php?id=12&type=101",
				data: "",
				success: function(data){
					$(".ajax_login").html(data);
				}
			});
			
	
			// Registrations Formular laden
			$.ajax({
				type: "GET",
				url: "/index.php?id=13&type=101", //document.domain
				data: "",
				success: function(data){
					$(".ajax_reg").html(data);				
				}
			});	
		}		
	});
	
	/* START Miniprofile Dropdown	*/
		$('.usernav a.dropdown-toggle').on('click', function(e){		
			$(this).parent().toggleClass('open');
			return false;
		});
	/* END Miniprofile Dropdown	*/	
	
	/* Formulare Login Registrieren nachladen END */
	
	
	/* Tooltips aktivieren */
	$('.mytooltips').tooltip();

}); //end document ready


$.scrollUp({
	scrollName: 'scrollUp',
	topDistance: '300', // Distance from top before showing element (px)
	topSpeed: 300, // Speed back to top (ms)
	animation: 'fade', // Fade, slide, none
	animationInSpeed: 200, // Animation in speed (ms)
	animationOutSpeed: 200, // Animation out speed (ms)
	scrollText: '<i class="icon-circle-arrow-up"></i>', // Text for element
	scrollImg: false,
	activeOverlay: false // Set CSS color to display scrollUp active point, e.g '#00FFFF'
});



//datepicker loginform
$('#datetimepicker4').datetimepicker({
  language: 'de',
  pickTime: false
});
//end datepicker


//Dropdowns
$(".chzn-select").chosen({placeholder_text_multiple:"Bitte wählen"});


//Alle Monate aktivieren Edit Form
$('body').on('click','#allMonth', function(e){
		$('#openingtimes option').prop('selected', true);
		$('select#openingtimes ').trigger('chosen:updated');
		return false;	
});
$('body').on('click','#allMonthDel', function(e){
		$('#openingtimes option').prop('selected', false);
		$('select#openingtimes ').trigger('chosen:updated');

		return false;	
});


//end Dropdowns



//ajax

		//Previewseite anzeigen
		$('body').on('click','.goPreview', function(e){
			var id = $(this).attr('data-uid');
			var show = $(this).attr('data-show');		
			var url = $(this).attr("href");

			goPreview(id,show);	
			try {
				//History.pushState(null, show, url+'/kite/search/ajax/preview?tx_t3dkitecom_'+show+'['+show+']='+id);
				History.pushState(null, show, url+'/kite/search/ajax/preview?show='+show+'&searchID='+id);										
			}catch (e){}
			
			return false;
		});
		
		$('body').on('click','.mycontent .close', function(e){
			 History.back();
			
		});

		
		
		
		//Detailseite anzeigen
		$('body').on('click','.goDetail', function(e){
			var detailData;
			var id = $(this).attr('data-uid');
			var show = $(this).attr('data-show');	
			var url = $(this).attr("href");
					
				  try {
						//History.pushState(null, show, url+'/kite/search/ajax/detail?tx_t3dkitecom_'+show+'['+show+']='+id);
						History.pushState(null, show, url+'/kite/search/ajax/detail?show='+show+'&searchID='+id);						
				  }catch (e){}				  			
			$.ajax({
			  url: "index.php?id=17&tx_t3dkitecom_search[controller]=Search&tx_t3dkitecom_search[action]=show&type=101&searchID="+id+"&show="+show,
			  data: detailData,
			  //{"who":$('#who').val()},
			  success: function(result) {
				  showDetail(result);
			  },
			  error: function(result) {
			  	  //listResult('nichts gefunden');          
		      }
			});   	
			
			return false;
		});	


function goPreview(id,show) {
	var detailData;
	$.ajax({
	  url: "index.php?id=18&tx_t3dkitecom_search[controller]=Search&tx_t3dkitecom_search[action]=preview&type=101&searchID="+id+"&show="+show,
	  data: detailData,
	  //{"who":$('#who').val()},
	  success: function(result) {
		  
		  showPreview(result);
	  },
	  error: function(result) {
	  	  //listResult('nichts gefunden');          
      }
	}); 			
}

function showDetail(result) {
	$('#previewPage').empty();
	$('#detailPage').empty();
	$('.hideForDetail').fadeOut('slow', function() {});
	$('#detailPage').append(result);	
    $('#detailModal').modal();
	$('.fotorama').fotorama();
	$('#detailModal').on('shown', function () {
	    $(".modal-header").scrollTop(0);
	});


}

function hideDetail () {
	$('.hideForDetail').fadeIn('slow', function() {});		
	$(window).trigger('resize');

}
function showPreview(result) {
	$('#detailPage').empty();
	$('#previewPage').empty();
	$('#previewPage').append(result);
    $('#previewModal').modal();	
}

