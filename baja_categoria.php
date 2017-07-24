<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}
	 $administrador= mysqli_query($con, "SELECT is_admin FROM usuario WHERE userMail='$_SESSION[userMail]'	 ;");
	 $admin = mysqli_fetch_array($administrador);
	 
	 
	  if($admin[0]== 1){
	


$consulta= mysqli_query($con, "SELECT * FROM categoria WHERE id_categoria ='$_POST[id]';");
$cons = mysqli_fetch_array($consulta);

      if($cons != "")
	    { 
             mysqli_query($con, "DELETE FROM  categoria WHERE id_categoria='$_POST[id]' ;");
			 ?>
		     <script> alert(" La categoria fue eliminada exitosamente "); location="/crear_categoria.php";</script>
         <?php 

	          } else { 
		
			?><script> 

			alert(" No existe una categoria con ese numero , vuelva a intentar con otro numero "); location="/crear_categoria.php";
			
			</script>
			
			<?php } ?>
			<?php } else 
	{ header("Location: index.php");} ?>	
			

