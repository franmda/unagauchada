<div class="container">
	<div class="navbar-header">
		<a class="navbar-brand" href="/"><img src="icon/NavIcon.png"></img></a>
	</div>
		<form class="navbar-form navbar-left" action='mostrar_gauchadas2.php' method='post'>
		<div class="input-group">
			<input type="text" name="nombre" class="form-control" placeholder="Titulo Gauchada">
			
				
				<?php 
				include 'config.php';
				
				$resultC = mysqli_query($con,"SELECT DISTINCT favorCategory FROM favor" );
                 echo "<select name='Categoria'>"; ?>
				 
				 <option value="">--Todas--</option>
                 <?php while($arregloc = mysqli_fetch_array($resultC)) 
                  {?>
                    <option value="<?php echo $arregloc["favorCategory"] ?> "><?php echo $arregloc["favorCategory"] ?></option>
                   <?php  }
                 ?> </select>
				 <label for = "categoria"> <h4> Categoria</h4></label>
				 
				 
				 <?php
				 $resultU = mysqli_query($con,"SELECT DISTINCT favorPlace FROM favor" );
                 echo "<select name='Ubicacion'>"; ?>
				 <option value="">--Todas--</option>
                 <?php while($arregloU = mysqli_fetch_array($resultU)) 
                  {?>
                    <option value="<?php echo $arregloU["favorPlace"] ?> "><?php echo $arregloU["favorPlace"] ?></option>
                   <?php  }
                 ?> </select>
				 
                 
				  <label for = "Ubicacion"> <h4> Ubicacion</h4></label>
				 
                 <input type ="submit" value="Filtrar"> 
         </form>
			
			</div>
	<div id="navbar" class="navbar-collapse collapse navbar-right">
			<form action="index.html" method="post">
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
						<li><a href="/mostrar_mis_gauchadas.php">Mis gauchadas</a></li>

					</ul>
				</li>
			</ul>
				<button type="submit" class="btn btn-warning" formaction="/create_favor.php">Crear Gauchada</button>
			</form>
	</div><!--/.navbar-collapse -->
</div><!--/.container -->
