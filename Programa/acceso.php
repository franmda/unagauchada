<html>
	<link rel="stylesheet" href="estilo.css" type="text/css">
<body>
<?PHP


$enlace =  mysql_connect('localhost','root');
if (!$enlace) {
    die('No pudo conectarse: ' . mysql_error());
}
//fin de instrucciones de conexion 

 mysql_select_db("prueba",$enlace);
$result = mysql_query("SELECT * FROM usuario " , $enlace);


while($row = mysql_fetch_array($result)) {

$var1 = $row['usuario'];
$var2 = $row['contrasea'];
	

  if (($_POST['nombre']== $var1) && ($_POST['contrasea']== $var2)) {
     echo"Acceso autorizado";
     session_start(uno);
     $_SESSION["autenticado"]="si";
     header("location:menu.php");
  	 }
	 
	 
}
if (($_POST['nombre']!= $var1 || $_POST['contrasea']!= $var2)) {
	echo"Acceso denegado"; }
?>
<a href= index.php><h3>Volver a pagina principal</h3></a> <a href= index7.php><h3>Reintentar</h3></a>
</body>
</html>
