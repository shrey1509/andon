<?php

	include '../../resources/connect.php';
	$tableName = "question";

	$question = $_POST["questionEdit"];
	$questionNew = $_POST["editInstruction"];

	$sql = "UPDATE `$tableName` SET questionname='$questionNew' WHERE questionno = '$question'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: question.php");
	}

	$conn->close();
?>