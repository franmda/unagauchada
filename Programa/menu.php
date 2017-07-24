 <?php 
session_start();

if ($_SESSION["autenticado"] <> "si")
 {header("Location: index.php");}



?>
<html> 
<head>
	<title>Menu principal</title>
<link rel="stylesheet" href="estiloPpal.css" type="text/css">
</head>

<body>  
 
<?php
 
$enlace = mysql_connect('localhost','root'); 
if (!$enlace) {
    die('No pudo conectarse: ' . mysql_error());
}
//fin de instrucciones de conexion

mysql_select_db("prueba",$enlace); 


?> 

<br><br><br><br><br><br><br><br>

<table id="table2"><caption > Complejo Fran </caption><th>
<form action="deptos.php" >
    <button id="chota2">Consultar deptos</button></th>
</form><th>
<form action="clientes.php" >
<button id="chota2">Consultar clientes</button>&nbsp
</th></table>
</form></tr>



</body>
<br><br>
<a href= logout.php ><h3>Cerrar sesion</h3></a>

</html>
