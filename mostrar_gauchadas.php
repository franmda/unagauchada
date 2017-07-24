<?php
	include 'config.php';
	$query = "SELECT f.favorId, favorName, favorDescription, nombreImagen FROM Favor AS f INNER JOIN Imagenes AS i ON(f.favorId=i.favorId);";
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
