<?php
	session_start();
	include '../resources/connect.php';
	
		$tableName="floorManager";
		$line=$_SESSION['line'];
		$tableName1 = "employee";
		$tableName2 = "question";
		$tableName3 = "variant";
		$id = $_SESSION['userid'];
		$station=$_SESSION['station'];
		$variant=$_SESSION['variant'];
		$serial=$_SESSION['serial'];
		$min=$_POST['min'];
		$sec=$_POST['sec'];
		$_SESSION['min']=$_POST['min'];
		$_SESSION['sec']=$_POST['sec'];
		$totalTime=$min.":".$sec;
		$count=$_POST['count'];
		$timeStamp=date("Y-m-d H:i:s");
		$actionTaken="unsolved";
		$department="";
		$reason="";
		$answers="";
		$count++;
		for ($i=0; $i < $count; $i++) { 
			$answers.=$_POST['ans'.$i].",";
		}
		echo $answers;

		$empSql = "SELECT name FROM $tableName1 WHERE id=".$id;
		$result=$conn->query($empSql);
		$row=$result->fetch_assoc();
		$name=$row['name'];
		$questions="";
		$questSql = "SELECT questionname FROM $tableName2 WHERE variantno IN (SELECT variantno FROM $tableName3 WHERE `serial`='".$serial."')";
		$result1=$conn->query($questSql);
		while($row1 = $result1->fetch_assoc()) {
		$questions.=$row1['questionname'];
		
		}
		echo $questions;


		$sql = "INSERT INTO $tableName (`user`,`line`,`station`,`variant`,`serial`,`timeStamp`,`questions`,`answers`,`actionTaken`,`totalTime`) VALUES ('$name','$line','$station','$variant','$serial','$timeStamp','$questions','$answers','$actionTaken','$totalTime')";

		if ($conn->query($sql) === TRUE) {
		  header("Location: issueUnresolved.php");
			
		} else {
			echo $conn->error;
		}

		$conn->close();
	


	


?>