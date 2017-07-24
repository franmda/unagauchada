<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			include 'head.php'; include 'sources.php';
      if (!isset($_SESSION['userMail'])){
     		header("Location: index.php");
	 		}
		?>
    <title>Filtrar Gauchadas</title>
	</head>
	<body>
    <div class="navbar-wrapper">
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <?php include 'navbar.php'; ?>
      </nav>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron"></div>

    <div class="container marketing">
      <div class="row">
        <?php include 'mostrar_con_filtro.php'; ?>
      </div>
    </div>
  </body>
  </html>
