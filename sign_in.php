<?php
	if(isset($_SESSION['log'])){
		if ($_SESSION['log']==1) {
			echo '<script>alert("La clave es incorrecta, reintente.");</script>';
		}
		elseif ($_SESSION['log']==2) {
			echo '<script>alert("La direccion de e-mail ingresada no se encuentra registrada en el sistema.");</script>';
		}
		session_destroy();
	}
?>

<!-- #Sign in modal -->

<div class="modal fade" id="modal-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Iniciar sesión</h4>
			</div>
			<div class="modal-body">
			<form method="post" action="/login.php">
				<div class="form-group">
					<div class="input-group">
						<input class="form-control" id="email" name="email" required type="email" placeholder="Tu e-mail"/>
						<label for="email" class="input-group-addon glyphicon glyphicon-envelope"></label>
					</div>
				</div> <!-- /.form-group -->
				<div class="form-group">
					<div class="input-group">
						<input class="form-control" id="password" name="password" required type="password" size="10" minlength="6" maxlength="6" placeholder="Tu contraseña"/>
						<label for="password" class="youpasswd input-group-addon glyphicon glyphicon-lock"></label>
					</div> <!-- /.input-group -->
				</div> <!-- /.form-group -->
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-warning">Iniciar Sesión</button>
			<button class="btn btn-warning" href="#modal-2" data-toggle="modal" data-dismiss="modal">Registrarse</button>
		</div>
		</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
