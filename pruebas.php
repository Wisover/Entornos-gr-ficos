<?php
// Dirección de destino
$to = 'destinatario@example.com';

// Asunto del correo
$subject = 'Correo con formato HTML desde PHP';

// Mensaje en formato HTML
$message = '
<html>
<head>
  <title>Correo en HTML</title>
</head>
<body>
  <h1>¡Hola!</h1>
  <p>Este es un correo enviado desde un script PHP con <strong>formato HTML</strong>.</p>
  <p>Gracias por leer este mensaje.</p>
</body>
</html>
';

// Encabezados para que el correo sea reconocido como HTML
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Cabecera adicional (opcional): Remitente
$headers .= 'From: remitente@example.com' . "\r\n";

// Enviar correo
if (mail($to, $subject, $message, $headers)) {
  echo 'Correo enviado correctamente';
} else {
  echo 'Error al enviar el correo';
}
