<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>

<body>
  <h1>Ingreso de Usuario</h1>
  <form action="Ejercicio5CrearSesion.php" method="post">
    <label for="username">Nombre de usuario:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Clave:</label>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Ingresar">
  </form>
</body>

</html>