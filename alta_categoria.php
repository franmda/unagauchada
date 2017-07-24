<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}
	 $administrador= mysqli_query($con, "SELECT is_admin FROM usuario WHERE userMail='$_SESSION[userMail]'	 ;");
	 $admin = mysqli_fetch_array($administrador);
	 
	 
	  if($admin[0]== 1){
	


$consulta= mysqli_query($con, "SELECT * FROM categoria WHERE nombre_categoria ='$_POST[nombre]';");
$cons = mysqli_fetch_array($consulta);

$var= $_POST['nombre'];
      if($cons == "") {

	         mysqli_query($con, "INSERT into  categoria (`nombre_categoria`)VALUES('$_POST[nombre]');");
			 ?>
		     <script> alert(" La categoria fue creada exitosamente "); location="/crear_categoria.php";</script>
         <?php 

	          } else { 
		
			?><script> 

			alert(" Ya existe una categoria con ese nombre, vuelva a intentar con otro nombre"); location="/crear_categoria.php";
			
			</script>
			
			<?php } ?> <?php } else 
	{ header("Location: index.php");} ?>	
			
