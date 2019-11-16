<?php

	session_start();

	require __DIR__ . '/../vendor/autoload.php';

	if( isset($_SESSION['user']) && !empty($_SESSION['user']) ){
		$user = $_SESSION['user'];
		$userName = $user->name;
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Profile</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/../assets/images/image_test.jpg">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="/../assets/css/index.css">
		<link rel="stylesheet" type="text/css" href="/../assets/css/profile.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>
	<body>

		<div id="navigation">
			<ul>
				<li><a href="#">LINK</a></li>
				<li><a href="#">LINK</a></li>
				<li><a href="#">LINK</a></li>
				<li id="profile-name-link">
					<a href="#" id="profile-name"><?php echo $userName; ?></a>
					<ul id="profile-links" style="display: none;">
						<li><a href="#">Profile</a></li>
						<li><a href="#">Settings</a></li>
						<li><a href="#">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>

		<script src="/../assets/js/profile.js"></script>
	</body>
</html>