<?php
	include_once __DIR__ . '/../includes/config.inc.php';
	include_once __DIR__ . '/../clases/app.php';
	require_once __DIR__ . '/../clases/repositorioSQL.php';

  $db = new RepositorioSQL();

	$app = new App;
	$data = $app->verifyRecaptcha($_POST);

	if($data['success'] == 1 && $data['score'] >= 0.5){

		// Verificamos si hay errores en el formulario
	  if ($app->emptyInput($_POST['name'])){
	    $errors['error_name']='Ingresa tu nombre';
	  } else {
	    $name = $_POST['name'];
	  }

	  if (!$app->emailCheck($_POST['email'])){
	    $errors['error_email']='Ingresa el mail :(';
	  } else {
	    $email = $_POST['email'];
	  }

	  if ($app->emptyInput($_POST['phone'])){
	    $errors['error_phone']='Ingresa tu teléfono';
	  } else {
	    $phone = $_POST['phone'];
	  }

	  if ($app->emptyInput($_POST['ci'])){
	    $errors['error_ci']='Ingresa tu C.I.';
	  } else {
	    $ci = $_POST['ci'];
	  }

	  if (!isset($errors)) {
	  	
	  	//grabamos en la base de datos
		  $save = $db->getRepoContacts()->saveContactFormContactInBDD($_POST);

		  //Enviamos los mails al cliente y usuario
		  $app = new App;

		  $sendClient = $app->sendEmail('Cliente', 'Contacto Cliente', $_POST);
		  $sendUser = $app->sendEmail('Usuario', 'Contacto Usuario', $_POST);

		  if ($sendClient) {


		  	$msg_contacto = 'Recordá conservar el QR ganador para canjear tu producto.';
		    header("Location: " . BASE . $_POST['url'] . "?msg_contacto=". urlencode($msg_contacto) . "#msg_contacto" );
	  		exit;

		  } else {

		  	$errors['mail'] = 'Error al enviar la consulta, por favor intente nuevamente';
		  	header("Location: " . BASE . $_POST['url'] . "?errors=" . urlencode(serialize($errors)) . "#error");
		  	exit;

		  }

	  } else {

	  	$phone = $_POST['phone'];
	  	$ci = $_POST['ci'];
	  	header("Location: " . BASE . $_POST['url'] . "?name=$name&email=$email&phone=$phone&ci=$ci&errors=" . urlencode(serialize($errors)) . "#error");
	  	exit;

	  }
	  
  } else {
  	
  	// Robot
  	$errors['robot'] = 'Error. Por favor intente nuevamente';
  	header("Location: " . BASE . $_POST['url'] . "?errors=" . urlencode(serialize($errors)) . "#error");
  	exit;
	}





