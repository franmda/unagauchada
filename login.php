<?php
	session_start();
	include 'config.php';
	$query = "SELECT userMail FROM Usuario WHERE userMail= '$_POST[email]'";
	$user = mysqli_query($con, $query) or die (mysqli_error($con));
	$user = mysqli_fetch_array($user);
	$user = $user[0];
	if($user!=''){
		$query = "SELECT userPassword FROM Usuario WHERE userMail= '$_POST[email]'";
		$password = mysqli_query($con, $query) or die (mysqli_error($con));
		$password = mysqli_fetch_array($password);
		$password = $password[0];

		if($_POST['password'] == $password){
			$_SESSION['log']=0;
			$_SESSION['userMail'] = $user;
			echo '<script>location="/";</script>';
		}

		elseif ($_POST['password'] != $password){
			$_SESSION['log']=1;
			echo '<script>location="/"; </script>';
		}
	}
	else{
		$_SESSION['log']=2;
		echo '<script>location="/"; </script>';
	}
?>