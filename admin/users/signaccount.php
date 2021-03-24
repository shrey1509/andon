<?php

	include '../../resources/connect.php';
	$tableName = "employee";

	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$usergroup = $_POST["usergroup"];
	$photoPath = pathinfo($_FILES['photoToUpload']['name']);
	$ext = $photoPath['extension'];
	$photoName = $name.'.'.$ext;
	echo $photoName;
	$uploadDestinationPath = '..\..\images\\'.$photoName;
	move_uploaded_file($_FILES['photoToUpload']['tmp_name'], $uploadDestinationPath);
	$databaseDestinationPath = '../images/'.$photoName;
	

	$password = md5($password);

	$sql = "INSERT INTO $tableName (`id`, `name`, `email`, `password`, `usergroup`,`photoPath`) VALUES (NULL, '$name', '$email', '$password', '$usergroup','$databaseDestinationPath')";

	if ($conn->query($sql) === TRUE) {
	  header("Location: users.php");
	}else {
		echo $conn->error;
	}

	$conn->close();
?>