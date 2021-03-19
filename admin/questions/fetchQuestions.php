<?php

	include '../../resources/connect.php';
	$tableName = "question";

	
	$variant = $_POST["variant"];

	$sql = "SELECT * from $tableName where variantno = '$variant'";

	
	if(isset($_POST['variant']))
	{
		$result1=$conn->query($sql);
		echo '<option value="" disabled selected="true">Select Question</option>';
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