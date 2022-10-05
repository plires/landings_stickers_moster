<?php
	require ('includes/config.inc.php');
	require ('includes/get-variable-handling.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<!-- Favicons -->
	<?php include('includes/favicon.php'); ?>

	<!-- <link rel="stylesheet" type="text/css" href="./node_modules/normalize.css/normalize.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="./fontawesome/css/all.min.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="./node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="./node_modules/aos/dist/aos.css"/> -->
	<!-- <link rel="stylesheet" type="text/css" href="./css/app.css"> -->
</head>
<body>

	<!-- Header -->
	<?php include('includes/header.php'); ?>

	<section class="container">
		<div class="row">
			<div class="col-md-4">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid rerum in explicabo possimus qui autem quibusdam, atque quia voluptatibus ab exercitationem quas velit, voluptate voluptatem voluptas asperiores sequi, alias eligendi?
			</div>
			<div data-aos="fade-up" class="col-md-4">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid rerum in explicabo possimus qui autem quibusdam, atque quia voluptatibus ab exercitationem quas velit, voluptate voluptatem voluptas asperiores sequi, alias eligendi?
			</div>
			<div class="col-md-4">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid rerum in explicabo possimus qui autem quibusdam, atque quia voluptatibus ab exercitationem quas velit, voluptate voluptatem voluptas asperiores sequi, alias eligendi?
			</div>

			<div class="col-md-12">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid rerum in explicabo possimus qui autem quibusdam, atque quia voluptatibus ab exercitationem quas velit, voluptate voluptatem voluptas asperiores sequi, alias eligendi?
			</div>
		</div>
	</section>

	<script src="https://www.google.com/recaptcha/api.js?render=<?= $_ENV['RECAPTCHA_KEY_SITE'] ?>"></script>
	<script src="./dist/bundle.js"></script>
	
</body>
</html>