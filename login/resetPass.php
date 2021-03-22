<?php
	session_start();
	include '../resources/connect.php';
	$tableName = "employee";
	$username = $_SESSION['email'];
  unset($_SESSION['email']);
  // $id=$_SESSION['userid'];

	$password = $conn->real_escape_string($_POST['pass']);
	$encryptedPassword = md5($password);

	


    $sql = "UPDATE `$tableName` SET password='$encryptedPassword' WHERE email='$username'";
    echo($sql);
    if ($conn->query($sql) === TRUE) {
        echo "New pass set successfully";
        $_SESSION['status']=2;
        header("Location: ../index.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "mail:".$username;
      }
  
      $conn->close();
?>