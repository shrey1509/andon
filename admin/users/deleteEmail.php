<?php

	include '../../resources/connect.php';
	$tableName = "employee";

	$name = $_POST["deptnameDel"];
	$email =";";
	$email .= $_POST["deleteEmail"];
	$firstEmail = $_POST["deleteEmail"];
	$firstEmail .=";";

	$sql="UPDATE deptemail SET deptemails = replace(deptemails , '$email','') WHERE deptno= '$name';";
	$sql1="UPDATE deptemail SET deptemails = replace(deptemails , '$firstEmail','') WHERE deptno= '$name';";

	if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
	  header("Location: deptemail.php");
	 
	}else {
		echo $conn->error;
	}

	$conn->close();
?>