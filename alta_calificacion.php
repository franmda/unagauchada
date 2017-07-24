<!DOCTYPE html>
<html lang="en">

  <?php
    include 'config.php';



    $consulta=mysqli_query($con,    "INSERT INTO `calificacion_favores` (`id_favor`,`favor_name`, `mailUsuario`, `mailAceptado`, `calificacionObtenida`, `comentarios`) VALUES ('$_POST[idFavor]', '$_POST[favorName]','$_POST[mailUsuario]', '$_POST[mailAceptado]', '$_POST[puntaje]', '$_POST[comentario]');" );

if($_POST['puntaje'] == 1){
     $consulta2=mysqli_query($con,"UPDATE `usuario` SET `userPoints` = userPoints+1 , `userCredits` = userCredits+1 WHERE `usuario`.`userMail` = '$_POST[mailAceptado]'; ");
  }
 if($_POST['puntaje'] == '-1'){
     $consulta2=mysqli_query($con,"UPDATE `usuario` SET `userPoints` = userPoints-2 WHERE `usuario`.`userMail` = '$_POST[mailAceptado]'; ");
  }
  
				
 header("Location: product.php?id=$_POST[idFavor]");

	?>

</html>