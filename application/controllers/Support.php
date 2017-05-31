<?php
class Support extends CI_Controller{
	public function sendEmail(){
		require 'application\libraries\PHPMailerAutoload.php';
		$name = $_POST['firstname']." ".$_POST['lastname'];
		$mail = new PHPMailer;

			//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
				)
			);
		$mail->Username = 'thepiprojectph@gmail.com';                 // SMTP username
		$mail->Password = 'tpppassword';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		$mail->setFrom('thepiprojectph@gmail.com', $name);   // Add a recipient
		$mail->addAddress('thepiprojectph@gmail.com', 'The Pi Project');               // Name is optional
		$mail->addReplyTo($_POST['email'], $name);
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Support Request';
		$mail->Body    = "From:".$name. "<br>Message:".$_POST['message'];
		$mail->AltBody = $_POST['message'];
		if(!$mail->send()) {
			//echo 'Message could not be sent.';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
			$data['isSent'] = false;
		} else {
			$data['isSent'] = true;
			//echo 'Message has been sent';
		}
		header('Location:'.base_url()."support?sent=true");
	}
}