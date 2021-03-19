<?php

	include '../../resources/connect.php';
	$tableName = "line";

	$line = $_POST["linename"];

	$sql = "INSERT INTO $tableName ( `lineno`, `linename`) VALUES (null, '$line')";

	if ($conn->query($sql) === TRUE) {
	  header("Location: line.php");
	} else {
		echo $conn->error;
	}

	$conn->close();
?>