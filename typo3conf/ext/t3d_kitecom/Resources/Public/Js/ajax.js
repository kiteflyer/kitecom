//google.maps.visualRefresh = true;
var firstcall = false;
var showElements={};
var $container = $('#container');
var view;
var filters = {};


var lat;
var lng;


var id;
var kat;
//Suche von Ort weg beginnen oder von meinem aktuellen Standort
function checkStandort() {
	if ($('#where').val())
		meinStandort();
		//getPlace();
	else
		meinStandort(); 
}

//map
var markersmap = [];
var markers = [];


var mapOptions = {
	zoom: 6,
	maxZoom: 10,
	center: new google.maps.LatLng(46.044922,7.363882),
	mapTypeId: google.maps.MapTypeId.ROADMAP

}

var map = new google.maps.Map(document.getElementById('map_overview'), mapOptions);

var bounds;


(function($) {
	$(document).ready(function(){
	
		//Initialisieren
		//$('#search .btn-gray').trigger('click');
		view = $('.view > .active').attr('data-view');
		

		
		//Affix Filtertop
		/*
		$('.filter').affix({
            offset: 56
		});
		*/
		//Affix Leftcontent Map and Accordionfilters
		/*
		$('.leftdata').affix({
            offset: 83
		});
		*/		
		/*
		var thewidth = $('.span2.left').width();
		//console.log(thewidth);
		$('leftdata.affix').css('width',thewidth);
		*/
	


		
	  

	  

	  

		
		$('#clear').click(function(){
			$('#container').text('List(s):');
			return false;
		});


	






		//Accordion Pfeile rechts 
	    $('#filterWindow .accordion').on('show', function (e) {
	         $(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
			 $('.accordion-toggle.active').find('i').removeClass('icon-angle-left').addClass('icon-angle-down');
	    });
	
	    $('#filterWindow .accordion').on('hide', function (e) {
	        $(this).find('.accordion-toggle').not($(e.target)).removeClass('active');
			$('.accordion-toggle:not(active)').find('i').removeClass('icon-angle-down').addClass('icon-angle-left');
	    });
		//Accordion End

	
			
			




		
		
		//Linke Spalte ein-bzw. ausblenden
		$('body').on('click','.collapse-filter', function(e){
	
			$('#filterWrap').parent().parent().parent().toggleClass('hideLeft');			
					
			//$('#filterWrap').toggle();						
			//$('.span10.mycontent').toggleClass('fullWidth');

			if ($('#filterWrap').parent().parent().parent().hasClass('hideLeft')) {
				setTimeout(function(){
					$('#filterWrap').slideToggle();
				}, 0);
				
			}else{

				//$('#filterWrap').show();
				$('#filterWrap').slideToggle();
				
			}
	
			setTimeout(function(){				
					reloadIsotopeAfterFilters();
			}, 150);
			
			
		});	
	
	
		
		
		//Like
		$('body').on('click','.iLike', function(e){
			id = $(this).attr('data-uid');
			kat = $(this).attr('data-show');	
			state = $(this).attr('data-state');	
			$.ajax({
			  data: {type:101,elementid:id,katid:kat,state:state},
			  url: "index.php?id=19&tx_t3dkitecom_Userinteraction[controller]=UserInteraction&tx_t3dkitecom_userinteraction[action]=like",
			  success: function(result) {  
				  getAllByElement();
				  getHoverAjax(id,kat);
			  },
			});   	
			return false;
		});	
		
		//Ich war hier
		$('body').on('click','.myVisitedPlace', function(e){
			id = $(this).attr('data-uid');
			kat = $(this).attr('data-show');		
			state = $(this).attr('data-state');	
			$.ajax({
			  async: false,
			  type:"GET",
			  data: {type:101,elementid:id,katid:kat,state:state},
			  type:"GET",			
			  url: "index.php?id=19&tx_t3dkitecom_Userinteraction[controller]=UserInteraction&tx_t3dkitecom_userinteraction[action]=wasthere",
			  success: function(result) {  
				  getAllByElement();
				  getHoverAjax(id,kat);				  
			  },
			});   	
			return false;
		});

		//Ich habe hier gelernt
		$('body').on('click','.myStudy', function(e){
			id = $(this).attr('data-uid');
			kat = $(this).attr('data-show');		
			state = $(this).attr('data-state');				
			$.ajax({
			  async: false,
			  type:"GET",			
			  data: {type:101,elementid:id,katid:kat,state:state},			  
			  url: "index.php?id=19&tx_t3dkitecom_Userinteraction[controller]=UserInteraction&tx_t3dkitecom_userinteraction[action]=student",
			  success: function(result) {  
				  getAllByElement();
				  getHoverAjax(id,kat);
			  },
			});   	
			return false;
		});
		
		

		//Mein Favorit
		$('body').on('click','.myFavorit', function(e){
			id = $(this).attr('data-uid');
			kat = $(this).attr('data-show');
			state = $(this).attr('data-state');	
			$.ajax({
			  async: false,
			  type:"GET",			
			  data: {type:101,elementid:id,katid:kat,state:state},			  			  
			  url: "index.php?id=19&tx_t3dkitecom_Userinteraction[controller]=UserInteraction&tx_t3dkitecom_userinteraction[action]=favorite",
			  success: function(result) {  
				  getAllByElement();
				  getHoverAjax(id,kat);
			  },
			});   	
			return false;
		});
		
		//Ich bin Local
		$('body').on('click','.local', function(e){
			id = $(this).attr('data-uid');
			kat = $(this).attr('data-show');
			state = $(this).attr('data-state');				
			$.ajax({
			  async: false,
			  type:"GET",			
			  data: {type:101,elementid:id,katid:kat,state:state},			  			  
			  url: "index.php?id=19&tx_t3dkitecom_Userinteraction[controller]=UserInteraction&tx_t3dkitecom_userinteraction[action]=local",
			  success: function(result) {  
				  getAllByElement();
				  getHoverAjax(id,kat);
			  },
			});   	
			return false;
		});									
	
	
		//Reload all Userinteractions
		function getAllByElement() {
			if(id && kat) {

				$.ajax({
				  async: false,
				  type:"GET",				
				  data: {type:101,elementid:id,katid:kat},
				  url: "index.php?id=19&tx_t3dkitecom_Userinteraction[controller]=UserInteraction&tx_t3dkitecom_userinteraction[action]=list",
				  success: function(result) {  
					  $('#'+kat+id+' .userinteractions').slideToggle().empty().append(result).slideToggle();
				  },
				});   		
			}
		}


		
	
	
		//Einzelne Filter löschen
		$('body').on('click','.filter .icon-remove-sign.search', function(e){
			//var filter = $(this).attr('data-filter');
			var field = $(this).attr('data-field');
			address='';
			$(this).parent().remove();
			$('#search input#'+field).val("");
			
			//Suche auslösen
			$('#search .btn-gray').trigger('click');
		});		
		
		//Einzelne Filter löschen linke Spalt
		$('body').on('click','.filter .icon-remove-sign.myfilter', function(e){
			//var filter = $(this).attr('data-filter');
			var filter = $(this).attr('data-field');
			var category = $(this).attr('data-category');
			
			
			$(this).parent().remove();
			$('#search input#'+filter).val("");
			$('#filterWrap .accordion-group input[data-filter='+filter+']').prop('checked',false);
			$('a:data(category=music)');
			//to test!?
			

			//Filter löschen und Isotope laden
			filters[category] = jQuery.grep(filters[category], function(value) {
			  	return value != '.'+filter;
			});
			//$container.isotope({ filter: filters[category].join('')});
			reloadIsotopeAfterFilters();

		});		



		
		//Alle Filter löschen		
		$('body').on('click','.clearAll', function(e){
			e.preventDefault();

			address='';
			var research=false;
			if($('#who').val() || $('#where').val())
			research=true;
			
			$('#mysearchfilters').empty();
			$('#myfilters').empty();
			$('#search input:text').val("");
			
			
			resetFilters();
			//Suche auslösen
			if (research)
				$('#search .btn-gray').trigger('click');
			else
				reloadIsotopeAfterFilters();
	
			countFilterResults();
			return false;
		});	
		
	/*	
		$('#infoSearchModal').on('click','.ok', function () {
			console.log('ok')
			$('#container').empty();
			//Kategorien durchgehen
			$( ".category label" ).each(function(){
				if ($(this).hasClass('active')) {				
					var show = $(this).attr('data-show');	
					searchit('search',show);					
				}
			});
		})
		$('#infoSearchModal').on('click','.cancel', function () {
			console.log('hide');
		})
*/

		//Close Detail Window
		$('#detailModal').on('hidden', function () {
			hideDetail();
		})
		
		//Suche auslösen		
		$('body').on('click','#search .btn-gray', function(e){
			checkStandort();
			$('#loading').show();
			e.preventDefault();
		
		/*
			if(!$('#who').val() && !$('#where').val()) {
				$('#infoSearchModal').modal();
				return false;
			}
		*/
		//edit  ... test
			$('#container').empty();
			
			//Kategorien durchgehen
			$( ".btn-group.category label" ).each(function(){
				
				if ($(this).hasClass('active')) {				
				
					var show = $(this).attr('data-show');						
					
					searchit('search',show);					
				}
			});

		});
		
		
		
		
		//Daten neu laden oder ein- bzw ausblenden wenn schon vorhanden!
		$('body').on('click','.category label', function(e){
			e.preventDefault();
			var showact = $(this).attr('data-show');	

			
			if (!filters[showact])		
			filters[showact]=[];
			
			$(this).prev().trigger('click');
			
			//Wenn aktiv dann ausblenden
			if ($(this).hasClass('active')) {
				var hide = $(this).attr('data-show');	

				filters[hide] = ['temp'];

				
			}else{
			//Wenn inaktiv laden oder nur einblenden
				var show = $(this).attr('data-show');	
				//showElements[show].push('.'+show);
				

				
				filters[show] = jQuery.grep(filters[show], function(value) {
				  	return value != 'temp';
				});
				
				if (filters[show])
					filters[show].push('.'+show);
				else
					filters[show] = ['.'+show];
		
				if ($('.'+show).hasClass('isotope-hidden')) {
				}else{
					searchit('search',show);					
				}
				
	
				
			}


			if (firstcall) {
					reloadIsotopeAfterFilters();
			}				
				
			showAccordion();
			previewMap();

		});		
		
		//Filter linke Spalte
		$('body').on('click','#filterWrap .accordion-group input', function(e){
			//e.preventDefault();

			var filter = $(this).attr('data-filter');
			var category = $(this).attr('data-category');

			if ($(this).prop('checked')==false){
			
				filters[category] = jQuery.grep(filters[category], function(value) {
				  	return value != '.'+filter;
				});
				$('#myfilters .filter.'+filter).remove();				
			}else{
				filters[category].push("." + filter);	
				$('#myfilters').append('<div class="filter '+filter+' bg_'+category+'">'+$(this).val()+' <i data-field="'+filter+'" data-category="'+category+'" data-filter="'+$(this).val()+'" class="icon-remove-sign myfilter"></i></div>');        
			
			}

			//dump(filters);
			reloadIsotopeAfterFilters();
			countFilterResults();		
			previewMap();
			
		});
		
		
		$('body').on('click','.sort button', function(e){			
			var sort = $(this).attr('data-sort');
			var order=true;
			
			//Bei Rating (likes) desc nicht asc
			if (sort == 'rating')
			order = false;
			

			
			$container.isotope({ sortBy : sort, sortAscending : order });
		});

		$('body').on('click','.view button', function(e){
			view = $(this).attr('data-view');
			if (view =='map') {
				$('#map_overview').appendTo($('#map_full')).show();			
				$('#map_full').show();
				$('#container').hide();
				$('#list').hide();
				//test
			    var style = document.getElementById('map_overview').style;
			    style.width = '100%';
			    style.height = '100%';
			    google.maps.event.trigger(map, 'resize');
			    map.setZoom(map.getZoom());
				map.fitBounds(bounds);		
				//test
			}else{
				$('#search .btn-gray').trigger('click');
				$('#map_overview').prependTo($('#filterWrap')).show();
				var style = document.getElementById('map_overview').style;
			    style.width = '225px';
			    style.height = '225px';
			    google.maps.event.trigger(map, 'resize');
			    map.setZoom(map.getZoom());
				map.fitBounds(bounds);		
				$('#map_full').hide();
				$('#container').show();
				$('#list').show();
				
			}
		});
		
		$('.button-group').button();
		$('body').on('click','.myentrys button', function(e){			
			var limit = $(this).attr('data-limit');
			if (limit)
			limit = '.'+limit;
			$container.isotope({ filter: limit });
		});		

		function reloadIsotopeAfterFilters() {

			
			var allfilters='';
			
			$.each(filters, function(index, el) {
				allfilters = allfilters+el.join('')+',';
				
			});				
			
			allfilters=allfilters.substring(0, allfilters.length - 1);
			

			//$container.isotope({ filter: '.'+category+filters[category].join('')});			
			$container.isotope({ filter: allfilters});						
		
		}

		//doppelte IDs herausfinden	
		/*	
		$('[id]').each(function(){
		  var ids = $('[id="'+this.id+'"]');
		  if(ids.length>1 && ids[0]==this)
		    console.warn('Multiple IDs #'+this.id);
		});
		*/
		
	});
})(jQuery);




function resetFilters() {
	$( ".category input" ).each(function(){
	var cat = $(this).val();
	
	if ($(this).prop('checked')){
		filters[cat] = ['.'+cat];		
	}else{
		filters[cat] = ['temp'];					
	}	
	
});	

	
	$('#filterWrap .accordion-group input').prop('checked',false);
	$('#filterWrap .accordion-group input').removeProp('checked');
}

// Big SearchIT Function -> Brings all the Data...
function searchit(load,show) {

	var waittime=0;
	var sort;
	var searchdata='';
	var search = {};	
	if (load == 'search') {
	
		//Suchfelder
		var searchInputElements = $('#search input:text');
		//Ansicht
		

		//Sortierung
		sort = $('.sort > .btn.active').attr('data-sort');
	
		//Suchfilter zurücksetzten
		$('#mysearchfilters').empty();
		
		$.each(searchInputElements, function(index, el) {

			


			if (address && address !='undefined') {
		        if ($(el).attr('id') == 'where') {
			        $(el).val(address);
		        }
	        }

	        //console.log($(el).val());			

	        //search[$(el).attr('id')] = $(el).val();
	        
			//Filter setzten
	        if ($(el).val())
			$('#mysearchfilters').append('<div class="filter">'+$(el).val()+' <i data-field="'+$(el).attr('id')+'" data-filter="'+$(el).val()+'" class="icon-remove-sign search"></i></div>');        
		});		

		//hack
		if (view == 'map')
		view = 'images';
		
		search['view']=view;
		//search['sort']=sort;
		search['show']=show;		

		//Hack, wenn eigener Standort nicht gefunden wurde
		if (!lat) {
			waittime = 2000;
			checkStandort();
		}
		

		search['where']=$('#where').val();
		
		search['lat']=lat;
		search['lng']=lng;
		searchdata = search;
		
		
	}else{
		search['show'] = show;
		searchdata = search;
	}
	
	
	setTimeout(function() {
		$.ajax({
		  type:"GET",
		  url: "index.php?id=15&tx_t3dkitecom_search[controller]=Search&tx_t3dkitecom_search[action]=getdata&type=101",
		  data: searchdata,
		  //{"who":$('#who').val()},
		  success: function(result) {
			  listResult(result,view);
			  $('#loading').hide();
		  },
		  error: function(result) {
		  	  listResult('nichts gefunden');          
	      }
		});   			      
	}, waittime);		
		
}


$(document).ajaxStart(function() {
	$('#loading').show();
    $('#loading').html('<img src="/fileadmin/templates/img/ajax-loader.gif" alt="loading" />');
});
$(document).ajaxStop(function() {
	$('#loading').hide();    
});




function listResult(result,view) {
	//console.log('x');
	//wegen doppeltem content gelöscht
	//$('#container').append(result);
	//view = $('.view > .active').attr('data-view');

	if (view == 'images') {
		view = 'container';
		$container = $('#container');	
	}
	if (view == 'list') {
		view = 'list';
		$container = $('#list');	
	}	

	
	//if (view != 'map') {

		if (firstcall == false) {
			//$('#container').append(result);
			$('#'+view).append(result);
			//einmaliger Aufruf
			$container.isotope({
			  // options
			  itemSelector : '.item',
			  layoutMode : 'fitRows',
			  getSortData : {
				name : function ( $elem ) {
				  	return $elem.attr('data-name');
				},
				rating : function ( $elem ) {
				  	return parseInt( $elem.attr('data-rating'), 10 );
				},			
				distance : function ( $elem ) {
					return parseInt( $elem.find('.distance').text(), 10 );
				},		
				date : function ( $elem ) {
				  	return parseInt( $elem.attr('data-date'), 10 );
				},							
			  }		  
			});
			
			//Filter zurücksetzten
			//resetFilters();
			
			// Accordioin einblenden
	
			showAccordion();		
					
			firstcall = true;
		}else{
			var $newItems = $(result);
			$container.append( $newItems ).isotope( 'reloadItems' );
			//$container.isotope({ sortBy: 'name' })
			$container.isotope({ sortBy: 'distance' })
		}
	
	
	
		//count FilterResults
		countFilterResults();
		hoverItem();
		previewMap();
//	}
	

}

function hoverItem() {

	$(".item").hover(
		function () {
			$(this).addClass("hover");
			$(this).find('.hovercontent').next().stop().animate({"opacity": 0.6});
			$(this).find('.hovercontent').fadeIn(1000);
		},
		function () {
			$(this).removeClass("hover");
			$(this).find('.hovercontent').next().stop().animate({"opacity": 1});			
			$(this).find('.hovercontent').stop().hide();
		}
	);
/*
	$(".login").hover(

		function () {
			
			$(this).addClass("hover");
			id  = $('.isotope-item.hover').attr('data-uid');
			kat = $('.isotope-item.hover').attr('data-category');
			var countElement = $(this).find('.hovercontent p').length;
			console.log(countElement);
			$(this).find('.hovercontent').next().stop().animate({"opacity": 0.6});

			if (countElement == 0) {
				getHoverAjax(id,kat);
			}
			$(this).find('.hovercontent').fadeIn(1000);
		},
		function () {
			$(this).removeClass("hover");
			$(this).find('.hovercontent').next().stop().animate({"opacity": 1});			
			$(this).find('.hovercontent').stop().hide();
		}
	);
	*/	
}
function reloadItemHover() {
			id  = $('.isotope-item.hover').attr('data-uid');
			kat = $('.isotope-item.hover').attr('data-category');
			$(this).find('.hovercontent').next().stop().animate({"opacity": 0.6});
			getHoverAjax(id,kat);
			$(this).find('.hovercontent').fadeIn(1000);

}
//Hovercontent laden (User bereits geklickt oder nicht)
function getHoverAjax(id,kat) {

	$.ajax({
	  type: "GET",
	  data: {type:101,elementid:id,katid:kat},
	  url: "index.php?id=19&tx_t3dkitecom_Userinteraction[controller]=UserInteraction&tx_t3dkitecom_userinteraction[action]=hover",
	  success: function(result) {  
		  $('#'+kat+id+' .hovercontent').empty().append(result);
		  hoverItem();
	  },
	  error: function(error) {
		    dump(error);
      }	  
	});   		
}		


function countFilterResults() {

	$( ".accordion-inner label input" ).each(function(){
		var field=$(this).attr('data-filter');
		var kat=$(this).attr('data-category');

		var count = $('.'+kat+'.'+field).not(".isotope-hidden").length;		
		
		
		if($(this).next().hasClass('count')) {	
			
		$(this).next().empty();
		$(this).next().append(count);
		}
		
		
		
	});	
			
	
}

function showAccordion(){

		if(filters) {
			$('#filterWrap .accordion-group').hide();
			$.each(filters,function(number, value){
		          $('#filterWrap '+value).show();
		    });
			
		}else{		
			$( ".category label" ).each(function(){
				if ($(this).hasClass('active')) {				
					$('#filterWrap .'+$(this).attr('data-show')).show();
				}else{
					$('#filterWrap .'+$(this).attr('data-show')).hide();
				}
			});
		}
}
function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    console.log(out);

    // or, if you wanted to avoid alerts...

    var pre = document.createElement('pre');
    pre.innerHTML = out;
    document.body.appendChild(pre)
}




