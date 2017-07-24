<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			include 'head.php';
			include 'sources.php';
			if (!isset($_SESSION['userMail'])) {
				echo '<link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" rel="stylesheet">
							<link rel="stylesheet" type="text/css" href="/css/datepicker.css">
							<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
							<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
							<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
							';
			}
			include 'config.php';
			$favor = mysqli_query($con, "SELECT * FROM Favor AS f INNER JOIN Imagenes AS i ON (f.favorId = i.favorId) INNER JOIN Usuario AS u ON(f.userId = u.userMail) WHERE f.favorId='$_REQUEST[id]'");
			$datos = mysqli_fetch_array($favor);
		?>
		<script>
			$('.datepicker').datepicker({autoclose: true});
		</script>
		<title><?php echo "$datos[favorName]"; ?></title>
		<link href="/css/product.css" rel="stylesheet">
		<link rel="stylesheet" href="/css/comments.css">
	</head>
	<body>
		<?php if (isset($_SESSION['userMail'])) {?>
		<div class="navbar-wrapper">
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<?php include 'navbar.php'; ?>
			</nav>
		</div>
		<?php }else{ ?>
			<div class="navbar-wrapper">
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<?php include 'navbar1.php';?>
				</nav>
			</div>
			<?php include 'sign_in.php'; include 'sign_up.php'; ?>
		<?php } ?>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<a href= index.php><h3>Volver</h3></a><br>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 item-photo">
					<img src=<?php echo '"/uploads/'.$datos['nombreImagen'].'"'; ?> />
				</div>
				<div class="col-lg-4">
					<h2>
						<?php echo $datos['favorName']; ?>
					</h2>
					<h4>
						<ul>
							<?php
							$aceptado=$datos['usuario_aceptado'];
							if($datos['usuario_aceptado']==NULL){
								$aceptado="ninguno";
							}
							 //formato fecha americana
                                    $fecha2=date("d-m-y",strtotime($datos['fechaLimite']));
								echo '<li> Categoria: '.$datos['favorCategory'].'</li>';
								echo '<li> Usuario: '.$datos['userName'].'</li>';
								echo '<li> Ubicacion: '.$datos['favorPlace'].'</li>';
								echo '<li> Fecha Limite: '.$fecha2.'</li>';
								echo '<li>Usuario Aceptado: <br>'.$aceptado.'</li>';
							?>
						</ul>
					</h4>
				</div>
				<?php if($datos['usuario_aceptado'] == NULL){
				?>	
				<div class="col-xs-4 col-sm-4">
					<div class="panel panel-default">
						<div class="panel-heading c-list">
							<span class="title">Postulantes</span>
							<ul class="pull-right c-controls">
								<li><a href=<?php echo '"/add_postulant.php?id='.$_REQUEST['id'].'"';?> data-toggle="tooltip" data-placement="top" title="Postularme!"><i class="glyphicon glyphicon-plus"></i></a></li>
								<li><a href="#" class="hide-search" data-command="toggle-search" data-toggle="tooltip" data-placement="top" title="Buscar Postulante"><i class="fa fa-ellipsis-v"></i></a></li>
							</ul>
						</div>

						<div class="section row" style="display: none;">
							<div class="col-xs-12">
								<div class="input-group c-search">
									<input type="text" class="form-control" id="contact-list-search">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search text-muted"></span></button>
									</span>
								</div>
							</div>
						</div>

						<ul class="list-group" id="contact-list">
							<?php
								$query="SELECT count(favorId) AS cant FROM Postulantes WHERE favorId='$_REQUEST[id]'";
								$cant=mysqli_query($con, $query);
								$cant=mysqli_fetch_array($cant);
								if ($cant['cant']>0) {
									include 'mostrar_postulantes.php';
								}
				} else {
                         if ((isset($_SESSION['userMail']))&&($_SESSION['userMail']==$datos['userMail'])) {
				          ?> <div> <br><br><br><br><br><br><br><br><br><br><br> <?php
					echo '<a class="btn btn-default" href="/ver_perfil_aceptado.php?id='.$datos['usuario_aceptado'].'"role="button">Perfil usuario aceptado  </a>'; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

					<?php
					 $cal = mysqli_query($con, "SELECT * FROM calificacion_favores WHERE id_favor ='$_REQUEST[id]'");
			          $calificacion2 = mysqli_fetch_array($cal);

					if($calificacion2[0] ==''){?>
					<BR><BR>
					<form name="f1" method="post"  action="/alta_calificacion.php">
					<div class="form-group">
						
						    <?php echo"<b>Calificá al usuario</b>"; ?> &nbsp;&nbsp;
							<select name="puntaje">
                                  <option value=1>Bien</option> 
                                  <option value=0 selected>Neutro</option>
  								  <option value=-1>Mal</option>

							</select>
							
							<div class="input-group">
							
							<input type="hidden" name="favorName" value="<?php echo"$datos[favorName]";?>">
							<input type="hidden" name="idFavor" value="<?php echo"$datos[favorId]";?>">
							<input type="hidden" name="mailUsuario" value="<?php echo"$_SESSION[userMail]";?>">
				            <input type="hidden" name="mailAceptado" value="<?php echo"$datos[usuario_aceptado]";?>">

						        <label for="number"> <b>Comentarios:</b></label><br>
						        	<textarea class="form-control" id="comentario" name="comentario" required="required"></textarea>
						</div> <!-- /.input-group -->
					</div> <!-- /.form-group -->
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-warning"> Enviar calificacion </button>
				
			</div>
		</form>
		<?php } ?>
				</div> <?php
						} 
					} 
						?>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xs-9">
			<ul class="menu-items">
				<li class="active">Detalles de la gauchada</li>
			</ul>
			<div style="width:100%;border-top:1px solid silver">
				<p style="padding:15px;">
					<small>
						<?php echo $datos['favorDescription']; ?>
					</small>
				</p>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		
	<?php include 'comments.php'; ?>
	<footer>
		<p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
	</footer>

	</body>	
	<script src="js/product.js"></script>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>
	<script type="text/javascript">
		$('p input').datepicker({autoclose: true});
	</script> 
</html>