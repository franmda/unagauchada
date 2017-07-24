<?php
include 'config.php';
$id_pregunta = $_REQUEST['id_pregunta'];
$current_date = gmDate("Y-m-d");
$descripcion_respuesta = $_POST['respuesta'];
$query = "INSERT INTO Respuesta (id_pregunta, descripcion_respuesta, fecha_respuesta) VALUES ('$id_pregunta', '$descripcion_respuesta', '$current_date')";
mysqli_query($con, $query) or die(mysqli_error($con));
echo '<script>location="/product.php?id='.$_REQUEST['id'].'";</script>';
?>