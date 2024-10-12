<?php
session_start();
extract($_REQUEST);
$link = mysqli_connect("localhost", "root", "", "Compras") or die("Problemas de conexión a la base de datos");

if (!isset($cantidad)) {
  $cantidad = 1;
}

$qry = mysqli_query($link, "SELECT * FROM catálogo WHERE id='$id'");

if (!$qry) {
  die("Error en la consulta: " . mysqli_error($link));
}

$row = mysqli_fetch_array($qry);

if (isset($_SESSION['carro'])) {
  $carro = $_SESSION['carro'];
} else {
  $carro = [];
}

$carro[md5($id)] = array(
  'identificador' => md5($id),
  'cantidad' => $cantidad,
  'producto' => $row['producto'],
  'precio' => $row['precio'],
  'id' => $id
);

$_SESSION['carro'] = $carro;

header("Location: catalogo.php?" . SID);
