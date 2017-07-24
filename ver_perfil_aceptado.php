<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'head.php'; include 'sources.php';
		
	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}?>
        <title>Mi perfil</title>
		<link href="/css/profile.css" rel="stylesheet">
	</head>
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
					
				</div>
				<div class="col-md-8  col-xs-12">
					<?php
						include 'config.php';
						$query="SELECT * FROM Usuario WHERE userMail='$_REQUEST[id]'";
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

					<div class="modal-body">
						
					</div> <!-- /.modal-body -->
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

	<footer>
		<p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
	</footer>

	</body>
</html>
