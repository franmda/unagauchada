<html> 
<head>
	<title>progra</title>
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
$result = mysql_query("SELECT * FROM tabla ", $enlace);

echo "<table id='elegante'>
<caption>Clientes</caption>
<tr><th>Nombre</th><th>Apellido</th><th>Edad</th><th>Sexo</th><th>Telefono</th>
</tr>";



while($row = mysql_fetch_array($result)) {
echo "<tr>";
// $row es un array con todos los campos existentes en la tabla
$nom=$row['nombre'];
echo "<td>".$row['nombre']."</td>";
echo "<td> ".$row['apellido']."</td>";
echo "<td> ".$row['edad']."</td>";
echo "<td> ".$row['sexo']."</td>";
echo "<td> ".$row['telefono']."</td>";
echo "<br>";

} // fin d1el bucle de instrucciones;
echo "</tr></table>";
?> 




  
</body> 
</html>