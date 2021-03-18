<?php

	include '../../resources/connect.php';
	$tableName = "station";

	$stationname = $_POST["stationname"];
	$newLine = $_POST["lineno"];

	$sql = "UPDATE `$tableName` SET line = '$newLine' WHERE stationno = '$stationname'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: station.php");
	}

	$conn->close();
?>