<?php
	require ('includes/config.inc.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Seguí participando - monsterenergy.com</title>

	<!-- Favicons -->
	<?php include('includes/favicon.php'); ?>

</head>
<body>

	<img src="./img/commons/fondo.jpg" id="bg" alt="fondo monster">

	<main class="content_losers">
		<!-- Header -->
		<?php include('includes/header.php'); ?>

		<section class="container losers">

			<div class="row">
				<div class="col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
					<h1>
						ESTA VEZ NO TUVISTE SUERTE. DE TODAS MANERAS NO TE DESANIMES, AÚN HAY MUCHOS PREMIOS DISPONIBLES
					</h1>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 content">
					<img class="img-fluid cooler"/ alt="cooler monster">
				</div>
				<div class="col-md-4 content">
					<img class="img-fluid tabla"/ alt="tabla monster">
				</div>
				<div class="col-md-4 content">
					<img class="img-fluid toalla"/ alt="toalla monster">
				</div>
			</div>

		</section>

		<!-- Footer -->
		<?php include('includes/footer.php'); ?>
	</main>
	
	<script src="./dist/bundle.js"></script>
	
</body>
</html>