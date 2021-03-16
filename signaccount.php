<?php

	include 'resources/connect.php';
	$tableName = "employee";
	$password = md5("test");
	$sql = "INSERT INTO $tableName (`id`, `name`, `designation`, `email`, `password`, `usergroup`) VALUES (NULL, '', '', '', '$password', 'admin')";
	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>