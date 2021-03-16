<?php
	session_start();
	include 'resources/connect.php';
	$tableName = "employee";
	$_SESSION['line'] = $_POST['lineSel'];
	$_SESSION['station'] = $_POST['stationSel'];

	header("Location: selVariant.php");
?>