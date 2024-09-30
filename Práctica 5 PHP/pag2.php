<?php
session_start(); // Iniciar la sesión

// Inicializar el contador si no existe
if (!isset($_SESSION['contador'])) {
  $_SESSION['contador'] = 0;
}

// Incrementar el contador
$_SESSION['contador']++;

// Mostrar el número de visitas
echo "<h1>Páginas visitadas durante tu sesión: " . $_SESSION['contador'] . "</h1>";
?>
<p><a href='pag1.php'>Volver a la página principal</a></p>