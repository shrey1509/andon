<?php

	include '../../resources/connect.php';
	$tableName = "line";

	$line = $_POST["editLineName"];
	$newline = $_POST["newline"];

	$sql = "UPDATE `$tableName` SET linename = '$newline' WHERE linename = '$line'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: line.php");
	}

	$conn->close();
?>