$(document).ready(function(){

	$("#profile-name-link, #profile-links").mouseover(function(){
		$("#profile-links").css({"display":"block"});
	});

	$("#profile-name-link, #profile-links").mouseout(function(){
		$("#profile-links").css({"display":"none"});
	});

});