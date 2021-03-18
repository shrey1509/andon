<?php

	include '../../resources/connect.php';
	$tableName = "question";

	$question = $_POST["questiondelete"];

	$sql = "DELETE FROM `$tableName` WHERE questionno = '$question'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: question.php");
	}

	$conn->close();
?>