<?php
include 'config.php';
session_start();
$favorId = $_REQUEST['idFavor'];
$userMail = $_SESSION['userMail'];
$descripcion_pregunta = $_POST['addComment'];
$fecha_pregunta = gmDate("Y-m-d");
$query = "INSERT INTO Pregunta (favorId, userMail, descripcion_pregunta, fecha_pregunta) VALUES ('$favorId', '$userMail', '$descripcion_pregunta', '$fecha_pregunta')";
mysqli_query($con, $query) or die(mysqli_error($con));
echo '<script>location="/product.php?id='.$_REQUEST['idFavor'].'";</script>';
?>