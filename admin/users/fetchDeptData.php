<?php
	include '../../resources/connect.php';
	$tableName = "deptemail";
	
	

	$dept=$_POST['dept'];
	$email = array();

	if(isset($_POST['dept']))
	{
		$result=$conn->query("SELECT * FROM $tableName WHERE `deptno`=$dept");
		echo '<option value="" disabled selected="true">Select Email</option>';
		while ($rowa=$result->fetch_assoc()) {
			$email=explode(";", $rowa['deptemails']);
				
		}
		for ($i=0; $i < count($email) ; $i++) { 
			echo '<option style="color:black;">'.$email[$i].'</option>';
		}
		}
		
	else
	{
		echo '<option >'.$_POST['dept'].'</option>';
	}

	

?>