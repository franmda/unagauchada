<html>
<head>

  <title>Inicio de sesion</title>
<link rel="stylesheet" href="estilo.css" type="text/css">
<script src="javaacceso.js" type="text/javascript"></script>
</head>
<body>
<div class = "content">
<h2 id="t1"> Bienvenido, identifiquese para acceder al sistema  .</h2><p><br><br><br>
<form name = "formulario" action="acceso.php" method="post">
<label id="lab1" for = "nombre">Nombre &nbsp</label>
<input type= "text" name="nombre" size=25><br><br>
<label id="lab2" for = "contrasea">Clave &nbsp &nbsp&nbsp</label>
<input type= "password" name="contrasea"size=25><br><br><br><br><br><br>
<input onclick= "return validar_campos(formulario)" class = "booton" type ="submit" value="Acceder"> &nbsp; <input  class = "booton" type = "reset" value = "Limpiar"> 
</form>
<br><br><br>

</div>
</body>

</html>
