<?php

require_once("../modelo/conexion.php");

$status = $_GET["lock"]; //Recibir el valor que indica el estado de usuario, si es activado o desactivado
$usuario = $_GET["user"]; // Nombre del usuario a activar o desactivar

$sql = "UPDATE usuario_personal SET estado='$status' WHERE login='$usuario'";
$res = mysql_query($sql);

echo "<script type='text/javascript'> alert('El usuario ha sido $status'); window.location='../vista/usuariov.php';</script>";

?>