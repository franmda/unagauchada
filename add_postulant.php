<?php
	session_start();

	include 'config.php';
	$query = "SELECT userId FROM Favor WHERE favorId='$_REQUEST[id]'";
	$usuario = mysqli_query($con, $query);
	$usuario = mysqli_fetch_array($usuario);
	$usuario = $usuario[0];
	if (isset($_SESSION['userMail'])){
		if ($usuario!=$_SESSION['userMail']) {
			$querya="SELECT userMail FROM Postulantes WHERE favorId='$_REQUEST[id]'";
			$resultado=mysqli_query($con, $querya);
			$condicion=""; 
			while ($ro = mysqli_fetch_row($resultado)) {
				if ($ro[0]==$_SESSION['userMail']) {
					$condicion="falso";
				}
			}	
			$id6=$_REQUEST['id']; 
					  if($condicion=="falso"){ ?>
                          <script> alert("Ya estas postulado para esta Gauchada."); location="/product.php?id=<?php echo"$id6";?>";</script> <?php
					  } 
				      else
				         { 
                            $que="INSERT INTO Postulantes (favorId, userMail) VALUES ('$_REQUEST[id]','$_SESSION[userMail]')";
				            mysqli_query($con, $que) or die (mysqli_error($con));
							$id6=$_REQUEST['id']; 
				            header("Location: /product.php?id=$_REQUEST[id]");
				          }
			
       } else 
            {
	           $id6=$_REQUEST['id'];?>
		       <script> alert("No es posible postularte a tu propia gauchada."); location="/product.php?id=<?php echo"$id6";?>";</script><?php
		     }
    	 
    }else{
    	$id6=$_REQUEST['id'];
	?>
	    <script> alert("Es necesario iniciar sesion para postularse."); location="/product.php?id=<?php echo"$id6";?>";</script>
	    <?php } ?>