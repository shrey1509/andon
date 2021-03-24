<?php
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;
	//unset ($_SESSION["min"]);
	//unset ($_SESSION["sec"]);
	include '../resources/connect.php';
	$tableName="floorManager";


	$sc = $_POST['sc'];
	$m = $_POST['m'];
	$p = $_POST['p'];
	$s = $_POST['s'];
	$q = $_POST['q'];
	$mt = $_POST['mt'];

	if(isset($_SESSION['line'])){
            $line=$_SESSION['line'];
    }
	if(isset($_SESSION['station'])){
            $station=$_SESSION['station'];
        }
    if(isset($_SESSION['variant'])){
            $variant=$_SESSION['variant'];
    }
    if(isset($_SESSION['serial'])){
            $serial=$_SESSION['serial'];
    }
	
	$email=array(6);
	$probs=" ";
	$i=0;
	$j=0;
	$dept="";
	$totTime=$_POST['min'].":".$_POST['sec'];
	if($sc!="")
	{
		$probs .=$sc." ";
		$dept .= "Supply Chain"." ";
		$email[$i++]="";//staff email
		
	}
	if ($m!="") {

		$probs .=$m." ";
		$dept .= "Maintainence"." ";
		$email[$i++]="";//staff email
		
	}
	if ($p!="") {
		
		$probs .=$p." ";
		$dept .= "Production"." ";
		$email[$i++]="";//staff email
		
	}
	if ($s!="") {
		
		$probs .=$s." ";
		$dept .= "Store"." ";
		$email[$i++]="";//staff email
		
	}
	if ($q!="") {
		
		$probs .=$q." ";
		$dept .= "Quality"." ";
		$email[$i++]="";//staff email
		
	}
	if ($mt!="") {
		
		$probs .=$mt." ";
		$dept .= "Methods"." ";
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
	$mail->Body = "<i>Issues in: </i><br>"."Line:".$line."<br>"."Station:".$station."<br>"."Variant:".$variant."<br>"."Serial:".$serial."<br>"."Departments:".$dept."<br>"."Reasons:".$probs;
	$mail->AltBody = "Try";

	try {
	    $mail->send();
	    echo "Message has been sent successfully";
	} catch (Exception $e) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	}

	$sql = "UPDATE $tableName SET department='$dept',reason='$probs',totalTime='$totTime' WHERE `serial`='$serial'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: selVariant.php");
		
	} else {
		echo $conn->error;
	}

	$conn->close();
	


	
?>