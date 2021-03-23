<?php
	session_start();
	include '../resources/connect.php';
	$tableName = "employee";
	$username = $conn->real_escape_string($_POST['username']);
	$password = $conn->real_escape_string($_POST['password']);
	$_SESSION['username'] = $username;
	$encryptedPassword = md5($password);
	
	$usergroup = $_POST['usergroup'];

	$sql = "SELECT * FROM $tableName WHERE email = '$username' AND password = '$encryptedPassword' AND usergroup='$usergroup'";
	$result = $conn->query($sql);

	if($result->num_rows == 1) { //logged In
		$row = $result->fetch_assoc();

		$_SESSION['userid'] = $row["id"];
		$_SESSION['usergroup'] = $row["usergroup"];
		

		if(strcmp($usergroup, "operator") == 0) {
			header("Location: ../operator/operator.php");
		} else if(strcmp($usergroup, "floor manager")==0){
			header("Location: ../operator/success.php");
		} else if(strcmp($usergroup, "admin")==0){
			header("Location: ../admin/users/users.php");
		} else {
			echo "Invalid User Group";
		}
	} else { // Not Logged In
		header("Location: invalidCred.php");
	}
?>