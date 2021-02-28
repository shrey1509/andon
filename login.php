<?php
	session_start();
	include 'resources/connect.php';
	$tableName = "employee";
	$username = $conn->real_escape_string($_GET['username']);
	$password = $conn->real_escape_string($_GET['password']);

	$encryptedPassword = md5($password);
	
	$usergroup = $_GET['usergroup'];

	$sql = "SELECT * FROM $tableName WHERE email = '$username' AND password = '$encryptedPassword' AND usergroup='$usergroup'";
	$result = $conn->query($sql);
	if($result->num_rows == 1) {
		$_SESSION['login'] = 1;
		echo json_encode(1);
	} else {
		echo json_encode(0);
	}
?>