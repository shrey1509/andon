<?php

	include '../../resources/connect.php';
	$tableName = "station";

	$station = $_POST["stationName"];
	$stationSql = "SELECT stationno FROM $tableName WHERE stationname='$station'";
	$stationResult=$conn->query($stationSql);
	$stationRow=$stationResult->fetch_assoc();

	$sql = "DELETE FROM `$tableName` WHERE stationno =". $stationRow['stationno'];

	if ($conn->query($sql) === TRUE) {
	  header("Location: station.php");
	}

	$conn->close();
?>