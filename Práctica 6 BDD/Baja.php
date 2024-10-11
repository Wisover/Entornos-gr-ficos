<html>

<head>
  <title>Baja Ciudad</title>
</head>

<body>
  <?php
  include("conexion.inc");

  // Captura el ID desde el formulario 
  $vId = $_POST['id'];

  // Arma la instrucción SQL para verificar si la ciudad existe
  $vSql = "SELECT * FROM ciudades WHERE id='$vId'";
  $vResultado = mysqli_query($link, $vSql);

  if (mysqli_num_rows($vResultado) == 0) {
    echo ("Ciudad Inexistente...!!! <br>");
    echo ("<A href='FormBajaIni.html'>Continuar</A>");
  } else {
    // Arma la instrucción SQL para eliminar la ciudad
    $vSql = "DELETE FROM ciudades WHERE id='$vId'";
    mysqli_query($link, $vSql);
    echo ("La Ciudad fue Borrada<br>");
    echo ("<A href='Menu.html'>Volver al Menu del ABM</A>");
  }

  // Liberar conjunto de resultados 
  mysqli_free_result($vResultado);

  // Cerrar la conexión 
  mysqli_close($link);
  ?>
</body>

</html>