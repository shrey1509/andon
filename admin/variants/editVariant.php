<?php

	include '../../resources/connect.php';
	$tableName = "variant";

	$variant = $_POST["editVariantName"];
	$newVariant = $_POST["newVariant"];

	$sql = "UPDATE `$tableName` SET variantname = '$newVariant' WHERE variantno = '$variant'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: variant.php");
	}

	$conn->close();
?>