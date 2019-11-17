<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ForgotPasswordMail
{
	private $name;
	private $email;

	public function __construct($name, $email)
	{
		$this->name = $name;
		$this->email = $email;

		$mail = new PHPMailer(true);

		try {

			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
		    $mail->isSMTP();                                            // Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = 'jovandosen994@gmail.com';              // SMTP username
		    $mail->Password   = 'gospodari';                            // SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
		    $mail->Port       = 587;

		    $mail->setFrom('jovandosen994@gmail.com', 'Jovan Dosen');
    		$mail->addAddress($this->email, $this->name);

    		$mail->isHTML(true);                                         // Set email format to HTML
    		$mail->Subject = 'Forgot Password Mail';
    		$mail->Body = "Click on <a href='web.project/profile/profile.php?email=".$this->email."'>link</a> to login.";

    		$mail->send();

		} catch (Exception $e){
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
}

?>