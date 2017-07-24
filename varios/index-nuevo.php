<!DOCTYPE html>
<html>
	<head>
		<?php
			include 'head.php';
			include 'sources.php';
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
		<?php if (isset($_SESSION['userMail'])){ ?>
			<div class="navbar-wrapper">
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<?php include 'navbar2.php'; ?>
				</nav>
			</div>

			<!-- Main jumbotron for a primary marketing message or call to action -->
			<div class="jumbotron"></div>

			<div class="container marketing">
				<div class="row">
					<?php include 'mostrar_gauchadas.php'; ?>
				</div>
			</div>

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
		<?php }?>
	</body>
	<script type="text/javascript">
		$('p input').datepicker({autoclose: true});
	</script>
</html>
