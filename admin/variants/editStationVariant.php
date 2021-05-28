<?php

	include '../../resources/connect.php';
	$tableName = "variant";

	$linename = $_POST["linename"];
	$newVariant = $_POST["variantno"];

	$sql = "UPDATE `$tableName` SET lineno = '$linename' WHERE variantno = '$newVariant'  ";

	if ($conn->query($sql) === TRUE) {
		echo($linename);
		echo($newVariant);
	  header("Location: variant.php");
	}

	$conn->close();
?>