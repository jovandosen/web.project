<?php

	session_start();

	require __DIR__ . '/../vendor/autoload.php';

	use App\Database\User;

	if( isset($_SESSION['user']) && !empty($_SESSION['user']) ){
		header('Location: /../profile/profile.php');
	}

	if( isset($_POST['forgot-password-hidden']) && !empty($_POST['forgot-password-hidden']) ){
		
		$email = $_POST['email'];
		$emails = $_POST['user-emails'];



	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forgot Password</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/../assets/images/image_test.jpg">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="/../assets/css/index.css">
		<link rel="stylesheet" type="text/css" href="/../assets/css/login.css">
		<link rel="stylesheet" type="text/css" href="/../assets/css/register.css">
		<link rel="stylesheet" type="text/css" href="/../assets/css/forgot-password.css">
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
				<li><a href="login.php">LOGIN</a></li>
			</ul>
		</div>

		<div id="forgot-password-container">
			<form method="post" action="forgot-password.php" id="forgot-password-form">
				
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

				<div id="forgot-password-button-container">
					<button type="button" id="forgot-password-button">SEND</button>
				</div>

				<input type="hidden" name="forgot-password-hidden" id="forgot-password-hidden" value="forgot-password-hidden" />

				<input type="hidden" name="user-emails" id="user-emails" value="" />

			</form>
		</div>

		<script src="/../assets/js/forgot-password.js"></script>
	</body>
</html>