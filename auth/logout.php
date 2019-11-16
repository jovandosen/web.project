<?php

	session_start();

	require __DIR__ . '/../vendor/autoload.php';

	use App\Database\User;

	$userData = $_SESSION['user'];
	$userId = $userData->userID;

	session_unset();
	session_destroy();

	$user = new User();
	$user->logout($userId);

	header('Location: /auth/login.php');

?>