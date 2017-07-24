<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/estilotabla.css">
	<style type="text/css">
  	.boton{
    text-decoration: none;
    padding: 5px;
    font-weight: 600;
    font-size: 17px;
    color: #ffffff;
    background-color: #F6B605;
    border-radius: 6px;
    border: none;
  }

    .boton2{
    text-decoration: none;
    padding: 5px;
    font-weight: 600;
    font-size: 17px;
    color: #ffffff;
    background-color: #6B64D5;
    border-radius: 6px;
    border: none;
	
	}
  </style>
</head>
	<?php
	session_start();
	
	include 'config.php';
	
   	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}
	
	$usuarios=mysqli_query($con,"SELECT id_favor,favor_name,mailUsuario,mailAceptado,calificacionObtenida,comentarios FROM calificacion_favores WHERE mailAceptado='$_SESSION[userMail]' ;");
    $usuarios2=mysqli_query($con,"SELECT id_favor,favor_name,mailUsuario,mailAceptado,calificacionObtenida,comentarios FROM calificacion_favores WHERE mailAceptado='$_SESSION[userMail]' ;");
	$user2=mysqli_fetch_array($usuarios2);
	if($user2[0] != ""){
	?>
    <div class="datagrid">
	<body>
	<table>

    <caption><b>Historial de calificaciones<b></caption>
		<br>
		 
        <thead>
           <tr>
             <th>Id de la Gauchada</th>
			 <th>nombre de la Gauchada</th>
             <th>Crador de la gauchada</th>
			 <th>puntos obtenidos</th>
           </tr>
        </thead>
       
       <tbody >
	<?php while($user=mysqli_fetch_array($usuarios)) 
	{?>
	
           <tr>
             <td ><?php echo"$user[id_favor]";?> </td>
             <td ><?php echo"$user[favor_name]";?> </td> 
			 <td ><?php echo"$user[mailUsuario]";?> </td> 
			 <td ><?php echo"$user[calificacionObtenida]";?> </td> 

           </tr>
      
      	  <?php	}?> 
	 </tbody>
   
</table> </div>

	</body>
	<br>
	<br>
	<br>
	<br>
	<br>
	
	<footer>
	  <a  class="boton2" href= profile.php>Volver</a><br>
	  <p>&copy; 2017 Company, Inc.</p>
	</footer> <?php 

	          } else { 
		
			?><script> 

			alert("Aun no posees calificaciones "); location="/profile.php";
			
			</script>
			
			<?php } ?>
			
</html>