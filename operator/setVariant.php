<?php
	session_start();
	include '../resources/connect.php';
	$tableName="station";
	$tableName1="variant";
	$variant=$_POST['varSel'];
	$varSql="SELECT variantname FROM variant WHERE variantno=".$variant;
	$sql="UPDATE $tableName SET issuePresent=1 WHERE stationname= '".$_SESSION['station']."'";
	$sql1="UPDATE $tableName1 SET `serial`='".$_POST['serialSel']."' WHERE variantno= '".$_POST['varSel']."'";
	$result=$conn->query($varSql);
	$row=$result->fetch_assoc();
	if ($conn->query($sql) === TRUE && $conn->query($sql1) ) {
        
        $_SESSION['variant'] = $row['variantname'];
		$_SESSION['serial'] = $_POST['serialSel'];
		header("Location: pdfQuest.php");
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
      $conn->close();
	
?>