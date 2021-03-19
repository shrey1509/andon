<?php

	include '../../resources/connect.php';
	$tableName = "line";

	$line = $_POST["deleteLineName"];

	$sql = "DELETE FROM `$tableName` WHERE linename = '$line'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: line.php");
	}

	$conn->close();
?>