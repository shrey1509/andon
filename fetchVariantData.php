<?php
	include 'resources/connect.php';
	$tableName = "variant";
	$variant=$_POST['variant'];

	if(isset($_POST['variant']))
	{
		$result1=$conn->query("SELECT `serial` FROM $tableName WHERE variantname='".$variant."'");
		echo '<option value="" disabled selected="true">Select Serial Number</option>';
		while ($rowb=$result1->fetch_assoc()) {
			echo '<option style="color:black;">'.$rowb['serial'].'</option>';
		}
	}
	else
	{
		echo '<option >Nope</option>';
	}
?>
