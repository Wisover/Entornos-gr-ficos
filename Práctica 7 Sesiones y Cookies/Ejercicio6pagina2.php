<?php
session_start();
?>
<html>

<head>
  <title>Problema</title>
</head>

<body>
  <?php
  include("Ejercicio6conexión.inc");
  // Captura datos desde el Form anterior 
  $mail = $_POST['mail'];
  // Arma la instrucción SQL y luego la ejecuta 
  $vSql = "SELECT * FROM alumnos WHERE mail = '$mail'"; // Cambié 'doc_utn' por 'alumnos'
  $vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));

  if (mysqli_num_rows($vResultado) == 0) {
    echo "Usuario Inexistente...!!! <br>";
    // Limpiar la sesión si el usuario no existe
    unset($_SESSION['nombre']);
  ?>
    <a href="Ejercicio6sesiones.php">Ingresar a Menu Sesions</a>
  <?php
  } else {
    $fila = mysqli_fetch_array($vResultado);
    $_SESSION['nombre'] = $fila['nombre']; // Cambié 'Nombre' por 'nombre'
  ?>
    <a href="Ejercicio6pagina3.php">Ingresar a saludo</a>
  <?php
  }
  ?>

</body>

</html>