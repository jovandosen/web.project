$(document).ready(function(){

	$("#password-eye").on("click", function(){
		showHidePassword();
	});

});

function showHidePassword()
{
	var element = document.getElementById("password");

	if( element.type === "password" ){

		if( $("#password-eye").hasClass("fa-eye-slash") ){
			$("#password-eye").removeClass("fa-eye-slash");
			$("#password-eye").addClass("fa-eye");
		}
		
		element.type = "text";

	} else {

		if( $("#password-eye").hasClass("fa-eye") ){
			$("#password-eye").removeClass("fa-eye");
			$("#password-eye").addClass("fa-eye-slash");
		}

		element.type = "password";
	}
}