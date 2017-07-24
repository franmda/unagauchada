<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript">



 
$(document).ready(function() {
   $("#datepicker").datepicker();
 });
 
  
$(document).ready(function() {
   $("#datepicker2").datepicker();
 });


 
 </script>
		<?php include 'head.php'; include 'sources.php';include 'config.php';
		
	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}
	 $administrador= mysqli_query($con, "SELECT is_admin FROM usuario WHERE userMail='$_SESSION[userMail]'	 ;");
	 $admin = mysqli_fetch_array($administrador);
	 
	 
	  if($admin[0]== 1){ ?>
		
		<title>Crear un favor</title>
		<link rel="stylesheet" type="text/css" href="/css/signin.css">
	</head>
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


	<body>


  
	
<form  name="f1" action='/registro_ganancias.php'  method="post" class="form-signin">
				<h2 class="form-signin-heading"><ins> Seleccione las fechas dentro de las cuales quiere ver las ganancias del sitio </ins></h2>
				<!-- Text input-->
		         
				<div>
				<br>
				<label> Fecha Desde:</label>
                  <input type="text"  name="datepicker" id="datepicker"  size="12" />
				  </div>
				  <br>
				  <div>
			
				<label> Fecha Hasta:</label>
                  <input type="text"  name="datepicker2" id="datepicker2"  size="12" />
				  </div>
				  <br>
				  <br>
				<div class="form-group">
					<label class="control-label" for="submit"></label>
					<button id="submit" name="submit" class="boton"> Mostrar ganancias </button>
				</div>
				
</form>
<br>
	<br>


			
				&nbsp; &nbsp; &nbsp;<a  class="boton2" href= index.php>Volver</a><br>
<br>
	<br>
	<br>
	<br>
	<br>
	  <p>&copy; 2017 Company, Inc.</p>
	</body>
	
	

</html> <?php } else 
	{ header("Location: index.php");} ?>	