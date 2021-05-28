<?php
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;
	//unset ($_SESSION["min"]);
	//unset ($_SESSION["sec"]);
	include '../resources/connect.php';
	$tableName="floorManager";
	$tableName1="station";
	


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
		$dept .= "Supply Chain".", ";
		$email[$i++]="snehaldhakane743@gmail.com";//staff email
		
	}
	if ($m!="") {

		$probs .=$m." ";
		$dept .= "Maintainence".", ";
		$email[$i++]="snehaldhakane743@gmail.com";//staff email
		
	}
	if ($p!="") {
		
		$probs .=$p." ";
		$dept .= "Production".", ";
		$email[$i++]="snehaldhakane743@gmail.com";//staff email
		
	}
	if ($s!="") {
		
		$probs .=$s." ";
		$dept .= "Store".", ";
		$email[$i++]="snehaldhakane743@gmail.com";//staff email
		
	}
	if ($q!="") {
		
		$probs .=$q." ";
		$dept .= "Quality".", ";
		$email[$i++]="snehaldhakane743@gmail.com";//staff email
		
	}
	if ($mt!="") {
		
		$probs .=$mt." ";
		$dept .= "Methods".", ";
		$email[$i++]="snehaldhakane743@gmail.com";//staff email
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
	$mail->Username = "snehaldhakane743@gmail.com";//email                 
	$mail->Password = "3";//pass                           
	                          
	//Set TCP port to connect to
	$mail->Port = 587;                                   

	$mail->From = "snehaldhakane743@gmail.com";//from email
	$mail->FromName = "Snehal";

	// while (list ($key, $val) = each ($email)) {
	// 	$mail->AddAddress($val);
	// }
	foreach ($email as $key=>$val){
		$mail->AddAddress($val);
	}


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
	$sql1="UPDATE $tableName1 SET issuePresent=issuePresent+1 WHERE stationname= '".$_SESSION['station']."'";
	$sql2="UPDATE $tableName1 SET department='$dept' WHERE stationname= '".$_SESSION['station']."'";

	if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
	  header("Location: selVariant.php");
		echo "nice";
		
	} else {
		echo $conn->error;
	}

	$conn->close();
	


	
?>