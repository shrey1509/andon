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
	$tableName2="deptEmail";
	


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
	

	$probs=" ";
	$i=0;
	$j=0;
	$dept="";
	$totTime=$_POST['min'].":".$_POST['sec'];
	$_SESSION['min']=$_POST['min'];
	$_SESSION['sec']=$_POST['sec'];
	if($sc!="")
	{
		$probs .=$sc." ";
		$dept .= "Supply Chain".", ";
		$scSql="SELECT deptemails FROM $tableName2 WHERE deptname='Supply Chain'";
		$scResult = $conn->query($scSql);
		while($scRow = $scResult->fetch_assoc())
		{
			$scEmail=explode(";", $scRow['deptemails']);
		}
		foreach ($scEmail as $key => $value) {
			$email[$i++]=$value;
		}
	
	}
	
	if ($m!="") {

		$probs .=$m." ";
		$dept .= "Maintainence".", ";
		$mSql="SELECT deptemails FROM $tableName2 WHERE deptname='Maintainence'";
		$mResult = $conn->query($mSql);
		while($mRow = $mResult->fetch_assoc())
		{
			$mEmail=explode(";", $mRow['deptemails']);
		}
		foreach ($mEmail as $key => $value) {
			$email[$i++]=$value;
		}
		
	}
	if ($p!="") {
		
		$probs .=$p." ";
		$dept .= "Production".", ";
		$pSql="SELECT deptemails FROM $tableName2 WHERE deptname='Production'";
		$pResult = $conn->query($pSql);

		while($pRow = $pResult->fetch_assoc())
		{
			$pEmail=explode(";", $pRow['deptemails']);
		}
		foreach ($pEmail as $key => $value) {
			$email[$i++]=$value;
		}
		
	}
	if ($s!="") {
		
		$probs .=$s." ";
		$dept .= "Store".", ";
		$sSql="SELECT deptemails FROM $tableName2 WHERE deptname='Store'";
		$sResult = $conn->query($sSql);
		while($sRow = $sResult->fetch_assoc())
		{
			$sEmail=explode(";", $sRow['deptemails']);
		}
		foreach ($sEmail as $key => $value) {
			$email[$i++]=$value;
		}
		
	}
	if ($q!="") {
		
		$probs .=$q." ";
		$dept .= "Quality".", ";
		$qSql="SELECT deptemails FROM $tableName2 WHERE deptname='Quality'";
		$qResult = $conn->query($qSql);
		while($qRow = $qResult->fetch_assoc())
		{
			$qEmail=explode(";", $qRow['deptemails']);
		}
		foreach ($qEmail as $key => $value) {
			$email[$i++]=$value;
		}
		
	}
	if ($mt!="") {
		
		$probs .=$mt." ";
		$dept .= "Methods".", ";
		$mtSql="SELECT deptemails FROM $tableName2 WHERE deptname='Methods'";
		$mtResult = $conn->query($mtSql);
		while($mtRow = $mtResult->fetch_assoc())
		{
			$mtEmail=explode(";", $mtRow['deptemails']);
		}
		foreach ($mtEmail as $key => $value) {
			$email[$i++]=$value;
		}
	}

	echo $probs;
	print_r($email);
	
	
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
	$mail->FromName = "";

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

	// $sql = "UPDATE $tableName SET department='$dept',reason='$probs',totalTime='$totTime' WHERE `serial`='$serial'";
	$_SESSION['depts'] = $dept;
	$_SESSION['probs'] = $probs;
	$sql1="UPDATE $tableName1 SET issuePresent=issuePresent+1 WHERE stationno= '".$_SESSION['station']."'";
	$sql2="UPDATE $tableName1 SET department='$dept' WHERE stationno= '".$_SESSION['station']."'";

	if ( $conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
	  header("Location: pdfQuest.php");
		echo "nice";
		
	} else {
		echo $conn->error;
	}

	$conn->close();
	


	
?>