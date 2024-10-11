<html>

<head>
  <title>Alta Ciudad</title>
</head>

<body>
  <?php
  include("conexion.inc");

  // Captura datos desde el formulario anterior 
  $vCiudad = $_POST['ciudad'];
  $vPais = $_POST['pais'];
  $vHabitantes = $_POST['habitantes'];
  $vSuperficie = $_POST['superficie'];
  $vTieneMetro = $_POST['tieneMetro'];

  // Arma la instrucción SQL para verificar si la ciudad ya existe
  $vSql = "SELECT COUNT(*) as canti FROM ciudades WHERE ciudad='$vCiudad' AND país='$vPais'";
  $vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
  $vCantCiudades = mysqli_fetch_assoc($vResultado);

  if ($vCantCiudades['canti'] != 0) {
    echo ("La Ciudad ya Existe<br>");
    echo ("<A href='Menu.html'>VOLVER AL ABM</A>");
  } else {
    // Arma la instrucción SQL para insertar la nueva ciudad
    $vSql = "INSERT INTO ciudades (ciudad, país, habitantes, superficie, tieneMetro) 
             VALUES ('$vCiudad', '$vPais', $vHabitantes, $vSuperficie, $vTieneMetro)";
    mysqli_query($link, $vSql) or die(mysqli_error($link));

    echo ("La Ciudad fue Registrada exitosamente.<br>");
    echo ("<A href='Menu.html'>VOLVER AL MENU</A>");
  }

  // Liberar conjunto de resultados 
  mysqli_free_result($vResultado);

  // Cerrar la conexión 
  mysqli_close($link);
  ?>
</body>

</html>