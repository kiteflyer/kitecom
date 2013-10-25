$(document).ready(function() {

	$('.goBottom').click(function() {
		var go = $('#footer').position().top;
		window.scrollTo(0, go);
		return false;
    });
	
	

	//$('.startpage').animate({ marginTop: '-155px' }, 3000);
	
});


jQuery(function() {
 		

	var width =  	$(document).width();
	var height = $(document).height();


		//Slider Startseite
		jQuery('#bannerscollection_zoominout_opportune').bannerscollection_zoominout({
/*				skin: 'opportune',
				responsive:true,
				width: 4000,
				height: 3000,
				fadeSlides:true,
				width100Proc:true,
				height100Proc:true,		
				circleRadius:13,
				enableTouchScreen: false,
				circleLineWidth: 8,
				showNavArrows: false,
				circleColor: "#35fa00",
				pauseOnMouseOver: false,
				circleAlpha: 100,
				behindCircleColor: "#f7f7f7",
				behindCircleAlpha: 50,				
				autoPlay: 10,
				thumbsWrapperMarginTop: -125,
				showBottomNav: true,
				initialZoom:1,
				finalZoom:1,
				duration:400,
*/
				skin: 'majestic',
				responsive:true,
				responsiveRelativeToBrowser:true,
				width100Proc:true,
				width: 1920,
				height: 800,

				fadeSlides:1,
				circleRadius:13,
				enableTouchScreen: false,
				circleLineWidth: 8,
				showNavArrows: false,
				circleColor: "#35fa00",
				pauseOnMouseOver: false,
				circleAlpha: 100,
				behindCircleColor: "#f7f7f7",
				behindCircleAlpha: 50,				
				autoPlay: 10,
				thumbsWrapperMarginTop: -125,
				showBottomNav: true,

			});	
			
			
			//goBottom
			$('.goBottom').fadeIn('slow');			
 
});
 
 

 
$(window).scroll(function () {
    var top = $(document).scrollTop();
    if (top == '0') {
		$('.goBottom').fadeIn('slow');
	}else{
		$('.goBottom').fadeOut('slow');
	}

});



	$(document).ready(function(){	
		$("#container_latest .item").hover(
		
				function () {
					
					$(this).addClass("hover");
					id  = $('.isotope-item.hover').attr('data-uid');
					kat = $('.isotope-item.hover').attr('data-category');
					var countElement = $(this).find('.hovercontent p').length;
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
		
		
		
		
			$container = $('#container_latest');	
		
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
	

			$container.isotope({ sortBy: 'date',  sortAscending : false })	

	});

 
 
 