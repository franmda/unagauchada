<?php
	include 'config.php';
	
 session_start();
	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}
	 $administrador= mysqli_query($con, "SELECT is_admin FROM usuario WHERE userMail='$_SESSION[userMail]'	 ;");
	 $admin = mysqli_fetch_array($administrador);
	 
	 
	 if($admin[0]== 1){

$consulta= mysqli_query($con, "SELECT * FROM calificaciones WHERE nombreCalificacion='$_POST[nombre]'OR              rangoDesde='$_POST[desde]' OR rangoHasta='$_POST[hasta]';");
$cons = mysqli_fetch_array($consulta);

$var= $_POST['nombre'];
if($cons == ""){

	 $lesigue=mysqli_query($con, "SELECT nombreCalificacion FROM `calificaciones` WHERE `nombreCalificacion` !='$var' AND `rangoDesde` >= '$_POST[desde]';");
	          $sig = mysqli_fetch_array($lesigue);
              $s=$sig[0];

               $result= mysqli_query($con, "SELECT rangoDesde FROM `calificaciones` WHERE `nombreCalificacion`='$s';");
               $ss= mysqli_fetch_array($result);




        if(($_POST['desde']<= $_POST['hasta']) && ($ss[0]>=$_POST['hasta'])) 
        {
	         mysqli_query($con, "INSERT into  calificaciones (`nombreCalificacion`, `rangoDesde`, `rangoHasta`)             VALUES ('$var', '$_POST[desde]','$_POST[hasta]');");

	         
              mysqli_query($con, "UPDATE `calificaciones` SET rangoDesde='$_POST[hasta]'+1
              WHERE `nombreCalificacion`='$s';");

              $anterior=mysqli_query($con, "SELECT nombreCalificacion FROM `calificaciones` WHERE `nombreCalificacion` !='$var' AND `rangoDesde` <= '$_POST[desde]' ORDER BY rangoDesde DESC;");
	          $ant = mysqli_fetch_array($anterior);
              $a=$ant[0];
              mysqli_query($con, "UPDATE `calificaciones` SET rangoHasta='$_POST[desde]'-1
              WHERE `nombreCalificacion`='$a';");
              ?><script> alert(" La operacion se <?php echo "$ss[0]";?> realizo con exito"); location="/crear_ranking.php";</script><?php

         	 
		     
		

	} else 
		{   
			?><script> 

			alert("El valor de 'ValorHasta' debe ser menor que el valor de 'ValorDesde' o los valores del rango tienen que estar acotados entre los existentes"); location="/crear_ranking.php";</script><?php

		             } 
  





  } else
           { ?>
		     <script> alert(" El nombre de la calificacion ya existe o alguno de los valores del rango estan repetidos"); location="/crear_ranking.php";</script>
         <?php }  ?>

	<?php 
} else 
	{ header("Location: index.php");}	?>