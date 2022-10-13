<?php
//incluimos la clase PHPMailer
require_once( __DIR__ . '/../vendor/autoload.php' );

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

  class App 
  {

    public function emailCheck($email)
    { 
      $mail_correcto = 0; 
      //compruebo unas cosas primeras 
      if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){ 
           if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) { 
             //miro si tiene caracter . 
             if (substr_count($email,".")>= 1){ 
                 //obtengo la terminacion del dominio 
                 $term_dom = substr(strrchr ($email, '.'),1); 
                 //compruebo que la terminaci&oacute;n del dominio sea correcta 
                 if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){ 
                   //compruebo que lo de antes del dominio sea correcto 
                   $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1); 
                   $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1); 
                   if ($caracter_ult != "@" && $caracter_ult != "."){ 
                       $mail_correcto = 1; 
                   } 
                 } 
             } 
           } 
      } 
      if ($mail_correcto) 
        return 1; 
      else 
        return 0; 
    }

    function emptyInput($dato)
    {
      if ($dato==''){
        return true;
      }else{
        return false;
      }
    }

    public function verifyRecaptcha($post)
    {

      $token = $post['token'];
      $action = $post['action'];

      $cu = curl_init();
      curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
      curl_setopt($cu, CURLOPT_POST, 1);
      curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => $_ENV['RECAPTCHA_KEY_SECRET'], 'response' => $token)));
      curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($cu);
      curl_close($cu);

      return $data = json_decode($response, true);

    } 

    public function sendEmail($destinatario, $template, $post)
    {

      $mail = new PHPMailer();

      switch ($destinatario) {
        
        case 'Cliente':

          //ENVIOS
          $mail->setFrom($post['email'], $post['name']);
          $mail->addAddress($_ENV['EMAIL_CLIENT'], $_ENV['NAME_CLIENT']);     //Add a recipient
          $mail->addReplyTo($post['email'], $post['name']);
          break;
        
        case 'Usuario':

          //ENVIOS
          $mail->setFrom($_ENV['EMAIL_CLIENT'], $_ENV['NAME_CLIENT']);
          $mail->addAddress($post['email'], $post['name']);     //Add a recipient
          $mail->addReplyTo($_ENV['EMAIL_CLIENT'], $_ENV['NAME_CLIENT']);
          break;

      }

      switch ($template) {

        case 'Contacto Cliente':
          $template_email = $this->selectEmailTemplate($post, 'to_client');
          $subject = 'Nueva consulta desde el ' . $post['origin'];
          break;
        
        case 'Contacto Usuario':
          $template_email = $this->selectEmailTemplate($post, 'to_user');
          $subject = 'Gracias por participar.';
          break;
        
      }

      if ($_ENV['ENVIRONMENT'] === 'local') {
        $mail->isSendmail();
      } else {
        $mail->isSMTP();
      }

      //SERVER SETTINGS
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
      $mail->Host       = $_ENV['SMTP'];
      $mail->SMTPAuth   = true;
      $mail->Username   = $_ENV['EMAIL_CLIENT'];
      $mail->Password   = $_ENV['PASSWORD'];
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      $mail->CharSet    = $_ENV['EMAIL_CHARSET'];
      $mail->Port       = $_ENV['EMAIL_PORT'];

      //CONTENIDO
      $mail->isHTML(true);                                  
      $mail->Subject = $subject;
      $mail->Body    = $template_email;

      //send the message, check for errors
      $send = $mail->send();

      return $send;

    }

    function selectEmailTemplate($post, $to) 
    {

      switch ($post['product']) {
        case 'Cooler Monster':
          $image = BASE . 'img/emails/cooler.png';
          break;

        case 'Tabla de Surf Monster':
          $image = BASE . 'img/emails/tabla.png';
          break;

        case 'Toalla Monster':
          $image = BASE . 'img/emails/toalla.png';
          break;
        
        default:
          $image = BASE . 'img/emails/toalla.png';
          break;
      }

      //configuro las variables a remplazar en el template
      $vars = array(
        '{name_client}',
        '{email_client}',
        '{origin}',
        '{name_user}',
        '{email_user}',
        '{phone_user}',
        '{ci_user}',
        '{product}',
        '{image_product}',
        '{facebook}',
        '{instagram}',
        '{youtube}',
        '{date}',
        '{base}'
      );

      $values = array( 
        $_ENV['NAME_CLIENT'],
        $_ENV['EMAIL_CLIENT'],
        $post['origin'],
        $post['name'],
        $post['email'],
        $post['phone'],
        $post['ci'],
        $post['product'],
        $image,
        $_ENV['FACEBOOK'],
        $_ENV['INSTAGRAM'],
        $_ENV['YOUTUBE'],
        date('d-m-Y'),
        BASE 
      );

      switch ($to) {

        case 'to_client':
          $template = file_get_contents( __DIR__ . '/../includes/emails/contacts/contacts-to-client.php');
          break;

        case 'to_user':
          $template = file_get_contents( __DIR__ . '/../includes/emails/contacts/contacts-to-user.php');
          break;
        
        default:
          $template = file_get_contents( __DIR__ . '/../includes/emails/contacts/contacts-to-client.php');
          break;

      }

      //Remplazamos las variables por las marcas en los templates
      $template_final = str_replace($vars, $values, $template);

      return $template_final;

    }
   
  }

?>