
<html> 
<head>
	<title>Deptos</title>
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
$result = mysql_query("SELECT * FROM departamento ", $enlace);

echo "<table id='elegante'>
<caption>Departamentos</caption>
<tr><th>Numero&nbspDepto</th><th>Ambientes</th><th>Tipo</th><th>Capacidad</th><th>Mantenimiento</th>
</tr>";



while($row = mysql_fetch_array($result)) {
echo "<tr>";
// $row es un array con todos los campos existentes en la tabla

echo "<td>".$row['numero']."</td>";
echo "<td> ".$row['ambientes']."</td>";
echo "<td> ".$row['tipo']."</td>";
echo "<td> ".$row['capacidad']."</td>";
echo "<td> ".$row['mantenimiento']."</td>";
echo "<br>";

} // fin d1el bucle de instrucciones;
echo "</tr></table>";
?> 


<a href= menu.php ><h3>Volver</h3></a>
</body></HTML>
