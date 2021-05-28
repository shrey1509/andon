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
		$min=$_SESSION['mins'];
		$sec=$_SESSION['secs'];
		$totalTime=$min.":".$sec;
		$timeStamp=date("Y-m-d H:i:s");
		$department=$_SESSION['depts'];
		$reason=$_SESSION['probs'];
		$answers=$_SESSION['ans'];
		if (strpos($answers, 'No') !== false) {
		    $actionTaken="unsolved";
		}
		else{
			$actionTaken="solved";
		}
		

		$empSql = "SELECT name FROM $tableName1 WHERE id=".$id;
		$result=$conn->query($empSql);
		$row=$result->fetch_assoc();
		$name=$row['name'];
		$questions="";
		$questSql = "SELECT questionname FROM $tableName2 WHERE stationno= $station";
		$result1=$conn->query($questSql);
		while($row1 = $result1->fetch_assoc()) {
		$questions.=$row1['questionname'];
		
		}


		$sql = "INSERT INTO $tableName (`user`,`line`,`station`,`variant`,`serial`,`timeStamp`,`questions`,`answers`,`actionTaken`,`department`,`reason`,`totalTime`) VALUES ('$name','$line','$station','$variant','$serial','$timeStamp','$questions','$answers','$actionTaken','$department','$reason','$totalTime')";

		if ($conn->query($sql) === TRUE) {
		  header("Location: selVariant.php");
			echo($totalTime);
			
		} else {
			echo $conn->error;
		}

		$conn->close();
	


	


?>