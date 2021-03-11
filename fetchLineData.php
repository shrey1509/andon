<?php
	include 'resources/connect.php';
	$tableName = "linestation";
	

	$line=$_POST['line'];

	if(isset($_POST['line']))
	{
		$result=$conn->query("SELECT station FROM $tableName WHERE lineno='".$line."'");
		echo '<option value="" disabled selected="true">Select Station Number</option>';
		while ($rowa=$result->fetch_assoc()) {
			for ($i=1; $i <= $rowa['station'] ; $i++) { 
				echo '<option >'.$i.'</option>';
			}
		}
	}
	else
	{
		echo '<option >Nope</option>';
	}

	

?>