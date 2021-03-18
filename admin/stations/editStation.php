<?php

	include '../../resources/connect.php';
	$tableName = "station";

	$stationname = $_POST["stationname"];
	$newstation = $_POST["newstation"];

	$sql = "UPDATE `$tableName` SET stationname = '$newstation' WHERE stationno = '$stationname'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: station.php");
	}

	$conn->close();
?>