<?php

session_start();

$usuario = $_SESSION['user']; 

require_once("../modelo/conexion.php");

// UTILIZAMOS UNA REGLA DE 3 PARA CALCULAR DE ACUERDO A LAS PREGUNTAS, CUANTO ES EL PORCENTAJE DEL EXAMEN EN BASE A 100%

$row_lista2 = $_POST["lista"]; 

$regla = 1 * 100 / $row_lista2;

$total = 100;

for ($i=1; $i <=$row_lista2; $i++) { 

	if($_POST["opcion$i"] == "F") // Si la respuesta es falsa, se resta el valor en base al porcentaje a la nota del estudiante

	{

		$calificacion = $total - $regla;
		$total = $calificacion;


	}

}

$nombre_examen = $_POST["examen"];

$sql_us = "SELECT nombre_sec, nombre, sexo FROM seccion_usuario,usuario_personal 
WHERE seccion_usuario.cedula_u = usuario_personal.cedula and usuario_personal.login = '$usuario'";
$res_us = mysql_query($sql_us);
$req_us = mysql_fetch_array($res_us);
$seccion = $req_us["nombre_sec"]; 

date_default_timezone_set("America/Caracas"); $hoy = date ("Y");

$sqlev = "INSERT INTO evaluacion VALUES ('','$usuario','$nombre_examen','$seccion','$hoy','$total')";
$resev = mysql_query($sqlev);

//* Historial de accion

$sql_user = "SELECT nombre FROM usuario_personal WHERE login='$usuario'";
$res_user = mysql_query($sql_user);
$req_user = mysql_fetch_array($res_user);
$estudiante = $req_user["nombre"];

$sql_b = "SELECT *FROM usuario, usuario_personal WHERE usuario.login = usuario_personal.login and usuario.login = '$usuario'";
$res_b = mysql_query($sql_b);
$req_b = mysql_fetch_array($res_b);
$nombre2 = $req_b["nombre"];
$tipo = $req_b["tipo"];
$genero = $req_b["sexo"];
date_default_timezone_set("America/Caracas");
$actual=date ("Y-m-d"); //El año actual en el calendario espanol
$hora_actual=date("h:i:sa");

$sql2 = "INSERT INTO historialaccion VALUES ('','$usuario','$nombre2','El estudiante $estudiante ha tomado el examen $nombre_examen',
	'$tipo','$genero','$hora_actual','$actual')";
$res2 = mysql_query($sql2);

//***********************

echo "<script type='text/javascript'> alert('Evaluación Finalizada'); window.location='../vista/index2.php'; </script>";

?>