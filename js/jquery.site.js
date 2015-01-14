$(function(){
	
	$('.tabSelect').click(function(){
		
		var targetName = $(this).attr('dataContent');
		var target = $('[data="' + targetName + '"]');
		
		if(!target.hasClass('currentSelected')){
			
			$('.tabSelect').removeClass('tabSelected');
			$(this).addClass('tabSelected')
			
			$('.currentSelected').hide();
			$('.currentSelected').removeClass('currentSelected');
			
			target.show(200);
			target.addClass('currentSelected');
		}
	});
	
	$('#onepage > li > a').click(function(){
		$('.collapse.in').removeClass('in').css('height', '0');
	});
	
	$('#onepage').onePageNav({
		begin: function() {
		},
	});
	
	jQuery("#slider").layerSlider({
		responsive: true,
		responsiveUnder: 768,
		layersContainer: 768,
		skin: 'minimalfull',
		navPrevNext: true,
		navStartStop : false,
		navButtons : true,
		pauseOnHover : false,
		showCircleTimer : false,
		thumbnailNavigation : false,
		skinsPath: '/js/skins/'
	});


	if(!isMobile()){
		
		var altura = $(window).height();
		var alturaColuna = altura - 90;
		
		if(altura){
			
			$('.general-content').css('min-height', alturaColuna);
			$('#full-slider-wrapper').css('min-height', (alturaColuna - 400));
			$('#layerslider').css('min-height', alturaColuna);
		}
	}

});