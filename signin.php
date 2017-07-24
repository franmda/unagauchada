<form method="post" action="/login.php" autocomplete="on">
	<h1>Iniciá sesión</h1>
	<p>
		<label for="email" class="uname" >Tu correo electrónico</label>
		<input id="email" name="email" required="required" type="text" placeholder="Ej: mymail@mail.com"/>
	</p>
	<p>
		<label for="password" class="youpasswd" >Tu contraseña</label>
		<input id="password" name="password" required="required" type="password" size="10" minlength="6"/>
	</p>
	<!-- <p class="keeplogin"> 
		<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
		<label for="loginkeeping">Mantené mi sesión</label>
	</p> -->
	<p class="login button"> 
		<input class="btn btn-warning" type="submit" value="Iniciar sesión" /> 
	</p>
	<p class="change_link"> No te registraste? 
		<a href="#toregister" class="to_register">Unite</a>
	</p>	
</form>