<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/tabla2.css">
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
	include 'config.php'; session_start();
	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}
	 $administrador= mysqli_query($con, "SELECT is_admin FROM usuario WHERE userMail='$_SESSION[userMail]'	 ;");
	 $admin = mysqli_fetch_array($administrador);
	 
	 
	 if($admin[0]== 1){
	
	$ranking = mysqli_query($con, "SELECT * FROM calificaciones ORDER BY rangoDesde  ASC ;");

	?>

	<body> <div class="datagrid">
	<table border="1">

    <caption>CALIFICACIONES</caption>
		<br>
        <thead>
           <tr background-color:'yellow';>
             <th scope="col">VALOR DESDE</th>
             <th scope="col">VALOR HASTA</th>
             <th scope="col">NOMBRE</th>
           </tr>
        </thead>
        <tfoot>
       <tbody>
	<?php while ($calif = mysqli_fetch_array($ranking)) {
		   
		?>
		
           <tr>
             <td><?php echo"$calif[1] "?> </td>
             <td><?php echo"$calif[2] "?> </td>
             <td><?php echo"$calif[0] "?> </td>
             
           </tr>
        </tbody>

   <?php	}?> 

 	</table> </div>
<form  name="f1" action='/alta_ranking.php'  method="post" class="form-signin">
				<h2 class="form-signin-heading"><ins>Complete calificación</ins></h2>
				<!-- Text input-->
				<div class="form-group">
					<label class="control-label" for="desde">Valor Desde</label>
						<input id="desde" name="desde" required="required"  type="number">
				</div>
				<br>		
				<div>
				<label class="control-label" for="hasta">Valor Hasta</label>
						<input id="hasta" name="hasta" required="required" type="number">
				</div>
				<br>		
				<div>
				<label class="control-label" for="nombre">Nombre</label>
						<input id="nombre" name="nombre" required="required" type="text">
				</div>
				<br>
				<div class="form-group">
					<label class="control-label" for="submit"></label>
					<button id="submit" name="submit" class="boton">Crear calificación</button>
				</div>

	</form>
	</body>
	<br><br><br><br><br>
	<footer>
	  <a  class="boton2" href= index.php>Volver</a><br>
	  <p>&copy; 2017 Company, Inc.</p>
	</footer>
</html>
	<?php } else 
	{ header("Location: index.php");}