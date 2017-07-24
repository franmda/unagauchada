<!DOCTYPE html>
<html>
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
		
		<?php
			include 'head.php';
			include 'sources.php';
			include 'config.php';
		?>
		<?php if (!isset($_SESSION['userMail'])) {
			echo '<link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" rel="stylesheet">
						<link rel="stylesheet" type="text/css" href="/css/datepicker.css">
						<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
						<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
						<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
						';
		}
		?>
		<script>
			$('.datepicker').datepicker({autoclose: true});
		</script>
		<title>Una Gauchada</title>
	</head>
	<body>
		<?php if (isset($_SESSION['userMail'])){ 
		$admin = mysqli_query($con, "SELECT is_admin FROM usuario WHERE userMail ='$_SESSION[userMail]';");
		$isadmin = mysqli_fetch_array($admin);?>
			<div class="navbar-wrapper">
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<?php include 'navbar.php'; ?>
				</nav>
			</div>

			<!-- Main jumbotron for a primary marketing message or call to action -->
			<div class="jumbotron"></div>

			<div class="container marketing">
				<div class="row">
					<?php include 'mostrar_gauchadas.php'; ?>
				</div>
			</div>
            <?php if($isadmin[0]== 1){ ?>
		
		    <ul>
                <li><a   class="boton" href="/ranking_usuarios.php" role="button"> Ver ranking de usuarios</a></li>
				<br>
                <li><a  class="boton" href="/crear_ranking.php" role="button">Crear calificacion </a></li>
				<br>
                <li><a  class="boton"href="/crear_categoria.php" role="button"> Administrar categorías </a></li>
				<br>
                <li><a class="boton" href="/filtrar_ganancias.php" role="button"> determinar ganancias del sitio</a></li>
				<br>
                <li><a class="boton"  href="#">Editar una reputacion</a></li>
           </ul><?php
			}?>
		<?php }else{ ?>

			<div class="navbar-wrapper">
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<?php include 'navbar1.php'; ?>
				</nav>
			</div>

			<!-- Main jumbotron for a primary marketing message or call to action -->
			<div class="jumbotron"></div>
			<div class="container marketing">
				<div class="row">
					<?php include 'mostrar_gauchadas.php'; ?>
				</div>
			</div>

			<?php include 'sign_in.php'; include 'sign_up.php'; ?>
		<?php 
			}
		
		
		
		?>
		<br>
		<br>
		<br>
		<footer>
			<p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
		</footer>
	</body>

	<script type="text/javascript">
		$('p input').datepicker({autoclose: true});
	</script>
</html>
