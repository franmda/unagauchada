<?php
session_start();
include 'config.php';
  
  //formato fecha americana
  $fecha2=date("y-m-d",strtotime($_POST['datepicker']));
 
 

$consulta=mysqli_query($con,"SELECT userCredits FROM usuario WHERE userMail ='$_SESSION[userMail]';" );
$arreglo= mysqli_fetch_array($consulta);
$cantidad_creditos=$arreglo[0];
 
$c="";$u="";
  if($_POST['categoria']!= ""){
          $cate=mysqli_query($con,"SELECT nombre_categoria FROM categoria WHERE id_categoria='$_POST[categoria]'");
          $categoria2=mysqli_fetch_array($cate);
		  $c=$categoria2[0];
  }
  if($_POST['categoria']!=""){
          $ubic=mysqli_query($con,"SELECT nombre_ubicacion FROM ubicacion WHERE id_ubicacion='$_POST[ubicacion]'");
          $ubicacion2=mysqli_fetch_array($ubic);
          $u=$ubicacion2[0];
   }
   
   if($c == ""){
       $c=$_POST['cate'];
	   }
	   
   if($u == ""){
	   $u=$_POST['ubic'];
   }
   $query = "UPDATE Favor SET favorName='$_POST[nombre]', favorDescription='$_POST[descripcion]', favorCategory='$c', favorPlace='$u', userId='$_SESSION[userMail]', fechaLimite='$fecha2' WHERE favorId='$_POST[id]'";
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
   if($nombreimg != "Gauchada.png"){
   $query = "UPDATE Imagenes SET nombreImagen='$nombreimg' WHERE favorId='$favorId'";
   }
   mysqli_query($con, $query)or die(mysqli_error($con));
   ?>
     <script>
	     alert("La gauchada fue modificada exitosamente, muchas gracias ");location="/mostrar_mis_gauchadas.php"; 
	 </script>

	 
 