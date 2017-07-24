<script>
	function comprobarClave(){
		clave1 = document.f1.password.value ;
		clave2 = document.f1.password_confirm.value;

		if ((clave1 == clave2)&&(clave1.length == 6))
			return true;
		else
		{	alert("Las dos claves son distintas o no contienen 6 digitos, intente nuevamente.") ;
			return false;
		}
	}

	function comprobarTel(){
		clave4 = document.f1.number.value ;
		if (clave4.length == 10)
			return true;
		else
			
		{	alert("El telefono ingresado debe contener 10 digitos.") ;
			return false;
		}
	}
	function comprobarFecha(){
		clave5 = new Date("01/01/1920");
	
		d = new Date();
        n = (d.getMonth()+1)+"/"+d.getDate()+"/"+d.getFullYear();
		h = new Date(n);
		clave6 = document.f1.datepicker.value;
		clave7 = new Date(clave6);
		if ((clave7 <= h)&&(clave7 >= clave5))
			return true;
		else
		{	alert("Ingrese una fecha de nacimiento valida") ;
			return false;
		}
	}

</script>

<!-- Sign up modal -->

<div class="modal fade" id="modal-2">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Registrarme</h4>
			</div>
			<div class="modal-body">
				<form name="f1" method="post" onsubmit="return comprobarClave()&& comprobarTel()&&comprobarFecha()" action="/alta_usuario.php">
					<div class="form-group">
						<div class="input-group">
							<input class="form-control" id="email" name="email" required type="email" placeholder="Tu e-mail"/>
							<label for="email" class="input-group-addon glyphicon glyphicon-envelope"></label>
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<div class="input-group">
							<input class="form-control" id="username" name="username" required type="text" placeholder="Tu nombre"/>
							<label for="username" class="input-group-addon glyphicon glyphicon-user"></label>
						</div>
					</div> <!-- /.form-group -->
					<div class="form-group">
						<div class="input-group">
							<input name="password" required type="password" class="form-control" id="password" placeholder="Tu contraseña">
							<label for="password" class="input-group-addon glyphicon glyphicon-lock"></label>
						</div> <!-- /.input-group -->
					</div> <!-- /.form-group -->
					<div class="form-group">
						<div class="input-group">
							<input name="password_confirm" required type="password" class="form-control" id="password_confirm" placeholder="Repetí tu contraseña">
							<label for="password_confirm" class="input-group-addon glyphicon glyphicon-lock"></label>
						</div> <!-- /.input-group -->
					</div> <!-- /.form-group -->
					<div class="form-group">
						<div class="input-group">
							<input name="number" required="required" type="number" class="form-control" id="number" placeholder="Tu número de teléfono" min="0000000000">
							<label for="number" class="input-group-addon glyphicon glyphicon-earphone"></label>
						</div> <!-- /.input-group -->
					</div> <!-- /.form-group -->
					<div class="form-group">
						<div class="input-group">
							<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
							<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
							<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
							<p><input name="birth" required="required" type="text" class="form-control" placeholder="Tu fecha de nacimiento" id="datepicker" ></p>
							<label for="datepicker" class="input-group-addon glyphicon glyphicon-calendar"></label>
						</div> <!-- /.input-group -->
					</div> <!-- /.form-group -->
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-warning">Registrarme</button>
				<button class="btn btn-warning" href="#modal-1" data-toggle="modal" data-dismiss="modal">Volver</a>
			</div>
		</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
