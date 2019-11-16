<?php

namespace App\Validation;

use App\Validation\Validator;

class ValidateLogin extends Validator
{
	public function __construct($email, $password)
	{
		parent::__construct('', $email, $password);
	}
}

?>