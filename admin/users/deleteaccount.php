<?php

	include 'resources/connect.php';
	$tableName = "employee";

	$email = $_POST["email"];

	$sql = "DELETE FROM `$tableName` WHERE email = '$email'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: admin.php");
	}

	$conn->close();
?>