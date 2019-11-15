$(document).ready(function(){
	
	$("#password-eye").on("click", function(){
		showHidePassword();
	});

	$("#register-button").on("click", function(){
		validateRegister();
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

function validateRegister()
{
	var name = $("#name").val();
	var email = $("#email").val();
	var password = $("#password").val();

	var nameError = '';
	var emailError = '';
	var passwordError = '';
	var error = false;

	if( name == '' ){
		error = true;
		nameError = 'Name field can not be empty.';
		$("#name-error p").text(nameError);
		$("#name").addClass("form-field-error");
	}

	if( email == '' ){
		error = true;
		emailError = 'Email field can not be empty.';
		$("#email-error p").text(emailError);
		$("#email").addClass("form-field-error");
	}

	if( password == '' ){
		error = true;
		passwordError = 'Password field can not be empty.';
		$("#password-error p").text(passwordError);
		$("#password").addClass("form-field-error");
	}

}