<script>
function comprobarFecha(){
 
  d = new Date();
  n = (d.getMonth()+1)+"/"+d.getDate()+"/"+d.getFullYear();
  h = new Date(n);
  clave6 = document.f1.datepicker.value;
  clave7 = new Date(clave6);
  if (clave7 >= h)
	return true;
  else
	{alert("Ingrese una fecha de vencimiento valida") ;
	 return false;
	}
}
</script>    

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript">



 
$(document).ready(function() {
   $("#datepicker").datepicker();
 });
 
 </script>
		<?php include 'head.php'; include 'sources.php';
		session_start();
	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}?>
		<title>Crear un favor</title>
		<link rel="stylesheet" type="text/css" href="/css/signin.css">
	</head>
	<body>
		<div class="navbar-wrapper">
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<?php include 'navbar.php'; ?>
			</nav>
		</div>

		<?php
			$cal= mysqli_query($con, "SELECT * FROM favor AS f WHERE f.userId ='$_SESSION[userMail]' AND f.usuario_aceptado != 'NULL' AND f.favorId NOT IN (SELECT id_favor FROM calificacion_favores) ;");
			          $calificacion2 = mysqli_fetch_array($cal);
     
	if($calificacion2 ==''){?>

            <div class="container marketing">
			<form enctype="multipart/form-data" name="f1" onsubmit="return comprobarFecha()"action='/alta_favor.php' autocomplete="on" method="post" class="form-signin">
				<h2 class="form-signin-heading">Completa el favor</h2>
				<!-- Text input-->
				<div class="form-group">
					<label class="control-label" for="nombre">Nombre</label>
						<input id="nombre" name="nombre" placeholder="" required="required" class="form-control input-md" type="text">
						<span class="help-block">Cuanto mas especifico, mejor</span>
				</div>
					<!-- Textarea -->
				<div class="form-group">
					<label class="control-label" for="descripcion">Descripcion</label>
					<textarea class="form-control" id="descripcion" name="descripcion" required="required"></textarea>
				</div>
					<!-- Select Basic -->
					<?php include 'incluir_categorias.php'; ?>
					<!-- Select Basic -->
					<?php include 'incluir_ubicaciones.php'; ?>
					<!-- File Button -->
				<div class="form-group">
					<label class="control-label" for="foto">Foto</label>
					<input id="foto" name="foto" class="input-file" type="file">
				</div>
				<div>
				<br>
				<label> Fecha Limite:</label>
                  <input type="text" name="datepicker" id="datepicker"  size="12" />
				  </div>
					<!-- Button --><br>
				<div class="form-group">
					<label class="control-label" for="submit"></label>
					<button id="submit" name="submit" class="btn btn-warning">Publicar Gauchada</button>
				</div>
 				 
			</form>
		</div>
		<footer>
			<p>&copy; 2017 Company, Inc.</p>
		</footer>
	</body>
	<?php } else {
        ?> <script> alert(" Usted tiene alguna/s Gauchadas sin calificar, por lo tanto no puede crear gauchadas en este momento "); location="/index.php";</script>

		<?php } ?>
</html>
