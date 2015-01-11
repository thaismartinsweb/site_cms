function handleAjaxResponse(response) {
	
	$('#sendFail').hide();
	$('#sendOk').hide();
	
	if(response.code == '200'){
		$('#sendOk').find('p').html(response.message);
		$('#sendOk').show();
	} else {
		$('#sendFail').find('.errors').html(response.message);
		$('#sendFail').show();
	}
}