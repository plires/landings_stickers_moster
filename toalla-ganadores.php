<?php
	require ('includes/config.inc.php');
	require ('includes/get-variable-handling.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Toalla - monsterenergy.com</title>

	<!-- Favicons -->
	<?php include('includes/favicon.php'); ?>

</head>
<body>

	<img src="./img/commons/fondo.jpg" id="bg" alt="fondo monster">

	<!-- Modal -->
	<?php include('includes/modal.php'); ?>

	<main class="content_product">
		<!-- Header -->
		<?php include('includes/header.php'); ?>

		<section class="container product coolers toalla">

			<div class="row">

				<div class="col-md-6 content_img">

					<img class="img-fluid img_product" alt="cooler monster">

					<div class="data">

						<a type="button" class="transition" href="#" data-bs-toggle="modal" data-bs-target="#ticketModal">
							<img src="./img/tabla/conserva.png" class="img-fluid frase_ganadora" alt="conserva el ticket">
						</a>
						
						<img src="./img/commons/flecha.png" class="img-fluid flecha_ganadora" alt="flecha ganadora">
					</div>

				</div>

				<div class="col-md-6 content_form">

					<div class="frase">
						<h1><span class="felicitaciones">¡FELICITACIONES!</span> <br class="first">GANASTE UNA<br><span class="premio">TOALLA</span></h1>
						<img class="img-fluid subrayado" src="./img/commons/subrayado-mobile.png" alt="subrayado">
						<h2>CANJEÁ TU PREMIO</h2>
						<div class="flecha_abajo">
							<img class="img-fluid" src="./img/commons/flecha-abajo.png" alt="flecha abajo">
						</div>
					</div>

					<!-- Errors Form -->
					<?php include('./includes/errors.php'); ?>

					<form id="form-contacto" action="./php/validate-form.php" method="post" class="needs-validation" novalidate>

						<input name="origin" type="hidden" value="Formulario de Contacto - Toalla">
						<input name="url" type="hidden" value="toalla-ganadores.php">

						<!-- Inputs Form -->
						<?php include('includes/parts/inputs-form.php'); ?>

					</form>
				</div>

			</div>

		</section>

		<!-- Footer -->
		<?php include('includes/footer.php'); ?>
	</main>
	
	<script src="https://www.google.com/recaptcha/api.js?render=<?= $_ENV['RECAPTCHA_KEY_SITE'] ?>"></script>
	<script src="./dist/bundle.js"></script>
	
</body>
</html>