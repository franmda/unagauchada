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
		<?php include 'head.php'; include 'sources.php';include 'config.php';
		
	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}?>
		
		<title>Crear un favor</title>
		<link rel="stylesheet" type="text/css" href="/css/signin.css">
	</head>
	<body>
	<?php
	        $aceptado = mysqli_query($con, "SELECT * FROM Favor AS f WHERE f.favorId='$_REQUEST[id]' AND f.usuario_aceptado is NULL ;");
			$datos2 = mysqli_fetch_array($aceptado);

			if ($datos2 != "") {
			
			
			$favor = mysqli_query($con, "SELECT * FROM Favor AS f INNER JOIN Imagenes AS i ON (f.favorId = i.favorId) INNER JOIN Usuario AS u ON(f.userId = u.userMail) WHERE f.favorId='$_REQUEST[id]'");
			$datos = mysqli_fetch_array($favor);
			
		?>
		<div class="navbar-wrapper">
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<?php include 'navbar.php'; ?>
			</nav>
		</div>
		<div class="container marketing">
			<form enctype="multipart/form-data" name="f1" onsubmit="return comprobarFecha()" action='/alta_modificacion.php'  autocomplete="on" method="post" class="form-signin">
				<h2 class="form-signin-heading">Completa el favor</h2>
				<!-- Text input-->
				<div class="form-group">
					<label class="control-label" for="nombre">Nombre</label>
						<input id="nombre" name="nombre" placeholder="" required="required" class="form-control input-md" type="text" value="<?php echo"$datos[favorName]";?>">
						<span class="help-block">Cuanto mas especifico, mejor</span>
				</div>
					<!-- Textarea -->
				<div class="form-group">
					<label class="control-label" for="descripcion">Descripcion</label>
					<textarea class="form-control input-md" id="descripcion" name="descripcion"  required="required" ><?php echo "$datos[favorDescription]";?></textarea>
				</div>
				<input type="hidden" name="id" value="<?php echo"$_REQUEST[id]";?>">
				<input type="hidden" name="cate" value="<?php echo"$datos[favorCategory]";?>">
				<input type="hidden" name="ubic" value="<?php echo"$datos[favorPlace]";?>">
					<!-- Select Basic -->
					
					
					<?php //categorias
	                
	                     $query = "SELECT * FROM Categoria AS c";
                         echo '<div class="form-group"><label class="control-label" for="categoria">Categoria</label><select id="categoria" name="categoria" class="form-control">';
	                          if (mysqli_multi_query($con, $query) or die (mysqli_error($con))) {
		                         do {
			                       if ($resultado = mysqli_use_result($con)) {
									   echo '<option value="'.$datos[favorCategory].'">'.$datos[favorCategory].'</option>';
				                   while ($row = mysqli_fetch_row($resultado)) {
									    if(($row[0] != $datos[favorCategory])&& ($row[1] !=$datos[favorCategory]) ) {
										echo '<option value="'.$row[0].'">'.$row[1].'</option>';}
				                      }
				               mysqli_free_result($resultado);
			                  }
		                     } while (mysqli_next_result($con));
                       	}
                         echo '</select></br>';
                         ?>
					
					
					
					<!-- Select Basic -->
					<?php //ubicaciones
					
					
	$query = "SELECT * FROM Ubicacion AS ub";
  echo '<div class="form-group"><label class="control-label" for="ubicacion">Ubicacion</label><select id="ubicacion" name="ubicacion" class="form-control">';
	if (mysqli_multi_query($con, $query) or die (mysqli_error($con))) {
		do {
			if ($resultado = mysqli_use_result($con)) {
				 echo '<option value="'.$datos[favorPlace].'">'.$datos[favorPlace].'</option>';
				while ($row = mysqli_fetch_row($resultado)) {
					
          if(($row[0] != $datos[favorPlace])&& ($row[1] !=$datos[favorPlace]) ) {
		       echo '<option value="'.$row[0].'">'.$row[1].'</option>';}
				}
				mysqli_free_result($resultado);
			}
		} while (mysqli_next_result($con));
	}
  echo '</select></br>';


					
					
					
					
?>
					<!-- File Button -->
				<div class="form-group">
					<label class="control-label" for="foto">Opcionalmente elige una nueva imagen , tu imagen anterior era <?php echo"$datos[nombreImagen]";?></label>
					<input id="foto" name="foto" class="input-file" type="file" >
				</div>
				<div>
				<br>
				<label> Fecha Limite:</label>
                  <input type="text" value="<?php 
							 //formato fecha americana
                                    $fecha2=date("m/d/y",strtotime($datos['fechaLimite']));echo"$fecha2";?>" name="datepicker" id="datepicker"  size="12" />
				  </div>
					<!-- Button --><br>
				<div class="form-group">
					<label class="control-label" for="submit"></label>
					<button id="submit" name="submit" class="btn btn-warning">Modificar Gauchada</button>
				</div>
 				 
			</form>
		</div>
		<footer>
			<p>&copy; 2017 Company, Inc.</p>
		</footer>
	</body>
	<?php } else { ?>
		<script> alert(" Este favor contiene un usaurio aceptado, por lo tanto no es posible modificar la Gauchada"); location="/mostrar_mis_gauchadas.php";</script>
	<?php } ?>
</html>
