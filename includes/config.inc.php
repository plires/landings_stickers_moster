<?php

	require( __DIR__ . './../vendor/autoload.php' );
	$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ . '/../' );
	$dotenv->load();

	define('BASE', (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/sitio/' );

?>