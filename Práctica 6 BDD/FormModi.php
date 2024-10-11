<html>

<head>
  <title>Modificación de Ciudad</title>
</head>

<body>
  <?php
  include("conexion.inc");

  // Captura datos desde el Form anterior 
  $vId = $_POST['id'];

  // Arma la instrucción SQL para buscar la ciudad
  $vSql = "SELECT * FROM ciudades WHERE id='$vId'";
  $vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
  $fila = mysqli_fetch_array($vResultado);

  if (mysqli_num_rows($vResultado) == 0) {
    echo ("Ciudad Inexistente...!!! <br>");
    echo ("<A href='FormModiIni.html'>Continuar</A>");
  } else {
  ?>
    <FORM action="Modi.php" method="POST" name="FormModi">
      <table width="356">
        <tr>
          <td width="103"> Ciudad: </td>
          <td width="243"> <input type="text" name="ciudad" value="<?php echo ($fila['ciudad']); ?>"> </td>
        </tr>
        <tr>
          <td width="103"> País: </td>
          <td width="243"> <input type="text" name="pais" size="20" maxlength="40" value="<?php echo ($fila['país']); ?>"> </td>
        </tr>
        <tr>
          <td width="103"> Habitantes: </td>
          <td width="243"> <input type="number" name="habitantes" size="20" maxlength="11" value="<?php echo ($fila['habitantes']); ?>"> </td>
        </tr>
        <tr>
          <td width="103"> Superficie: </td>
          <td width="243"> <input type="text" name="superficie" size="20" value="<?php echo ($fila['superficie']); ?>"> </td>
        </tr>
        <tr>
          <td width="103"> Tiene Metro: </td>
          <td width="243">
            <select name="tieneMetro">
              <option value="1" <?php if ($fila['tieneMetro']) echo 'selected'; ?>>Sí</option>
              <option value="0" <?php if (!$fila['tieneMetro']) echo 'selected'; ?>>No</option>
            </select>
          </td>
        </tr>

        <input type="hidden" name="id" value="<?php echo ($fila['id']); ?>">

        <tr>
          <td colspan="2" align="center"> <input type="SUBMIT" name="Submit" value="Modificar"> </td>
        </tr>
      </table>
    </FORM>
  <?php
  }

  // Liberar conjunto de resultados 
  mysqli_free_result($vResultado);

  // Cerrar la conexión 
  mysqli_close($link);
  ?>
</body>

</html>