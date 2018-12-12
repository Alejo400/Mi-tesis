<?php
session_start();

//Guardamos el nombre del usuario que esta ingresando en el sistema, en este caso un operador en una variable mediante la sesion para guardar en el historial

$usuario2 = $_SESSION['user'];

require_once("../modelo/conexion.php");

//Guardamos el usuario que se esta eliminando de la seccion, en este caso un estudiante

$usuario = $_GET["user"];

//* Historial de accion

$sql_user = "SELECT nombre_sec, nombre FROM usuario_personal, seccion_usuario WHERE seccion_usuario.cedula_u='$usuario' and usuario_personal.cedula='$usuario'";
$res_user = mysql_query($sql_user);
$req_user = mysql_fetch_array($res_user);
$seccion = $req_user["nombre_sec"];
$estudiante = $req_user["nombre"];

$sql_b = "SELECT *FROM usuario, usuario_personal WHERE usuario.login = usuario_personal.login and usuario.login = '$usuario2'";
$res_b = mysql_query($sql_b);
$req_b = mysql_fetch_array($res_b);
$nombre = $req_b["nombre"];
$tipo = $req_b["tipo"];
$genero = $req_b["sexo"];
date_default_timezone_set("America/Caracas");
$actual=date ("Y-m-d"); //El año actual en el calendario espanol
$hora_actual=date("h:i:sa");

$sql2 = "INSERT INTO historialaccion VALUES ('','$usuario2','$nombre','Ha eliminado de la sección $seccion al estudiante $estudiante',
	'$tipo','$genero','$hora_actual','$actual')";
$res2 = mysql_query($sql2);

//*********************** Eliminar el estudiante de la seccion

$sql = "DELETE FROM seccion_usuario WHERE cedula_u = '$usuario'";
$res = mysql_query($sql);

echo "<script type='text/javascript'> alert('El estudiante ha sido eliminado de esta sección'); window.location='../vista/index2.php';</script>";

?>