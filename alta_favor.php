
<?php
session_start();
include 'config.php';
  
  //formato fecha americana
  $fecha2=date("y-m-d",strtotime($_POST['datepicker']));
 
 

$consulta=mysqli_query($con,"SELECT userCredits FROM usuario WHERE userMail ='$_SESSION[userMail]';" );
$arreglo= mysqli_fetch_array($consulta);
$cantidad_creditos=$arreglo[0];
 
 if($cantidad_creditos > 0 )
{
   $query="SELECT nombre_categoria FROM Categoria AS C WHERE id_categoria='$_POST[categoria]'";
   $favorCategory = mysqli_query($con, $query);
   $favorCategory = mysqli_fetch_array($favorCategory);
   $favorCategory = $favorCategory['nombre_categoria'];
   $query="SELECT nombre_ubicacion FROM Ubicacion AS Ub WHERE id_ubicacion='$_POST[ubicacion]'";
   $favorPlace = mysqli_query($con, $query);
   $favorPlace = mysqli_fetch_array($favorPlace);
   $favorPlace = $favorPlace['nombre_ubicacion'];
   $query = "INSERT INTO Favor (favorName, favorDescription, favorCategory, favorPlace, userId, fechaLimite) VALUES ('$_POST[nombre]','$_POST[descripcion]','$favorCategory','$favorPlace','$_SESSION[userMail]' ,'$fecha2')";
   
   mysqli_query($con, $query) or die(mysqli_error($con));
   if (!empty($_FILES['foto']['name'])){
	  $dir_subida = 'C:/xampp/htdocs/uploads/';
	  $fichero_subido = $dir_subida . basename($_FILES['foto']['name']);
	  move_uploaded_file($_FILES['foto']['tmp_name'], $fichero_subido);
	  $nombreimg = $_FILES['foto']['name'];
    }
    else{
	  $nombreimg = 'Gauchada.png';
       }
   $query = "SELECT favorId FROM Favor ORDER BY favorId desc LIMIT 1";
   $favorId = mysqli_query($con, $query)or die(mysqli_error($con));
   $favorId = mysqli_fetch_array($favorId);
   $favorId = $favorId['favorId'];
   $query = "INSERT INTO Imagenes (favorId, nombreImagen) VALUES ('$favorId','$nombreimg')";
   mysqli_query($con, $query)or die(mysqli_error($con));
   ?>
     <script>
	     alert("La gauchada fue publicada exitosamente, muchas gracias "); location="/"; 
	 </script>
   <?php
   
   }else{?>
     <script>
	    alert(" Su saldo es insuficiente para publicar una gauchada. Recargue creditos e intente nuevamente  "); location="/"; 
	 </script>
    <?php 	 } ?>