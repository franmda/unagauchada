<!DOCTYPE html>
<html lang="en">
	<head>
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
  } </style>
		<?php include 'head.php'; include 'sources.php';
		
	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}?>
        <title>Mi perfil</title>
		<link href="/css/profile.css" rel="stylesheet">
	</head><script>
	function comprobarTel(){
		clave4 = document.f1.cellphone.value ;
		if (clave4.length == 10)
			return true;
		else
			
		{	alert("El telefono ingresado debe contener 10 digitos.") ;
			return false;
		}
	}
	function comprobarClave(){
		clave1 = document.f1.pass.value ;
		
		if ((clave1.length == 6)||(clave1.length == 0))
			return true;
		else
		{	alert("La clave no contiene 6 digitos, intente nuevamente.") ;
			return false;
		}
	}
	</script>
	<body>
		<div class="navbar-wrapper">
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<?php include 'navbar.php'; ?>
			</nav>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		
		<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
			<div class="row panel">
				<div class="col-md-4 bg_blur ">
					<a href="" data-toggle="modal" data-target="#myModal" class="btn-warning follow_btn hidden-xs">Editar perfil</a>
				</div>
				<div class="col-md-8  col-xs-12">
					<?php
						include 'config.php';
						$query="SELECT * FROM Usuario WHERE userMail='$_SESSION[userMail]'";
						$user=mysqli_query($con, $query);
						$datos=mysqli_fetch_array($user);
						echo '<img src="/uploads/'.$datos['userPhoto'].'" class="img-circle picture hidden-xs" />';
						echo '<img src="/uploads/'.$datos['userPhoto'].'" class="img-circle visible-xs" />';
					    
						$consulta="SELECT nombreCalificacion FROM calificaciones WHERE rangoDesde<='$datos[userPoints]' AND rangoHasta>='$datos[userPoints]';";
						$consulta2=mysqli_query($con, $consulta);
						$calificaciones=mysqli_fetch_array($consulta2);
				
					
					?>
					<div class="header">
						<h1><?php print_r($datos['userName']); ?></h1>
						<?php
							 //formato fecha americana
                             $fecha2=date("d-m-y",strtotime($datos['userBirth'])); ?>
						<span>Fecha de nacimiento <?php print_r($fecha2); ?></span></br>
						<span>Teléfono <?php print_r($datos['userNumber']); ?> </span></br>
						<span>Creditos <?php print_r($datos['userCredits']); ?> </span></br>
						<span>Puntaje <?php print_r($datos['userPoints']); ?> </span>
					</div>
				</div>
			</div>
			<div class="row nav">
				<div class="col-md-4"></div>
				<div class="col-md-8 col-xs-12" style="margin: 0px;padding: 0px;">
					<div class="col-md-4 col-xs-4 well">
						<i class="fa fa-weixin fa-lg"></i> <?php print_r($calificaciones[0]); ?>
					</div>
					<div class="col-md-4 col-xs-4 well">
						<i class="fa fa-thumbs-o-up fa-lg"></i> <?php print_r($datos['userPoints']); ?></div>
					</div>
			</div>
		</div>
		<hr>

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
				
					<div class="modal-header">
						<h4 class="modal-title">Edita tu perfil, gaucho!</h4>
					</div> <!-- /.modal-header -->
					<div class="modal-body">
					
						<form enctype="multipart/form-data" name="f1" autocomplete="on" method="post" onsubmit="return comprobarTel() && comprobarClave()" action="/edit_profile.php">
							<div class="form-group">
								<div class="input-group">
					<input type="text" name="user" class="form-control" id="uLogin" value= "<?php echo"$datos[userName]"?>">
									<label for="uLogin" class="input-group-addon glyphicon glyphicon-user"></label>
								</div>
							</div> <!-- /.form-group -->
							<div class="form-group">
								<div class="input-group">
									<input type="password" value="" name="pass" class="form-control" id="uPassword" placeholder="Contraseña">
									<label for="uPassword" class="input-group-addon glyphicon glyphicon-lock"></label>
								</div> <!-- /.input-group -->
							</div> <!-- /.form-group -->
							<div class="form-group">
								<div class="input-group">
									<input type="Number" name="number" class="form-control" id="cellphone" value= "<?php echo"$datos[userNumber]"?>">
									<label for="cellphone" class="input-group-addon glyphicon glyphicon-phone"></label>
								</div> <!-- /.input-group -->
							<div class="form-group">
								<label class="control-label" for="foto">Opcionalmente elige una nueva imagen, tu imagen anterior era <?php echo"$datos[userPhoto]";?> </label>
								<input id="foto" name="foto"  class="input-file" type="file">
							</div>
							</div> <!-- /.form-group -->
							<button type="submit" name="submit" class="form-control btn btn-warning">Cambiar datos</button>
						</form>
					</div> <!-- /.modal-body -->
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		    <ul>
                <li><a   class="boton" href="/historial_postulaciones.php" role="button"> Gauchadas en las que me postule</a></li>
				<br>
                <li><a  class="boton" href="/historial_aceptadas.php" role="button">Gauchadas en las que me aceptaron </a></li>
				<br>
                <li><a  class="boton"href="/historial_calificaciones.php" role="button"> mis calificaciones  </a></li>
				<br>
           </ul>

	<footer>
		<p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
	</footer>

	</body>
</html>
