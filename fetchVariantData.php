<?php
	include 'resources/connect.php';
	$tableName = "variant";
	$variant=$_POST['variant'];

	if(isset($_POST['variant']))
	{
		$result1=$conn->query("SELECT `serial` FROM $tableName WHERE variant='".$variant."'");
		echo '<option value="0">Select Serial Number</option>';
		while ($rowb=$result1->fetch_assoc()) {
			echo '<option >'.$rowb['serial'].'</option>';
		}
	}
	else
	{
		echo '<option >Nope</option>';
	}
?>
