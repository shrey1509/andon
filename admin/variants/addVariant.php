<?php
	session_start();


	include '../../resources/connect.php';
	$tableName = "variant";

	$variant = $_POST['addvariantname'];
	$serial = $_POST['serial'];

	$info = pathinfo($_FILES['fileToUpload']['name']);
	$ext = $info['extension'];
	$documentName = $serial.$variant.'.'.$ext;
	$uploadDestinationPath = '..\..\pdfs\\'.$documentName;
	move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadDestinationPath);
	$databaseDestinationPath = '..%..%pdfs%'.$documentName;

	$sql = "INSERT INTO `$tableName` (`variantno`, `variantname`, `serial`, `pdfpath`) VALUES (NULL, '$variant', '$serial', '$databaseDestinationPath')";

	if ($conn->query($sql) === TRUE) {
	  header("Location: variant.php");
	} else {
		echo $conn->error;
	}

	$conn->close();

?>