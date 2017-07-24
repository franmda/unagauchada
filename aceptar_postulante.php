<?php 
session_start();
$var=$_REQUEST['id2'];
include 'config.php';
$condicion="";
$resul = mysqli_query($con," SELECT userId FROM favor WHERE favorId='$_REQUEST[id2]'");
if (isset($_SESSION['userMail'])){
	$id6=$_SESSION['userMail'];
	while ($row= mysqli_fetch_row($resul)) {
		
		if ($row[0] == $id6) {
			$condicion="falso";
		}
	}
}
if ($condicion == "falso") {
	mysqli_query($con," UPDATE  favor SET usuario_aceptado='$_REQUEST[id]' WHERE favorId='$_REQUEST[id2]'");
	?><script> alert("El postulante ha sido aceptado "); location="/product.php?id=<?php echo"$var";?>";</script>
	<?php
}else{
	?><script> alert(" No posee permiso para aceptar un postulante en esta gauchada"); location="/product.php?id=<?php echo"$var";?>";</script>
<?php
}
?>