<?php

require_once("../modelo/usuario.php");
require_once("../modelo/conexion.php");

$nuevo = new usuario();
$nuevo->registrar($_POST["login"],$_POST["pass"],$_POST["pass2"],$_POST["tipo"],$_POST["nombre"],$_POST["cedula"],$_POST["sexo"],$_POST["comparar"]);

?>