<?php

namespace App\Database;

use App\Database\Connection;
use App\Mail\WelcomeMail;

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

		$sendWelcomeMail = new WelcomeMail($user->name, $user->email);

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

	public function logout($id)
	{
		$sql = "UPDATE users SET logged=? WHERE userID=?";

		$record = $this->connection->prepare($sql);

		$logged = 0;

		$record->bind_param("ii", $logged, $id);

		$record->execute();

		$record->close();

		$this->connection->close();
	}

	public function login($email, $password)
	{
		$sql = "SELECT * FROM users WHERE email=?";

		$record = $this->connection->prepare($sql);

		$record->bind_param("s", $email);

		$record->execute();

		$result = $record->get_result();

		$user = '';

		if( $result->num_rows === 1 ){
			while( $row = mysqli_fetch_object($result) ){
				$user = $row;
			}
		} else {
			return array('email', 'Email address is not correct or does not exist.');
		}

		if($user){
			if( password_verify($password, $user->password) ){
				
				$sqlData = "UPDATE users SET logged=?, loggTime=? WHERE userID=?";

				$recordData = $this->connection->prepare($sqlData);

				$logged = 1;

				$loggTime = date('Y-m-d H:i:s');

				$recordData->bind_param("isi", $logged, $loggTime, $user->userID);

				$recordData->execute();

				$_SESSION['user'] = $user;

				$record->close();

				$recordData->close();

				$this->connection->close();

				header('Location: /../../profile/profile.php');

			} else {
				return array('password', 'Password is not correct.');
			}
		}

	}
}

?>