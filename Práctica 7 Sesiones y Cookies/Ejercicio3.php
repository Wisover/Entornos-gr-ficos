<?php
// Verifico si se ha enviado el formulario
if (isset($_POST['username'])) {
  // Almaceno el nombre de usuario en una cookie
  $username = $_POST['username'];
  setcookie("username", $username, time() + (60 * 60 * 24 * 365)); // Cookie válida por un año
} else {
  // Si no se ha enviado el formulario, miro si existe la cookie
  if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
  } else {
    $username = ""; // Si no hay cookie, el nombre será vacío
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Ingreso de Usuario</title>
</head>

<body>
  <h2>Ingrese su nombre de usuario</h2>

  <form action="" method="post">
    <input type="text" name="username" placeholder="Nombre de usuario" required>
    <input type="submit" value="Guardar">
  </form>

  <?php
  // Muestra el último nombre de usuario ingresado si existe
  if (!empty($username)) {
    echo "<p>Último nombre de usuario ingresado: <strong>$username</strong></p>";
  }
  ?>
</body>

</html>