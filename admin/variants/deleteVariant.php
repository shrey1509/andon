<?php

	include '../../resources/connect.php';
	$tableName = "variant";

	$variant = $_POST["deleteVar"];

	$sql1 = "SELECT * from $tableName where variantname = '$variant'";

	$result = $conn->query($sql1);
	$row = $result->fetch_assoc();
	// $path = $row['pdfpath'];

	// $serverPath = str_replace("%", "/", $path);
	
	$foreignSql ="SET FOREIGN_KEY_CHECKS=OFF";
	$sql = "DELETE FROM `$tableName` WHERE variantname = '$variant'";

	if ($conn->query($foreignSql) === TRUE && $conn->query($sql) === TRUE) {
		// unlink($serverPath);
	  header("Location: variant.php");
	}
	else
	{
		echo $conn->error;
	}

	$conn->close();
?>