<?php

	include '../../resources/connect.php';
	$tableName = "variant";

	$variantno = $_POST["editVariantName"];
	
	$sql1 = "SELECT * from $tableName where variantno = '$variantno'";

	$result = $conn->query($sql1);
	$row = $result->fetch_assoc();
	$serial = $row['serial'];
	$variant = $row['variantname'];
	$path = $row['pdfpath'];

	$serverPath = str_replace("%", "/", $path);
	unlink($serverPath);

	$info = pathinfo($_FILES['fileToUploadChange']['name']);
	$ext = $info['extension'];
	$documentName = $serial.$variant.'.'.$ext;
	$uploadDestinationPath = '..\..\pdfs\\'.$documentName;
	move_uploaded_file($_FILES['fileToUploadChange']['tmp_name'], $uploadDestinationPath);
	$databaseDestinationPath = '..%..%pdfs%'.$documentName;

	$sql = "UPDATE `$tableName` SET `pdfpath` = '$databaseDestinationPath' WHERE variantno = '$variantno'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: variant.php");
	}

	$conn->close();
?>