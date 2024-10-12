<?php
//  cookie 'visitas' no existe
if (!isset($_COOKIE['visitas'])) {
  // inicializo el contador
  $visitas = 1;

  setcookie("visitas", $visitas, time() + 3600 * 24 * 365);
  //  bienvenida 
  $mensaje = "Bienvenido, esta es la primera vez que visitás esta página.";
} else {
  //  incremento el contador
  $visitas = $_COOKIE['visitas'] + 1;
  // Actualizo la cookie
  setcookie("visitas", $visitas, time() + 3600 * 24 * 365);
  // visitas posteriores
  $mensaje = "Esta es tu visita número " . $visitas;
}
?>

<html>

<body>
  <?php
  echo $mensaje;
  ?>
</body>

</html>