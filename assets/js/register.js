$(document).ready(function(){
	
	$("#password-eye").on("click", function(){
		showHidePassword();
	});

	$("#register-button").on("click", function(){
		//validateRegister();
		$("#register-form").submit();
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
	} else {
		var nameLength = name.length;
		if( nameLength < 3 || nameLength > 20 ){
			error = true;
			nameError = 'Name field must have at least 3 characters, but not more than 20.';
			$("#name-error p").text(nameError);
			$("#name").addClass("form-field-error");
		}
	}

	if( nameError == '' ){
		$("#name-error p").text('');
		if( $("#name").hasClass("form-field-error") ){
			$("#name").removeClass("form-field-error");
		}
	}

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
		$("#register-form").submit();
	}

}

function validateEmailAddress(email)
{
	var regularEx = /\S+@\S+\.\S+/;

	return regularEx.test(email);
}