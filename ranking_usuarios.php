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
	include 'config.php';
	 session_start();
	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}
	 $administrador= mysqli_query($con, "SELECT is_admin FROM usuario WHERE userMail='$_SESSION[userMail]'	 ;");
	 $admin = mysqli_fetch_array($administrador);
	 
	 
	  if($admin[0]== 1){
	 
	$usuarios=mysqli_query($con,"SELECT userMail,userName,userPoints FROM usuario ORDER BY userPoints DESC ;");

	?>
    <div class="datagrid">
	<body>
	<table>

    <caption><b>Ranking de usuarios<b></caption>
		<br>
		 
        <thead>
           <tr>
             <th>E-mail</th>
             <th>Nombre</th>
			 <th>Puntaje</th>
           </tr>
        </thead>
       
       <tbody >
	<?php while($user=mysqli_fetch_array($usuarios)) 
	{?>
	
           <tr>
             <td ><?php echo"$user[userMail]";?> </td>
             <td ><?php echo"$user[userName]";?> </td> 
			 <td ><?php echo"$user[userPoints]";?> </td> 

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
	  <a  class="boton2" href= index.php>Volver</a><br>
	  <p>&copy; 2017 Company, Inc.</p>
	</footer>
</html>  <?php } else 
	{ header("Location: index.php");} ?>	