function distance(lat_2,lng_2) {


	if (!lat) {
		//console.log(lat);
		meinStandort();
	}

	//lat = 40;
	//lng = 7;  
	// Compute spherical coordinates
	var rho = 3960.0; // earth diameter in miles
	// convert latitude and longitude to spherical coordinates in radians
	// phi = 90 - latitude
	var phi_1 = (90.0 - lat)*Math.PI/180.0;
	var phi_2 = (90.0 - lat_2)*Math.PI/180.0;
	// theta = longitude
	var theta_1 = lng*Math.PI/180.0;
	var theta_2 = lng_2*Math.PI/180.0;
	// compute spherical distance from spherical coordinates
	// arc length = \arccos(\sin\phi\sin\phi'\cos(\theta-\theta') + \cos\phi\cos\phi')
	// distance = rho times arc length
	var d = rho*Math.acos( Math.sin(phi_1)*Math.sin(phi_2)*Math.cos(theta_1 - theta_2) + Math.cos(phi_1)*Math.cos(phi_2) );
	// Display result in miles and in kilometers
	//var output = \"Distance = \" + d + \" miles or \" + 1.609344*d + \" kilometers\";
	var distance = 1.609344*d;
	//console.log(distance);
	distance = Math.round (distance * 100) / 100;
	return distance+' km';
}			
function meinStandort() {
  
	var options = {
	  enableHighAccuracy: true,
	  timeout: 1000,
	  maximumAge: 0
	};
	
	function success(pos) {
	  var crd = pos.coords;
	  lat = crd.latitude;
	  lng = crd.longitude;
	  //$( ".isotope-item" ).not(".isotope-hidden").each(function( index ) {	
	  //});
	  return true;
	  
	};
	
	function error(err) {
	  //console.log('ERROR(' + err.code + '): ' + err.message);
	};
	
	navigator.geolocation.getCurrentPosition(success, error, options);
	
	
  
}
function getPlace() {

	geocoder = new google.maps.Geocoder();
    var address =  $('#where').val();
    

    if (address) {    
	    geocoder.geocode( { 'address': address}, function(results, status) {
	        if (status == google.maps.GeocoderStatus.OK) {

				lat = results[0].geometry.location.lat();
				lng = results[0].geometry.location.lng();
				
				
	        } else {
	            meinStandort();
	        }
	    });
    }
};



