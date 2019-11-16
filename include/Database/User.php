<?php

namespace App\Database;

use App\Database\Connection;

class User extends Connection
{
	public function register($name, $email, $password)
	{
		$sql = "INSERT INTO users(name, email, password, created, updated, logged, loggTime) VALUES(?, ?, ?, ?, ?, ?, ?)";

		$record = $this->connection->prepare($sql);

		$currentDateTime = date('Y-m-d H:i:s');

		$logged = 1;

		$password = password_hash($password, PASSWORD_DEFAULT);

		$record->bind_param("sssssis", $name, $email, $password, $currentDateTime, $currentDateTime, $logged, $currentDateTime);

		$record->execute();

		$user = $this->findUserByEmail($email);

		$_SESSION['user'] = $user;
		$_SESSION['message'] = 'You have successfully registered.';

		$record->close();

		$this->connection->close();

		header('Location: /../../profile/profile.php');
	}

	public function findUserByEmail($email)
	{
		$sql = "SELECT * FROM users WHERE email=?";

		$record = $this->connection->prepare($sql);

		$record->bind_param("s", $email);

		$record->execute();

		$details = $record->get_result();

		$user = '';

		if( $details->num_rows === 1 ){
			while($row = mysqli_fetch_object($details)){
				$user = $row;
			}
		}

		return $user; 
	}
}

?>