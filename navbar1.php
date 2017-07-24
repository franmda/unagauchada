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
		<button class="btn btn-warning" data-toggle="modal" data-target="#modal-1">Iniciar Sesión/Registrarse</button>
	</div><!--/.navbar-collapse -->
</div><!--/.container -->
