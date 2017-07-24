<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/estilotabla.css">
	<style type="text/css">
  	.boton{
    text-decoration: none;
    padding: 5px;
    font-weight: 600;
    font-size: 17px;
    color: #ffffff;
    background-color: #F6B605;
    border-radius: 6px;
    border: none;
  }

    .boton2{
    text-decoration: none;
    padding: 5px;
    font-weight: 600;
    font-size: 17px;
    color: #ffffff;
    background-color: #6B64D5;
    border-radius: 6px;
    border: none;
	
	}
  </style>
</head>
	<?php
	include 'config.php';
	
	 session_start();
	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}
	 $administrador= mysqli_query($con, "SELECT is_admin FROM usuario WHERE userMail='$_SESSION[userMail]'	 ;");
	 $admin = mysqli_fetch_array($administrador);
	 
	 
	  if($admin[0]== 1){
		  
	   $fecha2=date("y/m/d",strtotime($_POST['datepicker']));
	   $fecha3=date("y/m/d",strtotime($_POST['datepicker2']));
	$ganancias=mysqli_query($con,"SELECT * from registro_ganancias WHERE fecha between '$fecha2' AND '$fecha3' ;");
    $gan=mysqli_fetch_array($ganancias);$ganancias=mysqli_query($con,"SELECT * from registro_ganancias WHERE fecha between '$fecha2' AND '$fecha3' ;");
    $ganancia=mysqli_query($con,"SELECT * from registro_ganancias WHERE fecha between '$fecha2' AND '$fecha3' ;");
    $gan=mysqli_fetch_array($ganancia);$ganancias=mysqli_query($con,"SELECT * from registro_ganancias WHERE fecha between '$fecha2' AND '$fecha3' ;");
	
	?>

	<body>
	<?php
	
	if($gan[0] != ""){ ?>
		
	<div class="datagrid">
	    <table border="1">

            <caption><b>Registro de Ganancias<b></caption>
		    <br>
		 
              <thead>
                <tr>
                  <th > E-mail</th>
                  <th > Cantidad creditos</th>
			      <th > Precio unitario</th>
			      <th> Precio total</th>
	    		  <th> Fecha de compra</th>
 
                </tr>
              </thead>
       
          <tbody>
	    <?php while($gan=mysqli_fetch_array($ganancias)) 
	    {?>
	 
           <tr>
		   
             <td><?php echo"$gan[0]"?> </td>
             <td><?php echo"$gan[1]"?> </td> 
			 <td><?php echo"$gan[2]"?> </td> 
			 <td><?php echo"$gan[3]"?> </td>
			 <td><?php echo"$gan[4]"?> </td>

           </tr>
     
      	  <?php	}?> 
	     </tbody>
   
        </table>
		<?php $total=mysqli_query($con,"SELECT sum(precio_total) AS tot FROM registro_ganancias WHERE fecha between '$fecha2' AND '$fecha3' ;");
		          $tot=mysqli_fetch_array($total)?>
	
	<table border="1">

            
		 
              <thead>
                <tr>
                  <th scope="col">Ganancia Total</th>
                </tr>
              </thead>
       
	    <tbody>
           <tr>
             <td><?php echo"$tot[tot]"?> </td>
           </tr>
     
      	  
	     </tbody>
   
     </table></div>
		
<?php } else { 
             ?><script> 

			alert(" No se encontraron ganancias para las fechas seleccionadas, reintente"); location="/filtrar_ganancias.php";
			
			</script>
			
			<?php } ?>

	</body>
	<br>
	<br>
	<br>
	<br>
	<br>
	
	<footer>
	  <a  class="boton2" href= filtrar_ganancias.php>Volver</a>&nbsp; &nbsp; &nbsp;<a  class="boton2" href= index.php> Home </a><br>
	  <p>&copy; 2017 Company, Inc.</p>
	</footer>
</html> <?php } else 
	{ header("Location: index.php");} ?>	