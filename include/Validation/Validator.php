<?php

namespace App\Validation;

class Validator
{
	private $name;
	private $email;
	private $password;

	public function __construct($name, $email, $password)
	{
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
	}

	public function validateName()
	{
		$nameError = false;

		if( empty($this->name) ){
			$nameError = 'Name field can not be empty.';
			return $nameError;
		} else {
			$nameLength = strlen($this->name);
			if( $nameLength < 3 || $nameLength > 20 ){
				$nameError = 'Name field must have at least 3 characters, but not more than 20.';
				return $nameError;
			}
		}

		return $nameError;
	}

	public function validateEmail()
	{
		$emailError = false;

		if( empty($this->email) ){
			$emailError = 'Email field can not be empty.';
			return $emailError;
		} else {
			if( !$this->validateEmailAddress($this->email) ){
				$emailError = 'Email address is not valid.';
				return $emailError;
			}
		}
	}

	public function validatePassword()
	{
		$passwordError = false;

		if( empty($this->password) ){
			$passwordError = 'Password field can not be empty.';
			return $passwordError;
		} else {
			$passwordLength = strlen($this->password);
			if( $passwordLength < 3 || $passwordLength > 20 ){
				$passwordError = 'Password field must have at least 3 characters, but not more than 20.';
				return $passwordError;
			}
		}
	}

	private function validateEmailAddress($email)
	{
		$result = preg_match('/\S+@\S+\.\S+/', $email);
		return $result;
	}
}

?>