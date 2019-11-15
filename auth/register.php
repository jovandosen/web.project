<?php

	session_start();

	require __DIR__ . '/../vendor/autoload.php';

	use App\Validation\ValidateRegister;
	use App\Database\User;

	if( isset($_POST['register-user']) && !empty($_POST['register-user']) ){

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
			
		$validateRegisterData = new ValidateRegister($name, $email, $password);

		$nameError = $validateRegisterData->validateName();
		$emailError = $validateRegisterData->validateEmail();
		$passwordError = $validateRegisterData->validatePassword();

		if( $nameError === false && $emailError === false && $passwordError === false ){
			$user = new User();
			$user->register($name, $email, $password);
		}

	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Register</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/../assets/images/image_test.jpg">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="/../assets/css/index.css">
		<link rel="stylesheet" type="text/css" href="/../assets/css/register.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>
	<body>

		<div id="navigation">
			<ul>
				<li class="home">
					<a href="/../index.php">
						<div class="home-image">
							<i class="fa fa-home"></i>
						</div>
					</a>
				</li>
				<li><a href="register.php">REGISTER</a></li>
				<li><a href="#">LOGIN</a></li>
			</ul>
		</div>

		<div id="register-container">
			<form method="post" action="register.php" id="register-form">

				<div id="name-container">
					<div id="name-label">
						<label for="name"><i class="fa fa-user icon"></i> Name:</label>
					</div>
					<div id="name-field">
						<input type="text" name="name" id="name" autocomplete="off" minlength="3" maxlength="20" placeholder="Enter your name..." 
							class="<?php echo (isset($nameError) && !empty($nameError)) ? 'form-field-error' : ''; ?>" 
							value="<?php echo (isset($name) && !empty($name)) ? $name : ''; ?>" />
					</div>
					<div id="name-error">
						<p><?php echo (isset($nameError) && !empty($nameError)) ? $nameError : ''; ?></p>
					</div>
				</div>

				<div id="email-container">
					<div id="email-label">
						<label for="email"><i class="fa fa-envelope icon"></i> Email:</label>
					</div>
					<div id="email-field">
						<input type="text" name="email" id="email" autocomplete="off" placeholder="Enter your email address..." 
							class="<?php echo (isset($emailError) && !empty($emailError)) ? 'form-field-error' : ''; ?>" 
							value="<?php echo (isset($email) && !empty($email)) ? $email : ''; ?>" />
					</div>
					<div id="email-error">
						<p><?php echo (isset($emailError) && !empty($emailError)) ? $emailError : ''; ?></p>
					</div>
				</div>

				<div id="password-container">
					<div id="password-label">
						<label for="password"><i class="fa fa-key icon"></i> Password:</label>
					</div>
					<div id="password-field">
						<input type="password" name="password" id="password" minlength="3" maxlength="20" placeholder="Enter your password..." 
							class="<?php echo (isset($passwordError) && !empty($passwordError)) ? 'form-field-error' : ''; ?>" />
						<i class="fa fa-eye-slash" aria-hidden="true" id="password-eye"></i>
					</div>
					<div id="password-error">
						<p><?php echo (isset($passwordError) && !empty($passwordError)) ? $passwordError : ''; ?></p>
					</div>
				</div>

				<div id="register-button-container">
					<button type="button" id="register-button">REGISTER</button>
				</div>

				<input type="hidden" name="register-user" id="register-user" value="register-user" />

			</form>
		</div>

		<script src="/../assets/js/register.js"></script>
	</body>
</html>