<html>

<head>
  <title>Modificación de Ciudad</title>
</head>

<body>
  <?php
  include("conexion.inc");

  // Captura datos desde el Form anterior
  $vCiudad = $_POST['ciudad'];
  $vPais = $_POST['pais'];
  $vHabitantes = $_POST['habitantes'];
  $vSuperficie = $_POST['superficie'];
  $vTieneMetro = $_POST['tieneMetro'];
  $vId = $_POST['id']; // Asegúrate de capturar el ID también

  // Arma la instrucción SQL y luego la ejecuta
  $vSql = "UPDATE ciudades SET ciudad='$vCiudad', país='$vPais', habitantes='$vHabitantes', superficie='$vSuperficie', tieneMetro='$vTieneMetro' WHERE id='$vId'";
  mysqli_query($link, $vSql) or die(mysqli_error($link));

  echo ("La Ciudad fue Modificada<br>");
  echo ("<A href='Menu.html'>Volver al Menu del ABM</A>");

  // Cerrar la conexión 
  mysqli_close($link);
  ?>
</body>

</html>