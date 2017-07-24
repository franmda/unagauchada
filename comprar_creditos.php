
<!-- Dreekar's script -->
<script>
	function multiply(){
	  let num = document.getElementById('cantidad').value;
		let value=document.getElementById('multiplier').value;
	  document.getElementById('Result').innerHTML = num * value;
	}

	function comprobarClave3(){
		clave3 = document.f1.tarjeta.value ;

		if (clave3.length == 16)
			return true;
		else{
			alert("Error, ingrese los 16 digitos de su tarjeta.") ;
			return false;
		}
	}
</script>

<?php
    session_start();
	include 'config.php';
	$credits = mysqli_query($con,"SELECT Precio FROM Precio_credito");
	$credits = mysqli_fetch_array($credits);
	$credits = $credits[0];
   	if (!isset($_SESSION['userMail'])) 
	{
     header("Location: index.php");}
?>

<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; include 'sources.php'; ?>
		<link rel="stylesheet" href="/css/comprar_creditos.css">
		<link rel="stylesheet" href="/css/signin.css">
		<title>Comprar créditos</title>
	</head>
	<body>
		<div class="navbar-wrapper">
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<?php include 'navbar.php'; ?>
			</nav>
		</div>

		<hr>

		<div class="container">
			<div class="row">
				<div class="paymentCont">
						<div class="headingWrap">
								<h3 class="headingTop text-center">Compra de creditos</h3>
								<p class="text-center">Seleccione la opcion de compra</p>
						</div>
						<div class="paymentWrap">
							<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
			            <label class="btn paymentMethod active">
		            		<div class="method visa"></div>
		              	<input type="radio" name="options" checked>
			            </label>
			            <label class="btn paymentMethod">
		            		<div class="method master-card"></div>
		                <input type="radio" name="options">
			            </label>
			            <label class="btn paymentMethod">
		            		<div class="method amex"></div>
		                <input type="radio" name="options">
			            </label>
		              <label class="btn paymentMethod">
						      	<div class="method diners"></div>
		              	<input type="radio" name="options">
			            </label>
			            <label class="btn paymentMethod">
		            		<div class="method cabal"></div>
		                <input type="radio" name="options">
			            </label>
				        </div>
						</div>
					</div>
				</div>
		</div>

		<div class="container marketing">
		<form name="f1" action="/alta_compra.php" onsubmit="return comprobarClave3();" autocomplete="on" method="post" class="form-signin">
		<h2 class="form-signin-heading">Completá tus datos</h2>
		<ul class="nav nav-pills nav-stacked">
				<li class="active"><a><span class="badge pull-right"><span class="glyphicon glyphicon-usd"><?php echo $credits; ?></span></span>Costo unitario</a>
				</li>
		</ul>
	</br>
		<ul class="nav nav-pills nav-stacked">
			  <input type="hidden" id='multiplier' value="<?php echo $credits; ?>" />
				<li class="active"><a><span class="badge pull-right"><span id="Result" class="glyphicon glyphicon-usd"></span></span>Costo total</a>
				</li>
		</ul>
	</br>
			<div class="form-group">
				<label class="control-label" for="cantidad">Cantidad de créditos</label>
				<input id="cantidad" onkeyup="multiply();" name="cantidad" size="10" min="1" max="9999999999" placeholder="Inserte un número" class="form-control input-md" type="number" required="required">
			</div>

				<!-- Text input-->
			<div class="form-group">
				<label class="control-label" for="tarjeta">Número de tarjeta</label>
				<input id="tarjeta" name="tarjeta" placeholder="XXXX-XXXX-XXXX-XXXX" size="16" class="form-control input-md" type="number" required="required">
			</div>

				<!-- Text input-->
			<div class="form-group">
				<label class="control-label" for="code">Código de seguridad</label>
				<input id="code" name="code" size="4" minlength="4" maxlength="4" placeholder="XXXX" class="form-control input-md" type="password" required="required">
			</div>

			<div class="form-group">
				<label class="control-label" for="password">Contraseña</label>
				<input id="password" name="password" size="6" minlength="6" maxlength="6" placeholder="XXXXXX" class="form-control input-md" type="password" required="required">
			</div>

				<!-- Button -->
				<div class="form-group">
					<label class="control-label" for="submit"></label>
					<button id="submit" name="submit" class="btn btn-warning">Realizar compra</button>
				</div>
			</form>
		</div>
		<footer>
			<p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
		</footer>
	</body>
</html>
