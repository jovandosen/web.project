$(document).ready(function(){

	$("#forgot-password-button").on("click", function(){
		validateForgotPassword();
	});

	getAllEmails();

});

function validateForgotPassword()
{
	var email = $("#email").val();
	var emails = $("#user-emails").val();

	var emailError = '';
	var error = false;

	if( email == '' ){
		error = true;
		emailError = 'Email field can not be empty.';
		$("#email-error p").text(emailError);
		$("#email").addClass("form-field-error");
	} else if( validateEmailAddress(email) === false ) {
		error = true;
		emailError = 'Email address is not valid.';
		$("#email-error p").text(emailError);
		$("#email").addClass("form-field-error");	
	} else {
		emails = emails.split(",");
		var checkEmailExists = 0;
		for(var i = 0; i < emails.length; i++){
			if( email == emails[i] ){
				checkEmailExists = 1;
			}
		}
	}

	if( checkEmailExists === 0 ){
		error = true;
		emailError = 'Email address does not exists.';
		$("#email-error p").text(emailError);
		$("#email").addClass("form-field-error");
	}

	if( emailError == '' ){
		$("#email-error p").text('');
		$("#email").val(email);
		if( $("#email").hasClass("form-field-error") ){
			$("#email").removeClass("form-field-error");
		}
	}

	if( error === false ){
		$("#forgot-password-form").submit();
	}

}

function validateEmailAddress(email)
{
	var regularEx = /\S+@\S+\.\S+/;

	return regularEx.test(email);
}

function getAllEmails()
{
	$.ajax({
		url: "/../include/External.php",
		method: "POST",
		success: function(response){
			if(response){
				var emails = JSON.parse(response);
				$("#user-emails").val(emails);
			} else {
				$("#user-emails").val('');
			}
			
		},
		error: function(){

		}	
	});
}