<?php
	require ('includes/config.inc.php');
	require ('includes/get-variable-handling.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tabla de Surf - monsterenergy.com</title>

	<!-- Favicons -->
	<?php include('includes/favicon.php'); ?>

</head>
<body>

	<img src="./img/commons/fondo.jpg" id="bg" alt="fondo monster">

	<main class="content_tabla">
		<!-- Header -->
		<?php include('includes/header.php'); ?>

		<section class="container tabla_surf">

			<div class="row">

				<div class="col-md-6 content_img">
					<img class="img-fluid tabla" alt="tabla monster">
				</div>

				<div class="col-md-6 content_form">

					<div class="frase">
						<h1>¡FELICITACIONES! GANASTE UNA<br><span class="premio">TABLA DE SURF</span></h1>
						<img src="./img/commons/subrayado-mobile.png" alt="subrayado">
						<h2>CANJEÁ TU PREMIO</h2>
					</div>


					<form id="form-contacto" action="./php/validate-form.php" method="post" class="needs-validation" novalidate>

						<input name="origin" type="hidden" value="Formulario de Contacto - Tabla de Surf">

						<!-- Nombre -->
						<div class="inputBox">
					  	<input 
					  		required="required" 
					  		type="text" 
					  		name="name" 
					  		value="<?= $name ?>">
					  		<span>Nombre *</span>
					  		<i></i>
					  		<div class="invalid-feedback">
					        Ingresá tu nombre
					      </div>
						</div>
						<!-- Nombre end -->

						<!-- C.I. -->
						<div class="inputBox">
					  	<input 
					  		required="required" 
					  		type="number" 
					  		name="ci" 
					  		value="<?= $ci ?>">
					  		<span>C.I. *</span>
					  		<i></i>
					  		<div class="invalid-feedback">
					        Ingresá tu C.I.
					      </div>
						</div>
						<!-- C.I. end -->

						<!-- Email -->
						<div class="inputBox">
					  	<input 
					  		required="required" 
					  		type="email" 
					  		name="email" 
					  		value="<?= $email ?>">
					  		<span>Email *</span>
					  		<i></i>
					  		<div class="invalid-feedback">
					        Ingresá tu Email
					      </div>
						</div>
						<!-- Email end -->

						<!-- Teléfono -->
						<div class="inputBox">
					  	<input 
					  		required="required" 
					  		type="text" 
					  		name="text" 
					  		value="<?= $phone ?>">
					  		<span>Teléfono *</span>
					  		<i></i>
					  		<div class="invalid-feedback">
					        Ingresá un teléfono
					      </div>
						</div>
						<!-- Teléfono end -->

						<div class="content_button">
							<button type="button" id="send" class="btn btn-primary">
								Enviar
								<div id="spinner" class="spinner-border spinner-border-sm" role="status">
								  <span class="visually-hidden"></span>
								</div>
							</button>
						</div>

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