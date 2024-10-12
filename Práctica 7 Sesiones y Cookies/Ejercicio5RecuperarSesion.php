<?php
session_start();


if (isset($_SESSION['usuario']) && isset($_SESSION['clave'])) {
  echo "<h1>Datos del Usuario</h1>";
  echo "<p>Nombre de usuario: " . htmlspecialchars($_SESSION['usuario']) . "</p>";
  echo "<p>Clave: " . htmlspecialchars($_SESSION['clave']) . "</p>";
} else {
  echo "No hay datos de sesión disponibles.";
}
?>

<p><a href="Ejercicio5Login.php">Volver al login</a></p>