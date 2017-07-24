<?php
	session_start();
	include 'config.php';
	if (!empty($_POST['user'])){
		$user=$_POST['user'];
		$mail=$_SESSION['userMail'];
		$query = "UPDATE Usuario SET userName='$user' WHERE userMail='$mail'";
		mysqli_query($con, $query) or die(mysqli_error($con));
	}
	if (!empty($_POST['pass'])){
		$pass=$_POST['pass'];
		$mail=$_SESSION['userMail'];
		$query = "UPDATE Usuario SET userPassword='$pass' WHERE userMail='$mail'";
		mysqli_query($con, $query) or die(mysqli_error($con));
	}
	if (!empty($_POST['number'])){
		$number=$_POST['number'];
		$mail=$_SESSION['userMail'];
		$query = "UPDATE Usuario SET userNumber='$number' WHERE userMail='$mail'";
		mysqli_query($con, $query) or die(mysqli_error($con));
	}




	if (!empty($_FILES['foto']['name'])){
		$foto=$_FILES['foto']['name'];
		$mail=$_SESSION['userMail'];
		$query = "UPDATE Usuario SET userPhoto='$foto' WHERE userMail='$mail'";
		mysqli_query($con, $query) or die(mysqli_error($con));
		$dir_subida = 'C:/xampp/htdocs/uploads/';
		$fichero_subido = $dir_subida . basename($_FILES['foto']['name']);
		echo '<pre>';
			if (move_uploaded_file($_FILES['foto']['tmp_name'], $fichero_subido)) {
				echo "El fichero es válido y se subió con éxito.\n";
			}
			else{
				echo "¡Posible ataque de subida de ficheros!\n";
			}
			echo 'Más información de depuración:';
			print_r($_FILES);
		print "</pre>";
	}
	header("Location: /profile.php");
?>