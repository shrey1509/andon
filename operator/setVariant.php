<?php
	session_start();
	include '../resources/connect.php';
	$tableName="station";
	$_SESSION['variant'] = $_POST['varSel'];
	$_SESSION['serial'] = $_POST['serialSel'];
	$sql="UPDATE $tableName SET issuePresent=1 WHERE stationname= '".$_SESSION['station']."'";
	if ($conn->query($sql) === TRUE) {
        header("Location: pdfQuest.php");
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
      $conn->close();
	
?>