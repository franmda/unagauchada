
<html><head>
  <style type="text/css">
  .boton_personalizado{
    text-decoration: none;
    padding: 5px;
    font-weight: 600;
    font-size: 14px;
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
</head><body  >



<?php
    session_start();
	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}
	include 'config.php';
	$query = "SELECT f.favorId, favorName, favorDescription, nombreImagen FROM Favor AS f INNER JOIN Imagenes AS i ON(f.favorId=i.favorId) INNER JOIN Usuario as u ON(f.userId=u.userMail) WHERE userMail = '$_SESSION[userMail]'";
	if (mysqli_multi_query($con, $query) or die (mysqli_error($con))) {
		do {
			if ($resultado = mysqli_use_result($con)) {
				while ($row = mysqli_fetch_row($resultado)) {
					echo '<div class="col-lg-4"> ';
					if (strlen($row[1])>24) {
						$titulo=substr($row[1], 0, 20);
						echo '<h2>'."$titulo".'...</h2>'.'<p>';
					}
					else{
						echo '<h2>'."$row[1]".'</h2>'.'<p>';
					}
					echo '<img class="img-circle" src="/uploads/'."$row[3]".'" alt="Generic placeholder image" width="140" height="140"><br><br><br>';
					
					if (strlen($row[2])>80) {
						$desc=substr($row[2], 0, 87);
						echo "$desc...";
					}
					else{
						echo "$row[2]";
					}
					?>
					<div><?php echo '<p><a class="boton_personalizado" href="/product.php?id='.$row[0].'" role="button">Ver detalles</a>&nbsp 
					<a class="boton_personalizado" " href="/eliminar_gauchada.php?id='.$row[0].'" role="button">Eliminar</a>&nbsp 
					<a class="boton_personalizado" " href="/modificar_favor.php?id='.$row[0].'" role="button">Modificar</a></p>';
					?></div><?php
					echo '</div><!-- /.col-lg-4 -->';
				}
				mysqli_free_result($resultado);
			}
		} while (mysqli_next_result($con));
	}
?></body>
<br>

<br>
<br><br><br><br><br><br>
<footer>
<a  class="boton2" href= index.php>Volver</a><br>
<p>&copy; 2017 Company, Inc.</p>
</footer>

</html>