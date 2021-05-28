<?php

	include '../../resources/connect.php';
	$tableName = "variant";

	$variant = $_POST["variantEdit"];
	$newVariant = $_POST["newVariant"];
	echo($newVariant);

	$sql = "UPDATE `$tableName` SET variantname = '$newVariant' WHERE variantname = '$variant'";

	if ($conn->query($sql) === TRUE) {
	   header("Location: variant.php");
	}

	$conn->close();
?>