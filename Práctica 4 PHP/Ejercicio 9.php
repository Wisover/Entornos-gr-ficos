<?php
function comprobar_nombre_usuario($nombre_usuario)
{
  //compruebo que el tamaño del string sea válido.
  if (strlen($nombre_usuario) < 3 || strlen($nombre_usuario) > 20) {
    echo $nombre_usuario . " no es válido<br>";
    return false;
  }

  //compruebo que los caracteres sean los permitidos
  $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";
  for ($i = 0; $i < strlen($nombre_usuario); $i++) {
    if (strpos($permitidos, substr($nombre_usuario, $i, 1)) === false) {
      echo $nombre_usuario . " no es válido<br>";
      return false;
    }
  }
  echo $nombre_usuario . " es válido<br>";
  return true;
}


$usuarios_a_probar = [
  "juan",
  "a",
  "usuario_123",
  "usuario-largo-1234567890",
  "user!@#",
  "NombreCon20Caracteres__"
];

for ($i = 0; $i < count($usuarios_a_probar); $i++) {
  comprobar_nombre_usuario($usuarios_a_probar[$i]);
}
