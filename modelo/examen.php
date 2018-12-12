<?php

class examen{

var $nombre;

public function eliminar($nombre,$usuario){

	$sql = "DELETE FROM examen_cont WHERE examen = '$nombre'";
	$res = mysql_query($sql);

	if($res == true)

{

			//* HISTORIAL DE ACCION

$sql_b = "SELECT *FROM usuario, usuario_personal WHERE usuario.login = usuario_personal.login and usuario.login = '$usuario'";
$res_b = mysql_query($sql_b);
$req_b = mysql_fetch_array($res_b);
$nombre2 = $req_b["nombre"];
$tipo = $req_b["tipo"];
$genero = $req_b["sexo"];
date_default_timezone_set("America/Caracas");
$actual=date ("Y-m-d"); //El año actual en el calendario espanol
$hora_actual=date("h:i:sa");

$sql2 = "INSERT INTO historialaccion VALUES ('','$usuario','$nombre2','El profesor $usuario ha eliminado el examen $nombre',
	'$tipo','$genero','$hora_actual','$actual')";
$res2 = mysql_query($sql2);

//***********************

	echo "<script type='text/javascript'> alert('El examen ha sido eliminado con exito'); window.location='../vista/index2.php'; </script>";

}

}

}

?>