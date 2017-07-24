<?php
    $id=$_REQUEST['id'];
	$query="SELECT * FROM Postulantes WHERE favorId='$_REQUEST[id]'";
	$postulantes=mysqli_query($con, $query);
	
	//while($ro = mysqli_fetch_array($postulantes)) {
	//echo $ro['userMail'];}
	//$post=mysqli_fetch_array($postulantes);
	while($ro = mysqli_fetch_array($postulantes)) {
	//echo $ro['userMail'];}
	$query1="SELECT userName, userPoints,  userMail, userPhoto FROM Usuario WHERE userMail='$ro[userMail]'";
	
	//echo "$query1";}
	$user=mysqli_query($con, $query1);
	$user=mysqli_fetch_array($user);
	$consulta="SELECT nombreCalificacion FROM calificaciones WHERE rangoDesde<='$user[userPoints]' AND rangoHasta>='$user[userPoints]';";
    $consulta2=mysqli_query($con, $consulta);
    $calificaciones=mysqli_fetch_array($consulta2);
	echo '
	
		<li class="list-group-item">
			<div class="col-xs-12 col-sm-3">
				<img src="/uploads/'.$user['userPhoto'].'" alt="'.$user['userName'].'" class="img-responsive img-circle"/>'.'
			</div>
			<div class="col-xs-12 col-sm-9">
				<span class="name">'.$user['userName'].'</span> <br/>
				<span class="fa fa-weixin fa-lg text-muted c-info" data-toggle="tooltip" title="'.$calificaciones[0].'"> </span>
				<span class="visible-xs">
					<span class="text-muted">'.$calificaciones[0].'</span> <br/>
				</span>
				<span class="fa fa-thumbs-o-up fa-lg text-muted c-info" data-toggle="tooltip" title="'.$user['userPoints'].'"> </span>
				<span class="visible-xs">
					<span class="text-muted">'.$user['userPoints'].'</span> <br/>
				</span>
				<span class="glyphicon glyphicon-tags text-muted c-info" data-toggle="tooltip" title="'.$user['userMail'].'"> </span>
				<span class="visible-xs">
					<span class="text-muted">'.$user['userMail'].'</span> <br/>
				</span>
				 <a href="/aceptar_postulante.php/?id='.$user["userMail"].'&& id2='.$id.'" >
					<span class="glyphicon glyphicon-ok text-muted c-info" data-toggle="tooltip" title="Aceptar"> </span>
					<span class="visible-xs">
					<span class="text-muted">Aceptar</span> <br/>
				</span>
				</a>				
			</div>
			<div class="clearfix"> </div>
		</li>
		';}
?>
