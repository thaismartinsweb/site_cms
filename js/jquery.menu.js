$(function(){

	$('#menu').removeClass('in').css('height', '0');

	if(!isMobile()){
		$("#menu > ul > li").hover(
			function(){
				$(this).find('.nav-hover').show(200);
			}, function(){
				if(!$(this).hasClass('current')){
					$(this).find('.nav-hover').hide(100);
				}
			}
		);
		
		var windowTop = $(document).scrollTop() + 90;
		var currentLi = null;
		
		var pageHome = $('#slider').offset().top;
		var pageAbout = $('#about').offset().top;
		var pageServices = $('#services').offset().top;
		var pagePortfolio = $('#portfolio').offset().top;
		var pageContact = $('#contact').offset().top;
		
		var pages = {home: pageHome, about: pageAbout, services: pageServices, portfolio: pagePortfolio, contact: pageContact};
		
		$.each(pages, function(key, value) {
			if(Math.abs(value) < Math.abs(windowTop)){
				currentLi = key;
			}
		});
		
		if(currentLi){
			$('li.current').removeClass('current').find('.nav-hover').hide();
			$('li.' + currentLi).addClass('current').find('.nav-hover').show(200);
		}
		
	}

});