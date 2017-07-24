<?php
	include 'config.php';
	$query = "SELECT userMail FROM Usuario WHERE userMail= '$_POST[email]'";
	$mail = mysqli_query($con, $query) or die (mysqli_error($con));
	$mail = mysqli_fetch_array($mail);
	$mail = $mail['userMail'];
	if($mail==''){
		mysqli_query($con, "INSERT INTO Usuario (userName,userMail,userPassword,userPoints,userCredits,userNumber,userBirth,userPhoto,is_admin) VALUES
		('$_POST[username]','$_POST[email]','$_POST[password]',0,0,'$_POST[number]','$_POST[birth]','Gauchada.png',0)");
		echo
		'<script>
			alert("El usuario se registro correctamente, muchas gracias ");location="/";
		</script>'; 
		}
	else{
		echo
		'<script>
			alert("Lo sentimos, La direccion de correo utillizada se encuentra en uso, intentalo nuevamente");location="/";
		</script>';
	}
?>
