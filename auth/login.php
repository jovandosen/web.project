<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/../assets/images/image_test.jpg">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="/../assets/css/index.css">
		<link rel="stylesheet" type="text/css" href="/../assets/css/register.css">
		<link rel="stylesheet" type="text/css" href="/../assets/css/login.css">
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

		<div id="login-container">
			<form method="post" action="login.php" id="login-form">
				
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

				<div id="login-button-container">
					<button type="button" id="login-button">LOGIN</button>
				</div>

				<input type="hidden" name="login-user" id="login-user" value="login-user" />

			</form>
		</div>

		<script src="/../assets/js/login.js"></script>
	</body>
</html>