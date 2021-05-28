<?php
	session_start();


	include '../../resources/connect.php';
	$tableName = "variant";
	// $tableName1 = "station";

	$variant = $_POST['addvariantname'];
	// $question = $_POST["question"];
	$line = $_POST["lineVar"];
	// $station = $_POST["stationVar"];
	// $answer = $_POST["sendAnswers"];
	//$serial = $_POST['serial'];

	// $info = pathinfo($_FILES['fileToUpload']['name']);
	// $ext = $info['extension'];
	// $documentName = $variant.'.'.$ext;
	// $uploadDestinationPath = '..\..\pdfs\\'.$documentName;
	// move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadDestinationPath);
	// $databaseDestinationPath = '..%pdfs%'.$documentName;
	// `pdfpath`->'$databaseDestinationPath'
	$sql = "INSERT INTO `$tableName` (`variantno`, `variantname`, `serial`,`lineno`) VALUES (NULL, '$variant', ' ',$line)";


	// if ($conn->query($sql) === TRUE) {
		// $sql = "SELECT stationno from `$tableName1` WHERE stationname='$station'";
		// $result = $conn->query($sql);
		// $row = $result->fetch_assoc();
		// $stationno = $row['stationno'];

		 // $sql = "INSERT INTO question ( `questionno`, `questionname`, `stationno`) VALUES (null, '$question', '$stationno')";

		 // $variantSql="SELECT `variantno` from $tableName WHERE variantname='$variant'";
		 // $varResult = $conn->query($variantSql);
		 // $varRow=$varResult->fetch_assoc();
		// $varno=$varRow['variantno'];
		// echo ($varno);
		// $stationSql="UPDATE `$tableName1` SET `variant`=$varno,`pdfPath`='$databaseDestinationPath' WHERE `stationname`='$station'";
		// && $conn->query($stationSql) === TRUE
		if ($conn->query($sql) === TRUE ) {
		   header("Location: variant.php");
			// echo $answer;
		} else {
			echo $conn->error;
		}
	// } else {
	// 	echo $conn->error;
	// }

	$conn->close();

?>