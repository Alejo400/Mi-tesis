<?php

session_start();

require_once("../modelo/conexion.php");
error_reporting(E_ERROR);
//error_reporting(E_WARNING);


$contando = $_GET["contador"]; //La cantidad de preguntas a ingresar
$usuario = $_SESSION['user']; //Profesor que crea el examen
$nuevoexamen = $_GET["examen"]; //EL nombre del examen
$confirmar = 0; //COnfirmar si el examen ha sido creado para registrarlo en el historial de accion

//Si no se a;adieron mas preguntas de las ya traidas por defecto

if($contando == 0){

$contando = 5;

}

$sql2 = "INSERT INTO examen_cont VALUES  ('".$_GET["examen"]."','$usuario')";
$res2 = mysql_query($sql2);

//Este ciclo va desde 1 hasta la cantidad de preguntas creadas

for($y=1;$y<=$contando;$y++){

	$vf=$_GET["vf$y"];
	$newvf = array_filter( $vf, 'strlen' ); 

	$opciones=$_GET["opcion$y"];
	$op_filtro = array_filter( $opciones, 'strlen' );

	//Este ciclo va desde 0 hasta la cantidad de opciones agregadas por cada pregunta 

	for($i=0;$i<=6;$i++){

		if($op_filtro[$i]!=NULL){ //Si la opcion enviada no es NULA entonces insertamos las opciones y preguntas

$sql = "INSERT INTO examen VALUES  ('','".$_GET["examen"]."','".$_GET["pregunta$y"]."','".$op_filtro[$i]."','".$newvf[$i]."')";
$res = mysql_query($sql);

if($res2!=0 && $res!=0)

{

echo "<script type='text/javascript'> alert('Examen creado exitosamente'); window.location='../vista/index2.php'; </script>";
$confirmar = 1;	

}

else { echo "<script type='text/javascript'> alert('Error, ya existe un examen con este nombre'); window.location='../vista/index2.php'; </script>"; }

								}

	}

}

if($confirmar == 1){

	//* Historial de accion

$sql_user = "SELECT nombre FROM usuario_personal WHERE login='$usuario'";
$res_user = mysql_query($sql_user);
$req_user = mysql_fetch_array($res_user);
$profesor = $req_user["nombre"];

$sql_b = "SELECT *FROM usuario, usuario_personal WHERE usuario.login = usuario_personal.login and usuario.login = '$usuario'";
$res_b = mysql_query($sql_b);
$req_b = mysql_fetch_array($res_b);
$nombre = $req_b["nombre"];
$tipo = $req_b["tipo"];
$genero = $req_b["sexo"];
date_default_timezone_set("America/Caracas");
$actual=date ("Y-m-d"); //El año actual en el calendario espanol
$hora_actual=date("h:i:sa");

$sql2 = "INSERT INTO historialaccion VALUES ('','$usuario','$nombre','El profesor $nombre ha creado el examen de nombre: $nuevoexamen',
	'$tipo','$genero','$hora_actual','$actual')";
$res2 = mysql_query($sql2);

//***********************

}

?>