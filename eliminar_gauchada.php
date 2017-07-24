<?php
 session_start();
include 'config.php';
 $favor2= mysqli_query($con,"SELECT * FROM postulantes WHERE favorId='$_REQUEST[id]'");
 $favor= mysqli_query($con, "SELECT usuario_aceptado FROM favor WHERE favorId='$_REQUEST[id]'");
 $aceptada=mysqli_fetch_array($favor);
 $postulantes=mysqli_fetch_array($favor2);
 
$favor3= mysqli_query($con,"SELECT userId FROM favor WHERE favorId='$_REQUEST[id]'");
        $usuario=mysqli_fetch_array($favor3);
	
if($aceptada[0] ==''){
	
	mysqli_query($con, "DELETE  FROM postulantes WHERE favorId='$_REQUEST[id]'");
	mysqli_query($con, "DELETE  FROM imagenes WHERE favorId='$_REQUEST[id]'");
	mysqli_query($con, "DELETE  FROM favor WHERE favorId='$_REQUEST[id]'");

	if($postulantes[0]==''){
		
		
		$favor4= mysqli_query($con, "UPDATE usuario SET userCredits =(userCredits+1) WHERE usuario.userMail='$usuario[0]'");
	}
		echo
		'<script>
			alert("La Gauchada se ha borrado exitosamente "); location="/mostrar_mis_gauchadas.php";
		</script>';
	}

   else {
		echo
		'<script>
			alert("Lo sentimos, La Gauchada ya contiene un postulante aceptado, imposible borrar ");location="/mostrar_mis_gauchadas.php";
		</script>';
	}
?>