function codeAddress() {
	geocoder = new google.maps.Geocoder();
    var address =  $('#where').text();
    
    if (address) {
    
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
/*            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                draggable: true,
            });
*/

        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
    }
}








function clearOverlays() {

	for (var i = 0; i < markersmap.length; i++ ) {
	    markersmap[i].setMap(null);
	}
	markersmap = [];
	markers = [];	
	
}
function previewMap() {
		bounds = new google.maps.LatLngBounds();

		clearOverlays();
		var i = 0;
		$( ".isotope-item" ).not(".isotope-hidden").each(function( index ) {

				var lat = $(this).attr('data-lat');
				var lng = $(this).attr('data-lng');
				var title = $(this).find('h3').html();
				var kat = $(this).attr('data-kat');
				var uid = $(this).attr('data-uid');


				if (lng && lat && i < 1000) {
					markers.push({
						lat:lat,
						title:title,
						uid:uid,
						lng:lng,
						kat:kat
					});		
				
				}
				i++;
		});
		
		


	$.each(markers, function(index, m) {
		
	    makeMarker(markers[index]);

	});
	map.fitBounds(bounds);		
	//fullmap.fitBounds(bounds);		
}
function makeMarker(options){
	var latLng = new google.maps.LatLng(options.lat,options.lng);
	var marker = new google.maps.Marker({
        position: latLng,
        icon: '/fileadmin/templates/img/icon_'+options.kat+'.png',
        uid: options.uid,
        kat: options.kat,
        map: map
        //zIndex: Math.round(latLng.lat()*-100000)<<5
    });
    
	bounds.extend(latLng);

    markersmap.push(marker);
	

    google.maps.event.addListener(marker, 'click', function(e) {
    	
    	goPreview($(this)[0].uid,$(this)[0].kat);
    	
    });		
    	
}








