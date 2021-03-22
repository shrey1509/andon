<?php
	include '../resources/connect.php';
	$tableName = "station";
	$tableName1 = "line";
	

	$line=$_POST['line'];

	if(isset($_POST['line']))
	{
		$result=$conn->query("SELECT * FROM $tableName WHERE `line` IN (SELECT lineno FROM $tableName1 WHERE linename='".$line."' )");
		echo '<option value="" disabled selected="true">Select Station Number</option>';
		while ($rowa=$result->fetch_assoc()) {
			
				echo '<option style="color:black;">'.$rowa['stationname'].'</option>';
			
		}
	}
	else
	{
		echo '<option >Nope</option>';
	}

	

?>