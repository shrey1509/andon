<?php
	session_start();
	include 'resources/connect.php';
	$tableName = "employee";
    $name = $conn->real_escape_string($_POST['name']);
	$username = $conn->real_escape_string($_POST['username']);
	$password = $conn->real_escape_string($_POST['password']);
    $designation = $conn->real_escape_string($_POST['designation']);

	$encryptedPassword = md5($password);
	
	$usergroup = $_POST['usergroup'];

    $sql = "INSERT INTO `$tableName` (`id`, `name`, `designation`, `email`, `password`, `usergroup`) VALUES (NULL, '$name', '$designation', '$username', '$encryptedPassword', '$usergroup')";
	// $sql = "INSERT INTO '$tableName' ('id', 'name', 'designation', 'email', 'password', 'usergroup') VALUES (NULL, '$name', '$designation', '$username', '$encryptedPassword', '$usergroup')";
    echo($sql);
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
      $conn->close();
?>