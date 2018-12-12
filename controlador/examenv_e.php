<?php

session_start();

require_once("../modelo/examen.php");
require_once("../modelo/conexion.php");

$usuario = $_SESSION['user'];

$nuevo = new examen();
$nuevo->eliminar($_GET["examen"],$usuario);

?>