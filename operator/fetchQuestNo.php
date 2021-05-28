<?php
	include '../resources/connect.php';
	session_start();
	$_SESSION['questno']= $_POST['questno']+1;
	$_SESSION['ans'] .="No";
	$_SESSION['ans'] .=";"
?>