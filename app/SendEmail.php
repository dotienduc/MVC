<?php 

namespace App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendEmail
{
	public function send($message, $email)
	{
		$mail = new PHPMailer(true);

		try {
		    $mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465; // or 587
			$mail->IsHTML(true);
			$mail->Username = "dotienduc1998@gmail.com";
			$mail->Password = "Dotienduc1998";
			$mail->SetFrom("dotienduc1998@gmail.com");
			$mail->Subject = "Confirm Email";
			$mail->Body = $message;
			$mail->AddAddress($email);

			$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
}
