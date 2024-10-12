<?php
// No debe haber ningún espacio antes de esta línea
if (isset($_POST["estilo"])) {
  $estilo = $_POST["estilo"];
  setcookie("estilo", $estilo, time() + (60 * 60 * 24 * 90));
} else {
  if (isset($_COOKIE["estilo"])) {
    $estilo = $_COOKIE["estilo"];
  } else {
    $estilo = "verde"; // Estilo por defecto
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Cookies en PHP</title>
  <?php
  echo '<link rel="stylesheet" type="text/css" href="' . $estilo . '.css">';
  ?>
</head>

<body>
  <p>Ejemplo de uso de cookies en PHP para almacenar la hoja de estilos css que queremos utilizar para definir el aspecto de la página.</p>

  <form action="Ejercicio1.php" method="post">
    <p>Aquí puedes seleccionar el estilo que prefieres en la página:</p>
    <select name="estilo">
      <option value="verde" <?php if ($estilo == "verde") echo 'selected'; ?>>Verde</option>
      <option value="rosa" <?php if ($estilo == "rosa") echo 'selected'; ?>>Rosa</option>
      <option value="negro" <?php if ($estilo == "negro") echo 'selected'; ?>>Negro</option>
    </select>
    <input type="submit" value="Actualizar el estilo">
  </form>
</body>

</html>