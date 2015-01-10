$(function(){
	
	$('#formContact').submit(function(){
		
		$('.telefone').hide();
		$('.email').hide();
		$('.nome .site').hide();
		$('.site').hide();
		$('.all').hide();
		$('#sendOk .alert').hide();
		
		$.ajax({
			url: "send.php",
			type: "POST",
			data: $(this).serialize(),
		}).done(function(result) {

			if(result == 1){
				$('#sendOk .alert').show();
			} else {
				$('#sendFail').find('.' + result).show();
			}
		}).fail(function() {
			$('#sendFail').find('.all').show();
		});
		
		return false;
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
			$('#layerslider').css('min-height', alturaColuna);
		}

	}

});