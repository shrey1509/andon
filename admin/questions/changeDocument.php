<?php

	include '../../resources/connect.php';
	$tableName = "variant";
	$tableName1 = "station";
	$tableName2 = "line";

	$line = $_POST["linePdf"];
	$station = $_POST["stationPdf"];
	$variant = $_POST["pdfVar"];

	
	$lineSql = "SELECT * from $tableName2 where lineno = '$line'";
	$result = $conn->query($lineSql);
	$row = $result->fetch_assoc();
	$linename = $row['linename'];

	$stationSql = "SELECT * from $tableName1 where stationname = '$station'";
	$result12 = $conn->query($stationSql);
	$row12 = $result12->fetch_assoc();
	$stationno = $row12['stationno'];
	

	$path = "../../".$row12['pdfPath'];

	$serverPath = str_replace("%", "/", $path);
	unlink($serverPath);

	$info = pathinfo($_FILES['fileToUploadChange']['name']);
	$ext = $info['extension'];
	$documentName = $linename.$station.$variant.'.'.$ext;
	$uploadDestinationPath = '..\..\pdfs\\'.$documentName;
	move_uploaded_file($_FILES['fileToUploadChange']['tmp_name'], $uploadDestinationPath);
	$databaseDestinationPath = '..%pdfs%'.$documentName;

	$sql = "UPDATE `$tableName1` SET `pdfPath` = '$databaseDestinationPath' WHERE `stationno` = '$stationno'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: question.php");
	}

	$conn->close();
?>