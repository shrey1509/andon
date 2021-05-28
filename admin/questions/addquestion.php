<?php

	include '../../resources/connect.php';
	$tableName = "question";
	$tableName1 = "station";
	$tableName2 = "line";
	$sql ="";
	$line = $_POST["lineVar"];
	$station = $_POST["stationVar"];
	$question = $_POST["sendAnswers"];
	$variant = $_POST["questionVar"];

	$lineSql = "SELECT linename FROM $tableName2 WHERE lineno='$line'";
	$lineResult=$conn->query($lineSql);
	$lineRow=$lineResult->fetch_assoc();

	$info = pathinfo($_FILES['fileToUpload']['name']);
	$ext = $info['extension'];
	$documentName = $lineRow['linename'].$station.$variant.".".$ext;
	$uploadDestinationPath = '..\..\pdfs\\'.$documentName;
	move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadDestinationPath);
	$databaseDestinationPath = '..%pdfs%'.$documentName;
	$questionsList=explode(";", $question);

	$stationSql = "SELECT stationno FROM $tableName1 WHERE stationname='$station'";
	$stationResult=$conn->query($stationSql);
	$stationRow=$stationResult->fetch_assoc();
	$pdfSql = "UPDATE $tableName1 SET pdfPath='$databaseDestinationPath' WHERE stationname='$station'";
	$conn->query($pdfSql);

	for ($k=0; $k <count($questionsList) ; $k++) {
		$questionNow = $questionsList[$k];
		$sql .= "INSERT INTO $tableName ( `questionno`, `questionname`, `stationno`) VALUES (null, '$questionNow', ".$stationRow['stationno'].");";
	}
	// $sql = "INSERT INTO $tableName ( `questionno`, `questionname`, `answer`, `variantno`) VALUES (null, '$question', '$answer', '$variant')";
	
	
	if ($conn->multi_query($sql) === TRUE) {
	  header("Location: question.php");
		

	} else {
		echo $conn->error;
	}

	$conn->close();
?>