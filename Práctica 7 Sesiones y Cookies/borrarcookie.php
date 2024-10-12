<?php

setcookie("tipo_titular", "", time() - 3600);
header("Location: diario.php");
exit();
