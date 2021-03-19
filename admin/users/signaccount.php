<?php

	include 'resources/connect.php';
	$tableName = "employee";

	$name = $_POST["name"];
	$designation = $_POST["designation"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$usergroup = $_POST["usergroup"];
	

	$password = md5($password);

	$sql = "INSERT INTO $tableName (`id`, `name`, `designation`, `email`, `password`, `usergroup`) VALUES (NULL, '$name', '$designation', '$email', '$password', '$usergroup')";

	if ($conn->query($sql) === TRUE) {
	  header("Location: admin.php");
	}

	$conn->close();
?>