<?php
session_start();

// Verificar si la variable de sesión 'carro' existe
if (!isset($_SESSION['carro']) || empty($_SESSION['carro'])) {
  echo "No hay productos en el carrito.";
  exit; // Termina el script si no hay productos
}

$carro = $_SESSION['carro'];
$products = '';
$products2 = '';

foreach ($carro as $k => $v) {
  $unidad = $v['cantidad'] > 1 ? " unidades de " : " unidad de ";
  $products .= $v['cantidad'] . $unidad . $v['producto'] . " - $" . number_format($v['precio'], 2) . "\n";
  $products2 .= $v['producto'] . " - $" . number_format($v['precio'], 2) . "\n";
}

$costo = isset($_GET['costo']) ? $_GET['costo'] : 0; // Asegúrate de que 'costo' esté presente
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
$paypal_email = 'tucorreo@paypal.com';
?>

<html>

<head>
  <title>PAGOS</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <style type="text/css">
    .tit {
      font-family: Verdana, Arial, Helvetica, sans-serif;
      font-size: 9px;
      color: #FFFFFF;
    }

    .prod {
      font-family: Verdana, Arial, Helvetica, sans-serif;
      font-size: 9px;
      color: #333333;
    }

    h1 {
      font-family: Verdana, Arial, Helvetica, sans-serif;
      font-size: 20px;
      color: #990000;
    }
  </style>
</head>

<body>
  <h1 align="center">Datos de Pago</h1>
  <div align="center">
    <form action="<?php echo $paypal_url; ?>" method="post" target="_blank">
      <input type="hidden" name="cmd" value="_xclick">
      <input type="hidden" name="business" value="<?php echo $paypal_email; ?>">
      <input type="hidden" name="item_name" value="<?php echo $products2; ?>">
      <input type="hidden" name="item_number" value="<?php echo date('YmdHis'); ?>">
      <input type="hidden" name="amount" value="<?php echo $costo; ?>">
      <input type="hidden" name="currency_code" value="USD">
      <input type="hidden" name="return" value="http://localhost/tuProyecto/pago_exitoso.php">
      <input type="hidden" name="cancel_return" value="http://localhost/tuProyecto/pago_cancelado.php">
      <input type="hidden" name="notify_url" value="http://localhost/tuProyecto/pago_notify.php">
      <input type="image" src="paypal.png" alt="PayPal - La forma más segura de pagar en Internet" name="submit" width="100" height="100" border="0">
      <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif">
    </form>
  </div>
</body>

</html>