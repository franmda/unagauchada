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


</style><?php
include 'head.php';
			include 'sources.php'; ?>
</head><body>



<?php
    
	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}
	include 'config.php';
	$query = "SELECT f.favorId, favorName, favorDescription, nombreImagen FROM Favor AS f INNER JOIN Imagenes AS i ON(f.favorId=i.favorId)
            	INNER JOIN postulantes as p ON(f.favorId=p.favorId) WHERE userMail = '$_SESSION[userMail]'";
	$query2 = "SELECT f.favorId, favorName, favorDescription, nombreImagen FROM Favor AS f INNER JOIN Imagenes AS i ON(f.favorId=i.favorId)
            	INNER JOIN postulantes as p ON(f.favorId=p.favorId) WHERE userMail = '$_SESSION[userMail]'";
	  $consul=mysqli_query($con,$query2);
    $cond=mysqli_fetch_array($consul);
	if($cond[0] != ""){
	if (mysqli_multi_query($con, $query) or die (mysqli_error($con))) {
		do {
			if ($resultado = mysqli_use_result($con)) {
				while ($row = mysqli_fetch_row($resultado)) {
					echo '<div class="col-lg-4"> ';
					echo '<img class="img-circle" src="/uploads/'."$row[3]".'" alt="Generic placeholder image" width="140" height="140">';
					if (strlen($row[1])>24) {
						$titulo=substr($row[1], 0, 20);
						echo '<h2>'."$titulo".'...</h2>'.'<p>';
					}
					else{
						echo '<h2>'."$row[1]".'</h2>'.'<p>';
					}
					if (strlen($row[2])>80) {
						$desc=substr($row[2], 0, 87);
						echo "$desc...";
						echo '</p><p><a class="btn btn-default" href="/product.php?id='.$row[0].'" role="button">Ver detalles &raquo;</a></p></div><!-- /.col-lg-4 -->';
					}
					else{
						echo "$row[2]";
						echo '</p></br><p><a class="btn btn-default" href="/product.php?id='.$row[0].'" role="button">Ver detalles &raquo;</a></p></div><!-- /.col-lg-4 -->';
					}
				}
				mysqli_free_result($resultado);
			}
		} while (mysqli_next_result($con));
	}
?>
<div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a  class="boton2" href= profile.php>Volver</a><br><br>


</div>
</body>
<br>

 <?php 

	          } else { 
		
			?><script> 

			alert("  Aun no te has postulado a ninguna gauchada "); location="/profile.php";
			
			</script>
			
			<?php } ?>
			


</html>