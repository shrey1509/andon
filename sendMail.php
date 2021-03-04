<?php
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	$email = $_POST['email'];
	$otp = rand(1000,9999);
	$_SESSION['otp']=$otp;

	

	
	require_once "vendor/autoload.php";

	$mail = new PHPMailer(true);

	//Enable SMTP debugging.
	$mail->SMTPDebug = 1;                               
	//Set PHPMailer to use SMTP.
	$mail->isSMTP();            
	//Set SMTP host name                          
	$mail->Host = "smtp.gmail.com";
	//Set this to true if SMTP host requires authentication to send email
	$mail->SMTPAuth = true;      
	$mail->SMTPSecure = 'tls';                    
	//Provide username and password     
	$mail->Username = "shreyaswaitforitdorle@gmail.com";                 
	$mail->Password = "waitingforit";                           
	                          
	//Set TCP port to connect to
	$mail->Port = 587;                                   

	$mail->From = "shreyaswaitforitdorle@gmail.com";
	$mail->FromName = "shreyas";

	$mail->addAddress($email, "Dorle");

	$mail->isHTML(true);

	$mail->Subject = "Change OTP";
	$mail->Body = "<i>OTP:</i>".$otp;
	$mail->AltBody = "Try";

	try {
	    $mail->send();
	    echo "Message has been sent successfully";
	} catch (Exception $e) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	}


	header("Location: enterOTP.php");


	
?>