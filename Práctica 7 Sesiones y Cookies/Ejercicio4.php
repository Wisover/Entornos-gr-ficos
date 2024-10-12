<?php
// Inicializo la variable
$tipoTitular = null;

// Verifico si se envía el formulario
if (isset($_POST['titulo'])) {
  // Almaceno el nuevo tipo de titular en una cookie con una duración de 90 días
  $titulo = $_POST['titulo'];
  setcookie("tipo_titular", $titulo, time() + (60 * 60 * 24 * 90));
  // Almaceno el nuevo tipo de titular en la variable
  $tipoTitular = $titulo; // Actualizo la variable con el nuevo valor
} else {
  // Verifico si hay un titular almacenado en la cookie
  if (isset($_COOKIE['tipo_titular'])) {
    $tipoTitular = $_COOKIE['tipo_titular'];
  }
}

// Array que relaciona cada tipo de titular con su título
$titulares = [
  "politica" => "CFK encabeza el peronismo",
  "economica" => "Bonos argentinos en alza debido a...",
  "deportiva" => "Rosario Central ganó el último partido contra..."
];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Periódico</title>
</head>

<body>
  <h1>Bienvenido al Periódico Ravarotto</h1>

  <?php if ($tipoTitular && array_key_exists($tipoTitular, $titulares)): ?>
    <h2>Titular de interés: <?php echo $titulares[$tipoTitular]; ?></h2>
  <?php else: ?>
    <h2>Últimos titulares:</h2>
    <ul>
      <li>CFK encabeza el peronismo</li>
      <li>Bonos argentinos en alza debido a...</li>
      <li>Rosario Central ganó el último partido contra...</li>
    </ul>
  <?php endif; ?>

  <form action="diario.php" method="post">
    <h3>Selecciona el tipo de titular que más le interesa para futuras visitas:</h3>
    <label>
      <input type="radio" name="titulo" value="politica" <?php if ($tipoTitular == "politica") echo 'checked'; ?>>
      Titular política
    </label><br>
    <label>
      <input type="radio" name="titulo" value="economica" <?php if ($tipoTitular == "economica") echo 'checked'; ?>>
      Titular económica
    </label><br>
    <label>
      <input type="radio" name="titulo" value="deportiva" <?php if ($tipoTitular == "deportiva") echo 'checked'; ?>>
      Titular deportiva
    </label><br>
    <input type="submit" value="Actualizar titular">
  </form>

  <p><a href="borrarcookie.php">Borrar cookie</a></p>
</body>

</html>