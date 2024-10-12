<?php
session_start();
?>
<html>

<head>
  <title>Problema</title>
</head>

<body>
  <?php
  if (isset($_SESSION['nombre'])) {
    echo "Bienvenido " . $_SESSION['nombre'];
  } else {
    echo "No tiene permitido visitar esta página.";
    session_destroy();
  }
  ?>
  <br>
  <a href="Ejercicio6sesiones.php">Ir a Menú de Sesiones</a>
</body>

</html>