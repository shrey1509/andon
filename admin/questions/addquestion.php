<?php

	include '../../resources/connect.php';
	$tableName = "question";

	$question = $_POST["question"];
	$answer = $_POST["sendAnswers"];
	$variant = $_POST["variantname"];

	$sql = "INSERT INTO $tableName ( `questionno`, `questionname`, `answer`, `variantno`) VALUES (null, '$question', '$answer', '$variant')";

	if ($conn->query($sql) === TRUE) {
	  header("Location: question.php");
		// echo $answer;
	} else {
		echo $conn->error;
	}

	$conn->close();
?>