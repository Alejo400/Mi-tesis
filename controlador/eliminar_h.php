<?php

require_once("../modelo/conexion.php");

$sql = "DELETE FROM historialsesion";
$res = mysql_query($sql);

echo "<script type='text/javascript'> alert('EL historial ha sido vaciado satisfactoriamente'); window.location='../vista/historial.php';</script>";

?>