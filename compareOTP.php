<?php
	session_start();
	if(isset($_SESSION['otp']))
	{
		$newOtp =$_POST['otp'];
		$otp=$_SESSION['otp'];
		echo $otp. " " .$newOtp;


		unset($_SESSION['otp']);

		if(strcmp($otp,$newOtp)==0)
		{
			 
			
			$_SESSION['status']=1;
			header("Location: login.php");
			

		}
		else
		{
			
			$_SESSION['status']=0;
			header("Location: checkMail.php");

		}

	}
	

	



?>
