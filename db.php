<?php
$link = mysqli_connect("localhost", "root", "claveRoot", "pruebaclase.db");

$consulta = "SELECT * from alumnos;";

$resultados = mysqli_query($link, $consulta);

mysqli_close($link);


if ($resultados)
  while ($elemento = mysqli_fetch_array($resultados)) {
    print_r($elemento);
    echo "Nombre: " . $elemento["nombre"] . " <br />";
  }
else {
  echo "No elementos";
}
