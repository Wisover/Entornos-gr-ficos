<?php
session_start();
?>
<html>

<body>
  <?php
  // Inicializar contador
  if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 1;
  } else {
    $_SESSION["contador"]++;
  }

  echo "<h1>Páginas visitadas durante tu sesión: " . $_SESSION['contador'] . "</h1>";
  ?>

  <h3><a href="pag2.php">A otra pagina</a></h3>

</body>

</html>