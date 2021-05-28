<?php
	include '../../resources/connect.php';
	$tableName = "variant";
	$tableName1 = "station";
	

	
	

	if(isset($_POST['station']))
	{
		$station=$_POST['station'];
		$result=$conn->query("SELECT variantname FROM $tableName WHERE `variantno` IN (SELECT variant FROM $tableName1 WHERE `stationname`='$station')");
		echo '<option value="" disabled selected="true">Select Variant Number</option>';
		while ($rowa=$result->fetch_assoc()) {
			
				echo '<option style="color:black;">'.$rowa['variantname'].'</option>';
			
		}
	}
	else
	{
		echo '<option >Nope</option>';
	}

	if(isset($_POST['line']))
	{
		$line=$_POST['line'];
		$result=$conn->query("SELECT variantname FROM $tableName WHERE `lineno`=$line");
		echo '<option value="" disabled selected="true">Select Variant Number</option>';
		while ($rowa=$result->fetch_assoc()) {
			
				echo '<option style="color:black;">'.$rowa['variantname'].'</option>';
			
		}
	}
	else
	{
		echo '<option >Nope</option>';
	}

	

?>