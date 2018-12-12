<?php

session_start();
$usuario = $_SESSION['user'];

require_once("../modelo/conexion.php");
require_once("../modelo/secciones.php");

$nuevo = new seccion();
$nuevo->registrar($_POST["seccion"],$usuario,$_POST["periodo"]);

?>