<div class="container">
	<div class="navbar-header">
		<a class="navbar-brand" href="/"><img src="icon/NavIcon.png"></img></a>
	</div>
	<form class="navbar-form navbar-left" action='/carga.php' method='post'>
		<div class="input-group">
	        <input type="button" value="Iniciar Sesion" class ="signin button" onClick="window.location = '#tologin';"> 
			<input type="text" class="form-control" placeholder="Search">
			<div class="input-group-btn">
				<button class="btn btn-default" type="submit" formaction="/logout.php">
					<i class="glyphicon glyphicon-search"></i>
				</button>
			</div>
		</div>
	</form>
	<div id="navbar" class="navbar-collapse collapse navbar-right">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<button class="btn btn-warning dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<?php
						include 'config.php';
						$query="SELECT userName FROM Usuario WHERE userMail='$_SESSION[userMail]'";
						$username = mysqli_query($con, $query);
						$username = mysqli_fetch_array($username);
						$username = $username['userName'];
						echo $username;
					?>
					<span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Mi perfil</li>
						<li><a href="/profile.php">Mi perfil</a></li>
						<li><a href="/comprar_creditos.php">Comprar créditos</a></li>
						<li><a href="/logout.php">Cerrar sesión</a></li>
						<li role="separator" class="divider"></li>
						<li class="dropdown-header">Gauchadas</li>
						<li><a href="#">Mis gauchadas</a></li>
						<li><a href="#">Gauchadas en que estoy postulado</a></li>
					</ul>
				</li>
			</ul>
			<button class="btn btn-warning" formaction="/create_favor.php">Crear Favor</button>
	</div><!--/.navbar-collapse -->
</div><!--/.container -->
