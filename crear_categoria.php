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
	include 'config.php';
	 session_start();
	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}
	 $administrador= mysqli_query($con, "SELECT is_admin FROM usuario WHERE userMail='$_SESSION[userMail]'	 ;");
	 $admin = mysqli_fetch_array($administrador);
	 
	 
	  if($admin[0]== 1){
	
	$categorias = mysqli_query($con, "SELECT * FROM categoria ORDER BY id_categoria ASC ;");

	?>

	<body><div class="datagrid">
	<table border="1">

    <caption>CATEGORÌAS</caption>
		<br>
		 
        <thead>
           <tr>
             <th >Id Categoría</th>
             <th >Nombre Categoría</th>

           </tr>
        </thead>
       <tbody>
       
	<?php while($cate=mysqli_fetch_array($categorias)) {
		   
		?>
	
           <tr>
             <td><?php echo"$cate[0]"?> </td>
             <td><?php echo"$cate[1]"?> </td> 

           </tr>
      
      	  <?php	}?> 
	 </tbody>
   
</table> </div>
<form  name="f1" action='/alta_categoria.php'  method="post" class="form-signin">
				<h2 class="form-signin-heading"><ins>Creación de Categoría</ins></h2>
				<!-- Text input-->
		         <div>
				<label class="control-label" for="nombre">Escriba el Nombre de la categoría que desea crear</label>
						<input id="nombre" name="nombre" required="required" type="text">
				</div>
				<br>
				<br>
			
				<div class="form-group">
					<label class="control-label" for="submit"></label>
					<button id="submit" name="submit" class="boton">Añadir categoría</button>
				</div>

				
</form>

<form  name="f2" action='/baja_categoria.php'  method="post" class="form-signin">
				<h2 class="form-signin-heading"><ins>Eliminación de Categoría</ins></h2>
				<!-- Text input-->
		        <div>
				<label class="control-label" for="nombre">Escriba el "id_categoría" de la categoría que desea elimninar </label>
						<input id="id" name="id" required="required" type="number">
				</div>
				<br>
				<br>
			
				<div class="form-group">
					<label class="control-label" for="submit"></label>
					<button id="submit" name="submit" class="boton">Eliminar categoría</button>
				</div>

				
</form>

<form  name="f3" action='/modificar_categoria.php'  method="post" class="form-signin">
				<h2 class="form-signin-heading"><ins>Modificacion de Categoría</ins></h2>
				<!-- Text input-->
		       <div>
				<label class="control-label" for="nombre">Escriba el "id_categoría" de la categoría que desea modificar </label>
						<input id="id2" name="id2" required="required" type="number">
				</div>
				<br>
				<br>
				<div>
				<label class="control-label" for="nombre">Escriba el Nombre para la categoria a modificar </label>
						<input id="nombre2" name="nombre2" required="required" type="text">
			    </div>
				<br>
				<br>
			
				<div class="form-group">
					<label class="control-label" for="submit"></label>
					<button id="submit" name="submit" class="boton">Modificar Categoría</button>
				</div>

				
</form>
	</body>
	<br>
	<br>
	<br>
	<br>
	<br>
	
	<footer>
	  <a  class="boton2" href= index.php>Volver</a><br>
	  <p>&copy; 2017 Company, Inc.</p>
	</footer>
</html> <?php } else 
	{ header("Location: index.php");} ?>	