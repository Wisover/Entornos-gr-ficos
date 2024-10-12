<?php
ob_start("ob_gzhandler");
session_start();
$link = mysqli_connect("localhost", "root", "", "Compras") or die("Problemas de conexión a la base de datos");

if (isset($_SESSION['carro'])) {
  $carro = $_SESSION['carro'];
} else {
  $carro = false;
}

$qry = mysqli_query($link, "SELECT * FROM catálogo ORDER BY producto ASC");
?>

<html>

<head>
  <title>CATÁLOGO</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <style type="text/css">
    .catalogo {
      font-family: Verdana, Arial, Helvetica, sans-serif;
      font-size: 9px;
      color: #333333;
    }
  </style>
</head>

<body>
  <table width="272" align="center" cellpadding="0" cellspacing="0" style="border: 1px solid #000000;">
    <tr valign="middle" bgcolor="#DFDFDF" class="catalogo">
      <td width="170"><strong>Producto</strong></td>
      <td width="77"><strong>Precio</strong></td>
      <td width="25" align="right"><a href="vercarrito.php?<?php echo SID ?>" title="Ver el contenido del carrito"><img src="carrito.png" width="30" height="30" border="0"></a></td>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($qry)) {
    ?>
      <tr valign="middle" class="catalogo">
        <td><?php echo $row['producto'] ?></td>
        <td><?php echo number_format($row['precio'], 2) ?></td>
        <td align="center"><?php
                            if (
                              !$carro || !isset($carro[md5($row['id'])]['identificador']) ||
                              $carro[md5($row['id'])]['identificador'] != md5($row['id'])
                            ) {
                            ?>
            <a href="agregarcar.php?<?php echo SID ?>&id=<?php echo $row['id']; ?>"><img src="agregarproducto.png" border="0" width="50" height="50" title="Agregar al Carrito"></a>
          <?php } else { ?>
            <a href="borracar.php?<?php echo SID ?>&id=<?php echo $row['id']; ?>"><img src="eliminarproducto.png" border="0" width="50" height="50" title="Quitar del Carrito"></a>
          <?php } ?>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>
<?php
ob_end_flush();
?>