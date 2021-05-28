<?php

	include '../../resources/connect.php';
	$tableName = "question";
	$tableName1 = "station";
	$tableName2 = "line";
	$sql ="";
	$line = $_POST["lineAddVar"];
	$station = $_POST["stationAddVar"];
	$question = $_POST["sendAddAnswers"];
	$variant = $_POST["questionAddVar"];

	$lineSql = "SELECT linename FROM $tableName2 WHERE lineno='$line'";
	$lineResult=$conn->query($lineSql);
	$lineRow=$lineResult->fetch_assoc();

	
	$questionsList=explode(";", $question);

	$stationSql = "SELECT stationno FROM $tableName1 WHERE stationname='$station'";
	$stationResult=$conn->query($stationSql);
	$stationRow=$stationResult->fetch_assoc();


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