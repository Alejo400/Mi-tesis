<?php

require_once("../modelo/sesion.php");
require_once("../modelo/conexion.php");

  $nuevo = new sesion();
  $nuevo->entrar($_POST["usuario"],$_POST["contrasena"]);

?>