<?php

	include '../../resources/connect.php';
	$tableName = "station";

	$station = $_POST["stationname"];
	$line = $_POST["linename"];
	

	$sql = "INSERT INTO `$tableName` (`stationno`, `stationname`,`variant`, `line`) VALUES (NULL, '$station',NULL,  '$line')";

	if ($conn->query($sql) === TRUE) {
	  header("Location: station.php");
	} else {
		echo $conn->error;
	}

	$conn->close();
?>