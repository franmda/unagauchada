<html>
<head><h3> CATEGORIA</h3> </head>
<link rel="stylesheet" href="estilo.css" type="text/css">
<body>
	<div class = "content">
<?php


$enlace =  mysql_connect('localhost', 'grupo17', 'grupo1716');
if (!$enlace) {
    die('No pudo conectarse: ' . mysql_error());
}

// fin de instrucciones de conexion
 mysql_select_db("grupo17",$enlace);
$result = mysql_query("SELECT * FROM programa where categoriaprograma_id=".$_POST['categoria'], $enlace);
// comienza un bucle que leerá todos los registros existentes
echo "<table id='elegante'><tr id='columna1'><td><h3>Nombre</h3>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><h3>id</h3>&nbsp;&nbsp;</td><td><h3>Fecha emision</h3>&nbsp;&nbsp;</td><td><h3>Hora inicio</h3>&nbsp;&nbsp;</td><td><h3>Descripcion</h3></td><td><h3>Duracion</h3>&nbsp;&nbsp;</td><td><h3>Categoria</h3>&nbsp;&nbsp;&nbsp;&nbsp;</td>
</td><td><h3>Canal</h3>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
while($ro = mysql_fetch_array($result)) {
echo "<tr>";
// $ro es un array con todos los campos existentes en la tabla

echo "<td> ".$ro['nombre']."</td>";
echo "<td> ".$ro['id']."</td>";
echo "<td> ".$ro['fecha']."</td>";
echo "<td> ".$ro['horainicio']."</td>";
echo "<td> ".$ro['descripcion']."</td>";
echo "<td> ".$ro['duracion']."</td>";
$var = $ro['categoriaprograma_id'] ;
$var2= $ro['canal_id'];

mysql_select_db("grupo17",$enlace);

$result2 = mysql_query("SELECT * FROM categoriaprograma where id= ".$var , $enlace);
while($roo = mysql_fetch_array($result2))

echo "<td> ".$roo['nombre']."</td>";

// fin del bucle de instrucciones

 mysql_select_db("grupo17",$enlace);

$result3 = mysql_query("SELECT * FROM canal where id= ".$var2 , $enlace);
while($arr = mysql_fetch_array($result3))

echo "<td> ".$arr['nombre']."</td>";
}
// fin del bucle de instrucciones

 "</tr></table>";
 
?>
<a href= index.php><h3>Volver</h3></a>
</div>
</body>
</html>
