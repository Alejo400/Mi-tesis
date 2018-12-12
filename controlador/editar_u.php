<?php

require_once("../modelo/usuario.php");
require_once("../modelo/conexion.php");

//Llamar a la clase usuario y pasar los parametros a la funcion editar

$nuevo = new usuario();
$nuevo->editar($_POST["usuario"],$_POST["pass"],$_POST["pass2"],$_POST["nombre"],$_POST["cedula"],$_POST["sexo"]);

?>