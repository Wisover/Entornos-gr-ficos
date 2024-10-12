<?php
session_start();


if (isset($_POST['username']) && isset($_POST['password'])) {
  // Almaceno 
  $_SESSION['usuario'] = $_POST['username'];
  $_SESSION['clave'] = $_POST['password'];

  // Redirijo 
  header('Location: Ejercicio5RecuperarSesion.php');
  exit();
} else {
  echo "Por favor, ingresa tu nombre de usuario y clave.";
}
