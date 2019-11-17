$(document).ready(function(){

	$("#profile-name-link, #profile-links").mouseover(function(){
		$("#profile-links").css({"display":"block"});
	});

	$("#profile-name-link, #profile-links").mouseout(function(){
		$("#profile-links").css({"display":"none"});
	});

	checkRegisterFlashMessage();

});

function checkRegisterFlashMessage()
{
	var message = $("#register-flash-message p").text();

	if( message != '' ){
		setTimeout(function(){
			$("#register-flash-message").css({"display":"none"});
		}, 5000);
	}
}