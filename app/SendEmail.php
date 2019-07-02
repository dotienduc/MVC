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
		    $mail->IsSMTP(); 
			$mail->SMTPDebug = 1; 
			$mail->SMTPAuth = true; 
			$mail->SMTPSecure = 'ssl'; 
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465;
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
