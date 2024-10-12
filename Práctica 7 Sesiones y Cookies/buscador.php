<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Resultados de Búsqueda</title>
</head>

<body>
  <?php
  include("Ejercicio8conexion.inc");

  $pal = $_POST['Palabra'];

  if ($pal) {
    $query = "SELECT * FROM buscador WHERE canciones LIKE '%" . mysqli_real_escape_string($link, $pal) . "%'";
    $resp = mysqli_query($link, $query) or die("Error en la consulta: " . mysqli_error($link));

    if (mysqli_num_rows($resp) == 0) {
      echo "No hay resultados respecto a la palabra que busca.";
    } else {
      echo "<center><strong>RESULTADOS DE BUSQUEDA</strong></center><br>";
      echo "<ul>";
      while ($cat = mysqli_fetch_array($resp)) {
        echo "<li>" . htmlspecialchars($cat['canciones']) . "</li>";
      }
      echo "</ul>";
    }
  } else {
    echo "<form name='FormBuscador' method='post' action=''><input name='Palabra' type='text' id='Palabra'><input type='submit' name='Submit' value='Buscar!'></form>";
  }
  ?>
  <br>
  <a href="FormBuscador.html">Volver al buscador</a>
</body>

</html>