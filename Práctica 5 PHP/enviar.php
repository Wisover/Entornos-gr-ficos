<?php
// Asegúrate de que la ruta sea correcta según tu estructura de carpetas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);
try {
  // Configuración del servidor
  $mail->isSMTP();
  $mail->Host       = 'smtp.gmail.com';
  $mail->SMTPAuth   = true;
  $mail->Username   = 'santinoravarotto@gmail.com'; // Cambia por tu correo
  $mail->Password   = 'sxdz ybxn zish xwsm'; // Cambia por tu contraseña o contraseña de aplicación
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port       = 587;

  // Remitente y destinatario
  $mail->setFrom('santinoravarotto@gmail.com', 'GSR');
  $mail->addAddress('santinoravarotto@gmail.com'); // Destinatario
  $mail->addReplyTo($_POST['email'], $_POST['nombre']); // Responder a

  // Contenido del correo
  $mail->isHTML(true);
  $mail->Subject = 'Comentario';
  $mail->Body    = "Nombre: {$_POST['nombre']}<br>Email: {$_POST['email']}<br>Consulta: {$_POST['texto']}<br>Enviado: " . date("d-m-Y H:i:s");

  $mail->send();
  echo 'Su consulta ha sido enviada, en breve recibirá nuestra respuesta.';
} catch (Exception $e) {
  echo "Error al enviar el correo. Inténtelo de nuevo más tarde. Mailer Error: {$mail->ErrorInfo}";
}
