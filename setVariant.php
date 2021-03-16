<?php
	session_start();
	include 'resources/connect.php';
	$_SESSION['variant'] = $_POST['varSel'];
	$_SESSION['serial'] = $_POST['serialSel'];
	header("Location: pdfQuest.php");
?>