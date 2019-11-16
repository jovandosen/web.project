$(document).ready(function(){

	$("#password-eye").on("click", function(){
		showHidePassword();
	});

	$("#login-button").on("click", function(){
		validateLogin();
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

function validateLogin()
{
	var email = $("#email").val();
	var password = $("#password").val();

	var emailError = '';
	var passwordError = '';
	var error = false;

	if( email == '' ){
		error = true;
		emailError = 'Email field can not be empty.';
		$("#email-error p").text(emailError);
		$("#email").addClass("form-field-error");
	} else {
		if( validateEmailAddress(email) === false ){
			error = true;
			emailError = 'Email address is not valid.';
			$("#email-error p").text(emailError);
			$("#email").addClass("form-field-error");	
		}
	} 

	if( emailError == '' ){
		$("#email-error p").text('');
		$("#email").val(email);
		if( $("#email").hasClass("form-field-error") ){
			$("#email").removeClass("form-field-error");
		}
	}

	if( password == '' ){
		error = true;
		passwordError = 'Password field can not be empty.';
		$("#password-error p").text(passwordError);
		$("#password").addClass("form-field-error");
	} else {
		var passwordLength = password.length;
		if( passwordLength < 3 || passwordLength > 20 ){
			error = true;
			passwordError = 'Password field must have at least 3 characters, but not more than 20.';
			$("#password-error p").text(passwordError);
			$("#password").addClass("form-field-error");
		}
	}

	if( passwordError == '' ){
		$("#password-error p").text('');
		if( $("#password").hasClass("form-field-error") ){
			$("#password").removeClass("form-field-error");
		}
	}

	if( error === false ){
		$("#login-form").submit();
	}

}

function validateEmailAddress(email)
{
	var regularEx = /\S+@\S+\.\S+/;

	return regularEx.test(email);
}