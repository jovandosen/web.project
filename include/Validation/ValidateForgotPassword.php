<?php

namespace App\Validation;

use App\Validation\Validator;

class ValidateForgotPassword extends Validator
{
	public function __construct($email)
	{
		parent::__construct('', $email, '');
	}
}

?>