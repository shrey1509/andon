<?php

	include '../../resources/connect.php';
	$tableName = "variant";

	$variant = $_POST["variantnamedelete"];

	$sql1 = "SELECT * from $tableName where variantno = '$variant'";

	$result = $conn->query($sql1);
	$row = $result->fetch_assoc();
	$path = $row['pdfpath'];

	$serverPath = str_replace("%", "/", $path);
	// echo $serverPath;
	unlink($serverPath);

	$sql = "DELETE FROM `$tableName` WHERE variantno = '$variant'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: variant.php");
	}

	$conn->close();
?>