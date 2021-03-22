<?php
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;
	//unset ($_SESSION["min"]);
	//unset ($_SESSION["sec"]);


	$sc = $_POST['sc'];
	$m = $_POST['m'];
	$p = $_POST['p'];
	$s = $_POST['s'];
	$q = $_POST['q'];
	$mt = $_POST['mt'];
	
	$email=array(6);
	$probs=" ";
	$i=0;
	$j=0;
	if($sc!="")
	{
		$probs .=$sc." ";
		$email[$i++]="";//staff email
		
	}
	if ($m!="") {

		$probs .=$m." ";
		$email[$i++]="";//staff email
		
	}
	if ($p!="") {
		
		$probs .=$p." ";
		$email[$i++]="";//staff email
		
	}
	if ($s!="") {
		
		$probs .=$s." ";
		$email[$i++]="";//staff email
		
	}
	if ($q!="") {
		
		$probs .=$q." ";
		$email[$i++]="";//staff email
		
	}
	if ($mt!="") {
		
		$probs .=$mt." ";
		$email[$i++]="";//staff email
	}

	echo $probs;
	
	// echo implode(" ",$email); 

	require_once "../vendor/autoload.php";

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
	$mail->Username = "";//email                 
	$mail->Password = "";//pass                           
	                          
	//Set TCP port to connect to
	$mail->Port = 587;                                   

	$mail->From = "";//from email
	$mail->FromName = "name";

	while (list ($key, $val) = each ($email)) {
		$mail->AddAddress($val);
	}
	// foreach ($email as $key=>$val){
	// 	$mail->AddAddress($val);
	// }


	$mail->isHTML(true);

	$mail->Subject = "Issue Raised";
	$mail->Body = "<i>Issues in: </i>".$probs;
	$mail->AltBody = "Try";

	try {
	    $mail->send();
	    echo "Message has been sent successfully";
	} catch (Exception $e) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	}


	 header("Location: operator.php");


	
?>