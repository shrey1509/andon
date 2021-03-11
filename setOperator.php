<?php
	session_start();
	include 'resources/connect.php';
	$tableName = "employee";
	$_SESSION['line'] = $_POST['lineSel'];
	$_SESSION['station'] = $_POST['stationSel'];
	$_SESSION['variant'] = $_POST['varSel'];
	$_SESSION['serial'] = $_POST['serialSel'];
	header("Location: pdfQuest.php");
?>