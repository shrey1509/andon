<?php

	include '../../resources/connect.php';
	$tableName = "employee";

	$name = $_POST["deptname"];

	// $email .=";";
	// $email = $_POST["email"];
	
	$sql1 = "SELECT deptemails FROM deptemail WHERE deptno='$name'";
	$result = $conn->query($sql1);
	$row = $result->fetch_assoc();

	if(is_null($row['deptemails'])||$row['deptemails']=='')
	{
		$email = $_POST["email"];
	}
	else{
		$email =";";
	 	$email .= $_POST["email"];
	}

	$sql = "UPDATE deptemail SET deptemails = CONCAT(deptemails, '$email') WHERE deptno= '$name'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: deptemail.php");
	 
	}else {
		echo $conn->error;
	}

	$conn->close();
?>