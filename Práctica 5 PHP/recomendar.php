<?php
//PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$tu_nombre = $_POST['tu_nombre'];
$amigo_email = $_POST['amigo_email'];
$asunto = "Tu amigo $tu_nombre te recomienda visitar este sitio";
$mensaje = "$tu_nombre te recomienda visitar este sitio web. Haz clic en el enlace para conocer más: http://localhost/recomendacion/sitio.html";

$mail = new PHPMailer(true);

try {
  // Configuraciones del servidor SMTP
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';  // Servidor SMTP
  $mail->SMTPAuth = true;
  $mail->Username = 'santinoravarotto@gmail.com';  // Usuario SMTP
  $mail->Password = 'sxdz ybxn zish xwsm';  // Contraseña SMTP
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;

  $mail->setFrom('santinoravarotto@gmail.com', 'GSR');
  $mail->addAddress($amigo_email);

  $mail->isHTML(true);
  $mail->Subject = $asunto;
  $mail->Body    = $mensaje;

  $mail->send();
  echo 'El mensaje ha sido enviado correctamente.';
} catch (Exception $e) {
  echo "El mensaje no pudo ser enviado. Error: {$mail->ErrorInfo}";
}
