<?php

	include '../../resources/connect.php';
	$tableName = "question";
	$tableName1 = "station";

	
	$station = $_POST["stationDel"];
	$stationSql = "SELECT stationno FROM $tableName1 WHERE stationname='$station'";
	$stationResult=$conn->query($stationSql);
	$stationRow=$stationResult->fetch_assoc();

	$sql = "SELECT * from $tableName where stationno =".$stationRow['stationno'];

	
	if(isset($_POST['stationDel']))
	{
		$result1=$conn->query($sql);
		echo '<option value="" disabled selected="true">Instruction</option>';
		while ($rowb=$result1->fetch_assoc()) {
			echo '<option value = "'.$rowb['questionno'].'" >'.$rowb['questionname'].'</option>';
		}
	}
	else
	{
		echo '<option >Nope</option>';
	}

	$conn->close();
?>