<?php

	include '../../resources/connect.php';
	$tableName = "station";

	$stationname = $_POST["stationname"];
	$newVariant = $_POST["variantno"];

	$sql = "UPDATE `$tableName` SET variant = '$newVariant' WHERE stationno = '$stationname'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: station.php");
	}

	$conn->close();
?>