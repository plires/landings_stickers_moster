<?php
	require ('includes/config.inc.php');
	require ('includes/get-variable-handling.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gracias - monsterenergy.com</title>

	<!-- Favicons -->
	<?php include('includes/favicon.php'); ?>

</head>
<body>

	<img src="./img/commons/fondo.jpg" id="bg" alt="fondo monster">

	<main class="content_losers">
		<!-- Header -->
		<?php include('includes/header.php'); ?>

		<section class="container losers gracias">

			<div class="row">
				<div class="col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
					<h1>
						¡FELICITACIONES <?= $name ?> ! 
					</h1>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 col-md-10 offset-md-1">
					<p id="msg_contacto">
						Recordá que es requisito obligatorio, conservar y presentar el QR ganador para poder canjear tu producto.
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 col-md-10 offset-md-1 text-center">
					<a type="button" class="transition btn btn-primary" href="https://www.monsterenergy.com/">
						SEGUÍ NAVEGANDO
					</a>
				</div>
			</div>

		</section>

		<!-- Footer -->
		<?php include('includes/footer.php'); ?>
	</main>
	
	<script src="./dist/bundle.js"></script>
	
</body>
</html>