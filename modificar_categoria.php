<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}
	 $administrador= mysqli_query($con, "SELECT is_admin FROM usuario WHERE userMail='$_SESSION[userMail]'	 ;");
	 $admin = mysqli_fetch_array($administrador);
	 
	 
	  if($admin[0]== 1){
	


$consulta= mysqli_query($con, "SELECT nombre_categoria FROM categoria WHERE id_categoria ='$_POST[id2]';");
$cons = mysqli_fetch_array($consulta);

      if($cons != "")
	    { 
	         mysqli_query($con, "UPDATE  favor SET favorCategory='$_POST[nombre2]'
                     WHERE favorCategory='$cons[0]' ;");
             mysqli_query($con, "UPDATE  categoria SET nombre_categoria='$_POST[nombre2]'
                     WHERE id_categoria='$_POST[id2]' ;");
			 ?>
		     <script> alert(" La categoria fue modificada exitosamente "); location="/crear_categoria.php";</script>
         <?php 

	          } else { 
		
			?><script> 

			alert(" No existe una categoria con ese numero , vuelva a intentar con otro numero "); location="/crear_categoria.php";
			
			</script>
			
			<?php } ?>
				<?php } else 
	{ header("Location: index.php");} ?>	
			

			