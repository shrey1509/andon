<?php

	include '../../resources/connect.php';
	$tableName = "variant";

	$variant = $_POST["editVariantName"];
	$serial = $_POST["newSerialName"];

	$sql = "UPDATE `$tableName` SET `serial` = '$serial' WHERE variantno = '$variant'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: variant.php");
	}

	$conn->close();
?>