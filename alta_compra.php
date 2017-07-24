<?php
	session_start();
	include 'config.php';
	$query = "SELECT precio FROM Precio_credito";
	$precio = mysqli_query($con, $query) or die (mysqli_error($con));
	$precio = mysqli_fetch_array($precio);
	$precio = $precio[0];
	$total = $precio * $_POST['cantidad'];
	$hoy = date("y-m-d");
	$query = "SELECT userMail FROM Usuario WHERE userMail = '$_SESSION[userMail]'";
	$user = mysqli_query($con, $query) or die (mysqli_error($con));
	$user = mysqli_fetch_array($user);
	$user = $user[0];
	if ($user!="") {
		$query = "SELECT userPassword FROM Usuario WHERE userMail = '$_SESSION[userMail]'";
		$password = mysqli_query($con, $query) or die (mysqli_error($con));
		$password = mysqli_fetch_array($password);
		$password = $password[0];
		if ($_POST['password'] == $password) {
			$query = "INSERT INTO Registro_ganancias (mailUser, cantidad, precio_unitario, precio_total, fecha) VALUES ('$_SESSION[userMail]', '$_POST[cantidad]', '$precio', '$total', '$hoy')";
			mysqli_query($con, $query) or die (mysqli_error($con));
			echo '<script> alert("La compra fue registrada exitosamente! Muchas gracias!"); location="/"; </script>';
		}
		else {
			echo '<script> alert("La contraseña del usuario no coincide, intente nuevamente."); location="/comprar_creditos.php"; </script>';
		}
	}

?>
