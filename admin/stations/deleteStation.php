<?php

	include '../../resources/connect.php';
	$tableName = "station";

	$station = $_POST["stationname"];

	$sql = "DELETE FROM `$tableName` WHERE stationno = '$station'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: station.php");
	}

	$conn->close();
?>