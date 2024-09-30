<?php

// Cargar PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);

try {
  // Configuración del servidor SMTP
  $mail->isSMTP();
  $mail->Host       = 'smtp.gmail.com';
  $mail->SMTPAuth   = true;
  $mail->Username   = 'santinoravarotto@gmail.com';
  $mail->Password   = 'sxdz ybxn zish xwsm';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port       = 587;

  // Destinatario
  $mail->setFrom('santinoravarotto@gmail.com', 'GSR');
  $mail->addAddress('santirava98@gmail.com', 'Rava');

  // Contenido del correo
  $mail->isHTML(true);
  $mail->Subject = 'Primer prueba de envio de mail con PHPMailer';
  $mail->Body    = '<h1>¡Hola!</h1><p>Este es un correo de prueba en formato HTML.</p>';
  $mail->AltBody = 'Este es el contenido alternativo para clientes de correo sin soporte HTML.';

  // Enviar correo
  $mail->send();
  echo 'El correo se ha enviado correctamente';
} catch (Exception $e) {
  echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
}
