<?php
	session_start();
	include '../resources/connect.php';
	$tableName = "employee";
	$email = $_POST['email'];
	$sql="SELECT * FROM `$tableName` where email='$email'";
	$res= $conn->query($sql);

	if ($res->num_rows==1) {
		$_SESSION['email']=$email;
		header("Location: setNewPass.html");

      } else {
        header("Location: resetEmail.php");
      }
  
      $conn->close();



	


	

?>