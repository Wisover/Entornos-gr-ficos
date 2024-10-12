<?php
// Verifico si la cookie 'visitas' no existe
if (!isset($_COOKIE['visitas'])) {
  // Si es la primera visita, inicializo el contador
  $visitas = 1;
  // Establezco la cookie 'visitas' por un año
  setcookie("visitas", $visitas, time() + 3600 * 24 * 365);
  // Mensaje de bienvenida para la primera visita
  $mensaje = "Bienvenido, esta es la primera vez que visitás esta página.";
} else {
  // Si la cookie existe, incremento el contador
  $visitas = $_COOKIE['visitas'] + 1;
  // Actualizo la cookie con el nuevo valor
  setcookie("visitas", $visitas, time() + 3600 * 24 * 365);
  // Mensaje para las visitas posteriores
  $mensaje = "Esta es tu visita número " . $visitas;
}
?>

<html>

<body>
  <?php
  // Muestro el mensaje correspondiente
  echo $mensaje;
  ?>
</body>

</html>