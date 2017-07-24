<?php
   $cond1="=";$cond2="=";$cond3="=";
    if($_POST['nombre']==''){
		$cond1="!=";
	}
	if($_POST['categoria']==''){
		$cond2="!=";
	}
	if($_POST['ubicacion']==''){
		$cond3="!=";
	}
	include 'config.php';
	$query = "SELECT f.favorId, favorName, favorDescription, nombreImagen
	          FROM Favor AS f INNER JOIN Imagenes AS i ON(f.favorId=i.favorId)
                            LEFT JOIN Postulantes AS p ON (p.favorId= f.favorId)
	          WHERE f.favorPlace $cond3 '$_POST[ubicacion]' AND f.favorName $cond1 '$_POST[nombre]' AND f.favorCategory $cond2 '$_POST[categoria]'
	          GROUP BY f.favorId,f.favorName,f.favorDescription,i.nombreImagen
            ORDER BY (COUNT(p.favorId));";
	if (mysqli_multi_query($con, $query) or die (mysqli_error($con))) {
		do {
			if ($resultado = mysqli_use_result($con)) {
				while ($row = mysqli_fetch_row($resultado)) {
					echo '<div class="col-lg-4"> ';
					echo '<img class="img-circle" src="/uploads/'."$row[3]".'" alt="Generic placeholder image" width="140" height="140">';
					if (strlen($row[1])>19) {
						$titulo=substr($row[1], 0, 19);
						echo '<h2>'."$titulo".'...</h2>'.'<p>';
					}
					else{
						echo '<h2>'."$row[1]".'</h2>'.'<p>';
					}
					if (strlen($row[2])>45) {
						$desc=substr($row[2], 0, 45);
						echo "$desc...";
						echo '</p></br><p><a class="btn btn-default" href="/product.php?id='.$row[0].'" role="button">View details &raquo;</a></p></div><!-- /.col-lg-4 -->';
					}
					else{
						echo "$row[2]";
						echo '</p></br><p><a class="btn btn-default" href="/product.php?id='.$row[0].'" role="button">Mostrar detalle &raquo;</a></p></div><!-- /.col-lg-4 -->';
					}
				}
				mysqli_free_result($resultado);
			}
		} while (mysqli_next_result($con));
	}
?>
