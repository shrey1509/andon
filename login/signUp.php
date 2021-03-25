<?php
	session_start();
	include '../resources/connect.php';
	$tableName = "employee";
  $name = $conn->real_escape_string($_POST['name']);
	$username = $_SESSION['email'];
	$password = $conn->real_escape_string($_POST['password']);
 

	$encryptedPassword = md5($password);
  $photoPath = pathinfo($_FILES['photoToUpload']['name']);
  $ext = $photoPath['extension'];
  $photoName = $name.'.'.$ext;
  echo $photoName;
  $uploadDestinationPath = '..\userimg\\'.$photoName;
  move_uploaded_file($_FILES['photoToUpload']['tmp_name'], $uploadDestinationPath);
  $databaseDestinationPath = '../userimg/'.$photoName;
	
	$usergroup = $_POST['usergroup'];

    $sql = "INSERT INTO `$tableName` (`id`, `name`, `email`, `password`, `usergroup`,`photoPath`) VALUES (NULL, '$name', '$username', '$encryptedPassword', '$usergroup','$databaseDestinationPath')";
	// $sql = "INSERT INTO '$tableName' ('id', 'name', 'designation', 'email', 'password', 'usergroup') VALUES (NULL, '$name', '$designation', '$username', '$encryptedPassword', '$usergroup')";
    echo($sql);
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: ../index.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
      $conn->close();
?>